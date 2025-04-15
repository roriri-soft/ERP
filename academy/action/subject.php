
<?php  
    $select_course="SELECT * FROM `course` WHERE course_status='Active'AND entity_id=3";
    $res_course = mysqli_query($conn , $select_course); 
            while($row = mysqli_fetch_array($res_course , MYSQLI_ASSOC)) { 
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            
            
            echo '<option value="' . $course_id . '">' . $course_name . '</option>';
            }
?> 