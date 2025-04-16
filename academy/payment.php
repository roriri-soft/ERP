<?php
    session_start();
    include("include/payment.php"); 
?>
<!doctype html>
<html lang="en">
<?php include("head.php"); ?>
<body>
    <div class="wrapper">
        <?php include("top.php");?>
        <?php include("left.php");?>
        <div class="page-wrapper">
            <div class="page-content">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <h2 class="page-title">Payment Report</h2>
                        <div class="position-relative" style="height: 80px;">                          
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <div class="container-fluid py-4">
    <div class="card shadow-sm p-4">
        <div class="row g-3">
            <div class="col-md-3 col-12">
                <label for="reportPaymentDate" class="form-label">Payment Date</label>
                <input type="date" id="reportPaymentDate" class="form-control" />
                <span id="reportPaymentDateError" class="text-danger small"></span>
            </div>

            <div class="col-md-3 col-12">
                    <label for="person_id" class="form-label">Trainee Name</label>
                    <select id="person_id" name="person_id" class="form-select" required>
                        <option value="">-- Select Trainee --</option>
                        <?php
                            include("config.php");
                            $query = "SELECT id, name FROM person WHERE status = 1 ORDER BY name ASC";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                        ?>
                    </select>
            </div>


             <div class="col-md-3 col-12">
             <label for="courseFilter" class="form-label">Course Name</label>
                <select id="courseFilter" class="form-select">
                 <option value="">-- Select Course --</option>
                 <?php
                  $queryCourse = "SELECT id, name FROM course where status='Active'";
                  $resCourse = mysqli_query($conn, $queryCourse);
                 while ($rowCourse = mysqli_fetch_assoc($resCourse)) {
                 ?>
                 <option value='<?php echo $rowCourse['id']; ?>'><?php echo $rowCourse['name']; ?></option>
                 <?php
                 }
                 mysqli_free_result($resCourse);
                  ?>
             </select>
         </div>

           
            <div class="col-md-3 col-12 d-flex align-items-end ms-auto">
                <div class="w-100 d-flex justify-content-end gap-2">
                    <button id="filterBtn" class="btn btn-primary">Filter</button>
                    <button id="clearBtn" class="btn btn-secondary">Clear</button>
                </div>
             </div>

                    </div>
                </div>
            </div>

                        <div class="table-responsive">
                            <table id="addTraineeTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Payment Mode</th>
                                        <th>Received By </th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                             <tbody>
                                <?php if (mysqli_num_rows($resPayment) > 0): ?>
                                    <?php $i=1; while($row = mysqli_fetch_assoc($resPayment)): ?>
                                        <tr>
                                            <td> <?php echo $i; $i++; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                                            <td><?php echo $row['person_name']; ?></td>
                                            <td><?php echo $row['payment_mode']; ?></td>
                                            <td><?php echo $row['created_by']; ?></td>
                                            <td>₹<?php echo number_format($row['paid_amount'], 2); ?></td>
                                           
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6">No payment records found.</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>
    <script src="js_functions/payment.js" type="text/javascript"></script>
    </body>
</html>