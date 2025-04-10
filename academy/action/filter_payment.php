<?php
include("../include/config.php");


$person_id = isset($_POST['person_id']) ? (int) $_POST['person_id'] : 0;
$payment_date = isset($_POST['payment_date']) ? $_POST['payment_date'] : '';

$query = "SELECT 
            p.id AS person_id,
            p.name AS person_name,
            f.paid_amount,
            f.payment_mode,
            f.created_at,
            COALESCE(p2.name, 'N/A') AS created_by
          FROM 
            person_fee_paid f
          INNER JOIN 
            person_course pc ON f.person_course_id = pc.id
          INNER JOIN 
            person p ON pc.person_id = p.id
          LEFT JOIN 
            person p2 ON f.created_by = p2.id
          WHERE 
            1=1";

if ($person_id > 0) {
    $query .= " AND p.id = $person_id";
}

if (!empty($payment_date)) {
    $payment_date = mysqli_real_escape_string($conn, $payment_date);
    $query .= " AND DATE(f.created_at) = '$payment_date'";
}

$query .= " ORDER BY f.created_at DESC";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$i}</td>
                <td>" . date('d-m-Y', strtotime($row['created_at'])) . "</td>
                <td>{$row['person_name']}</td>
                <td>{$row['payment_mode']}</td>
                <td>{$row['created_by']}</td>
                <td>₹" . number_format($row['paid_amount'], 2) . "</td>
              </tr>";
        $i++;
    }
} else {
    echo "<tr><td colspan='6'>No payment records found.</td></tr>";
}
?>
