<?php
    include("config.php");
    // CREATE VIEW listtrainee AS
    //     SELECT 
    //         p.id , 
    //         p.name, 
    //         pd.phone_number, 
    //         p.email
    //             FROM person p
    //             JOIN person_details pd ON p.id = pd.person_id
    //             JOIN person_roles pr ON p.id = pr.person_id
    //             JOIN role r ON pr.role_id = r.id
    //             WHERE r.name = 'Trainee';
    $queryTrainee = "SELECT * from listtrainee";    
    $resTrainee = mysqli_query($conn, $queryTrainee);
?>