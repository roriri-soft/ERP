<?php
include("../include/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);

    // Check if course already exists (optional)
    $check = mysqli_query($conn, "SELECT * FROM course WHERE name = '$course_name'");
    if (mysqli_num_rows($check) > 0) {
        echo "Course already exists!";
        exit;
    }

    $query = "INSERT INTO course (name,incharge,status) VALUES ('$course_name', 'Active')";
    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
