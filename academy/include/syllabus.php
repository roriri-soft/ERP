<?php
    include("config.php");  
    $id = intval($_GET['id']);
    $queryView = "SELECT sy.name as syllabus_name ,s.name as subject_name,sy.description from syllabus sy join subject s on sy.subject_id = s.id where subject_id = $id";
    $viewSubject = mysqli_query($conn, $queryView);
?>