<?php
include("../include/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paymentDate = $_POST['paymentDate'];
    $amount = $_POST['amount'];
    $person_id = $_POST['paymentperson_id'];
    $paymentMode = $_POST['paymentMode'];
    $receivedBy = 1;

    // Step 1: Get person_course_id
    $sql = "SELECT id FROM person_course WHERE person_id = ?";
    $stmtCheck = $conn->prepare($sql);
    $stmtCheck->bind_param("i", $person_id);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $personCourseId = $row['id'];
    } else {
        echo "Error: Course not found for this person.";
        exit;
    }
    $stmtCheck->close();

    // Step 2: Insert payment
    $query = "INSERT INTO payment (person_course_id, paid_amount, payment_mode, payment_date, received_by) 
              VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("idssi", $personCourseId, $amount, $paymentMode, $paymentDate, $receivedBy);

    if ($stmt->execute()) {
        echo "Payment Added successfully";
    } else {
        echo "error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
