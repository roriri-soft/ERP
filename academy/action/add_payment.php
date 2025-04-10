<?php

include("../include/config.php");

// Form submission
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $payment_date = $_POST['created_at'];
  $payment_mode = $_POST['payment_mode'];
  $amount = $_POST['paid_amount'];
  $received_by = $_POST['created_by'];

  $sql = "INSERT INTO payments (name, created_at, payment_mode, paid_amount, created_by) 
          VALUES ('$name', '$payment_date', '$payment_mode', '$amount', '$received_by')";

  if ($conn->query($sql) === TRUE) {
    echo "Payment record added successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
<?php
include('include/dbConnection.php');

$person_id = isset($_GET['person_id']) ? (int) $_GET['person_id'] : 0;

$selQuery = "SELECT persons.id, persons.name, 
                    salary_structure.base_salary, salary_structure.allowances, salary_structure.effective_from, 
                    payroll.bonuses, payroll.deductions, payroll.net_salary,payroll.payment_date, 
                    attendance.check_in_time, attendance.check_out_time, 
                    departments.name AS department_name,
                    (SELECT COUNT(*) FROM attendance WHERE attendance.person_id = persons.id AND attendance.status = 'Present') AS present_days
             FROM persons 
             LEFT JOIN person_departments ON persons.id = person_departments.person_id
             LEFT JOIN departments ON person_departments.department_id = departments.id
             LEFT JOIN salary_structure ON persons.id = salary_structure.person_id 
             LEFT JOIN payroll ON persons.id = payroll.person_id 
             LEFT JOIN attendance ON persons.id = attendance.person_id
             WHERE persons.id = $person_id";


$resQuery = mysqli_query($conn, $selQuery);
?>