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
