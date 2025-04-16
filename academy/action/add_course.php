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
