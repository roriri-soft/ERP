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
