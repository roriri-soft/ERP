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
