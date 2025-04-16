<?php
include('../include/config.php');

// AJAX Request: Get Fee & Discount
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type'])) {

    if ($_POST['type'] == 'get_fee_discount') {
        header('Content-Type: application/json');

        $course_id = $_POST['course_id'];
        $duration = $_POST['duration'];

        $query = "SELECT fee, discount FROM course_fee WHERE course_id = '$course_id' AND duration = '$duration'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);

        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['fee' => '', 'discount' => '']);
        }
        exit;
    }

    // AJAX Request: Get Duration
    if ($_POST['type'] == 'get_durations') {
        $course_id = $_POST['course_id'];
        $query = "SELECT DISTINCT duration FROM course_fee WHERE course_id = '$course_id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['duration']}'>{$row['duration']}</option>";
            }
        } else {
            echo "<option value=''>No durations found</option>";
        }
        exit;
    }
}

// Main Trainee Add Logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addTrainee') {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['pemail'];
    $regno = $_POST['regno'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];
    $gender = $_POST['gender'];
    $bloodgroup = $_POST['blood_group'];
    $address = $_POST['address'];

    $profileImage = null; 
    $targetDir = "../assets/images/profile";  
    $targetsaveDir = "assets/images/profile";  
    $targetFilePath = '';

    if (!empty($_FILES["profile"]["name"])) { 
        $imageFileName = basename($_FILES["profile"]["name"]);
        $targetFilePath = $targetsaveDir . "/" . $imageFileName;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (in_array($imageFileType, $allowedTypes)) {
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);  
            }

            if (move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFilePath)) {
                $profileImage = $targetFilePath;
            } else {
                echo 'Failed to upload profile image.';
                exit; 
            }
        } else {
            echo 'Invalid image format. Allowed types: JPG, JPEG, PNG, GIF.';
            exit;  
        }
    }

    $sql = "INSERT INTO person (name, email, register_no) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $regno);

    if ($stmt->execute()) {
        $person_id = $stmt->insert_id;

        $persondSql = "INSERT INTO person_details (person_id, phone_number, address, dob, doj, gender, blood_group, profile) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $persondStmt = $conn->prepare($persondSql);
        $persondStmt->bind_param("isssssss", $person_id, $phone, $address, $dob, $doj, $gender, $bloodgroup, $targetFilePath);

        if ($persondStmt->execute()) {
            $roleSql = "SELECT id FROM role WHERE name = 'trainee' LIMIT 1";
            $roleResult = $conn->query($roleSql);

            if ($roleResult && $roleResult->num_rows > 0) {
                $roleRow = $roleResult->fetch_assoc();
                $role_id = $roleRow['id'];

                $roleInsertSql = "INSERT INTO person_roles (person_id, role_id) VALUES (?, ?)";
                $roleStmt = $conn->prepare($roleInsertSql);
                $roleStmt->bind_param("ii", $person_id, $role_id);

                if ($roleStmt->execute()) {
                    echo 'success';
                } else {
                    echo 'Failed to assign role to trainee.';
                }

                $roleStmt->close();
            } else {
                echo 'Role "trainee" not found.';
            }
        } else {
            echo 'Failed to insert person_details.';
        }

        $persondStmt->close();
    } else {
        echo 'Failed to insert into person.';
    }

    $stmt->close();
    $conn->close();
}
?>
