<?php 
    include("config.php");
    $selQuery ="SELECT * FROM `course_with_subject`";
    $rescourse = mysqli_query($conn , $selQuery); 
?>
