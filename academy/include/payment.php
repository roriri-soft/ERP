<?php
include("config.php");

$queryPayment = "
    SELECT  
        p.id AS person_id,
        p.name AS person_name,
        f.paid_amount,
        f.payment_mode,
        f.created_at,
        p2.name as created_by
    FROM  person_fee_paid f
    JOIN  person_course pc ON f.person_course_id = pc.id
    JOIN  person p ON pc.person_id = p.id
    left join person p2 on f.created_by = p2.id
    ORDER BY  f.created_at DESC ";

$resPayment = mysqli_query($conn, $queryPayment);
?>

