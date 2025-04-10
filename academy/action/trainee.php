<?php
include('../include/config.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['hdnAction'] == 'addTrainee') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['pemail'];
        $regno=$_POST['regno'];
        $dob=$_POST['dob'];
        $doj=$_POST['doj'];
        $gender=$_POST['gender'];
        $bloodgroup=$_POST['blood_group'];
        $address=$_POST['address'];
        $profileImage = null; 
        $targetDir = "../assets/images/profile";  
        $targetsaveDir = "assets/images/profile";  
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
                    $profileImage = "assets/images/profile/" . $imageFileName;  
                } else {
                    echo 'Failed to upload profile image.';
                    exit; 
                }
            } else {
                echo 'Invalid image format. Allowed types: JPG, JPEG, PNG, GIF.';
                exit;  
            }
        }
        $sql = "INSERT INTO person (name, email,register_no) VALUES (?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email,$regno); 

        if ($stmt->execute()) {
            $person_id = $stmt->insert_id; 

            $persondSql = "INSERT INTO person_details (person_id, phone_number,address,dob,doj,gender,blood_group,profile) VALUES (?,?,?,?,?,?,?,?)";
            $persondStmt = $conn->prepare($persondSql);
            $persondStmt->bind_param("isssssss", $person_id, $phone,$address,$dob,$doj,$gender,$bloodgroup,$targetFilePath); 

            if ($persondStmt->execute()) {
                $roleSql = "SELECT id FROM role WHERE name = 'trainee' LIMIT 1";
                $roleResult = $conn->query($roleSql);

                if ($roleResult && $roleResult->num_rows > 0) {
                    $roleRow = $roleResult->fetch_assoc();
                    $role_id = $roleRow['id'];

                    $roleSql = "INSERT INTO person_roles (person_id, role_id) VALUES (?, ?)";
                    $roleStmt = $conn->prepare($roleSql);
                    $roleStmt->bind_param("ii", $person_id, $role_id);

                    if ($roleStmt->execute()) {
                        echo 'success'; 
                    } else {
                        echo 'Failed to assign role to trainee. Please try again.'; 
                    }

                    $roleStmt->close();
                } else {
                    echo 'Role "trainee" not found. Please check the role table.'; 
                }
            } else {
                echo 'Failed to add phone number to person_detail. Please try again.'; 
            }

            $persondStmt->close();
        } else {
            echo 'Failed to add trainee. Please try again.'; 
        }

        $stmt->close();
        $conn->close();
    }
}
?>
