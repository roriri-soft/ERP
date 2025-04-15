    <?php
    include("config.php");
//    CREATE VIEW viewtrainee AS
//     SELECT 
//         p.id AS person_id,
//         p.name AS person_name,
//         p.email,
//         p.register_no,
        
//         pd.phone_number,
//         pd.address,
//         pd.dob,
//         pd.doj,
//         pd.profile,
//         pd.gender,
//         pd.blood_group,
        
//         pl.id AS login_id,
//         pl.username,
//         pl.password,
        
//         pc.id AS person_course_id,
//         pc.fee_amount AS course_amount,
        
//         cf.id AS course_fee_id,
//         cf.fee AS total_amount,
//         cf.duration,
        
//         c.id AS course_id,
//         c.name AS course_name,
//         c.description AS course_description,
//         c2.incharge AS incharger,
        
//         pfp.id AS payment_id,
//         pfp.paid_amount,
//         pfp.payment_mode,
//         pfp.payment_date,
//         p2.name as received_by 
        
//         FROM person p
//         JOIN person_details pd ON p.id = pd.person_id
//         LEFT JOIN person_login pl ON p.id = pl.person_id
//         LEFT JOIN person_course pc ON p.id = pc.person_id
//         LEFT JOIN course_fee cf ON cf.id = pc.course_fee_id
//         LEFT JOIN course c ON c.id = cf.course_id
//         LEFT JOIN course c2 ON c2.incharge = p.id
//         LEFT JOIN payment pfp ON pfp.person_course_id = pc.id
//         left join person p2 on pfp.received_by = p2.id

    if (isset($_GET['id'])) {
        $viewedPersonId = intval($_GET['id']);
    }else if(isset($_GET['person_id'])){
        $viewedPersonId = intval($_GET['person_id']);
    }

    $queryView = "SELECT * FROM viewtrainee WHERE person_id = $viewedPersonId";
    $viewTrainee = mysqli_query($conn, $queryView);
    $queryView = "SELECT * FROM viewtrainee WHERE person_id = $viewedPersonId";
    $viewTrainee = mysqli_query($conn, $queryView);

?>
