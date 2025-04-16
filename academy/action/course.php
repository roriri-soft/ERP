<?php
include("../include/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $subject_ids = $_POST['subjects'] ?? [];
    $durations = $_POST['duration'] ?? [];

    // Check if course already exists
    $check = mysqli_query($conn, "SELECT * FROM course WHERE name = '$course_name'");
    if (mysqli_num_rows($check) > 0) {
        echo "Course already exists!";
        exit;
    }

    // Insert course
    $status = 'Active';
    $insertCourseSql = "INSERT INTO course (name, status) VALUES (?, ?)";
    $stmt = $conn->prepare($insertCourseSql);
    $stmt->bind_param("ss", $course_name, $status);

    if ($stmt->execute()) {
        $course_id = $stmt->insert_id;

        // Insert into course_subject table
        $subjectSql = "INSERT INTO course_subject (course_id, subject_id) VALUES (?, ?)";
        $subjectStmt = $conn->prepare($subjectSql);
        foreach ($subject_ids as $subject_id) {
            $subjectStmt->bind_param("ii", $course_id, $subject_id);
            $subjectStmt->execute();
        }

        // Insert into course_fee table (1 row per duration)
        $feeSql = "INSERT INTO course_fee (course_id, duration) VALUES (?, ?)";
        $feeStmt = $conn->prepare($feeSql);
        foreach ($durations as $duration) {
            $feeStmt->bind_param("is", $course_id, $duration);
            $feeStmt->execute();
        }

        echo "success";
    } else {
        echo "Failed to add course.";
    }

    $stmt->close();
}
?>

<?php
include("../include/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];

    // Delete from course_subject first (to maintain referential integrity)
    $deleteSubjects = mysqli_query($conn, "DELETE FROM course_subject WHERE course_id = '$course_id'");

    // Then delete from course table
    $deleteCourse = mysqli_query($conn, "DELETE FROM course WHERE id = '$course_id'");

    if ($deleteCourse) {
        echo "success";
    } else {
        echo "Error deleting course: " . mysqli_error($conn);
    }
}
?>

<?php
include("../include/config.php");

$course_id = $_POST['course_id'];

// Get course name
$courseQuery = mysqli_query($conn, "SELECT * FROM course WHERE id = '$course_id'");
$course = mysqli_fetch_assoc($courseQuery);

// Get all subjects
$subjectQuery = mysqli_query($conn, "SELECT * FROM subject WHERE status = 'Active'");
$subjects = [];
while ($row = mysqli_fetch_assoc($subjectQuery)) {
    $subjects[] = $row;
}

// Get selected subjects for the course
$selectedQuery = mysqli_query($conn, "SELECT subject_id FROM course_subject WHERE course_id = '$course_id'");
$selected_subjects = [];
while ($row = mysqli_fetch_assoc($selectedQuery)) {
    $selected_subjects[] = $row['subject_id'];
}

// Send JSON
echo json_encode([
    'course' => $course,
    'subjects' => $subjects,
    'selected_subjects' => $selected_subjects
]);
?>

<?php
include("../include/config.php");

$course_id = $_POST['course_id'];
$course_name = $_POST['course_name'];
$subjects = isset($_POST['subject']) ? $_POST['subject'] : [];

// Update course name
$updateQuery = "UPDATE course SET name = '$course_name' WHERE id = '$course_id'";
mysqli_query($conn, $updateQuery);

// Delete existing subject mappings
mysqli_query($conn, "DELETE FROM course_subject WHERE course_id = '$course_id'");

// Insert new subject mappings
foreach ($subjects as $sub_id) {
    mysqli_query($conn, "INSERT INTO course_subject (course_id, subject_id, create_at, status) VALUES ('$course_id', '$sub_id', NOW(), 'Active')");
}

echo "success";
?>
