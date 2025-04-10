<?php 
    include("config.php");
    $selQuery ="SELECT * FROM `course_with_subjects`";
    $rescourse = mysqli_query($conn , $selQuery); 
?>
