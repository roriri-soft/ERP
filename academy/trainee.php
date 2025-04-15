<?php
    include("include/trainee.php"); 
?>
<!doctype html>
<html lang="en">
<?php include("include/head.php"); ?>
<body>
    <div class="wrapper">
        <?php include("include/top.php");?>
        <?php include("include/left.php");?>
        <div class="page-wrapper">
            <div class="page-content">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <h2 class="page-title">Trainee</h2>
                        <div class="position-relative" style="height: 80px;">                          
                            <button type="button" id="addTraineeBtn" class="btn btn-primary position-absolute top-0 end-0" data-bs-toggle="modal" data-bs-target="#addTraineeModal">Add Trainee</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid py-4">
                            <div class="card shadow-sm p-4">
                                <div class="row g-3">
                                    <div class="col-md-3 col-12">
                                        <label for="reportStartDate" class="form-label">Start Date</label>
                                        <input type="date" id="reportStartDate" class="form-control" />
                                        <span id="startDateError" class="text-danger small"></span>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <label for="endDate" class="form-label">End Date</label>
                                        <input type="date" id="endDate" class="form-control" />
                                        <span id="endDateError" class="text-danger small"></span>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <label for="durationFilter" class="form-label">Duration (Months)</label>
                                        <input type="number" id="durationFilter" class="form-control" min="1" max="24" placeholder="Enter duration" />
                                        <span id="daysError" class="text-danger small"></span>
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
                                    <div class="col-md-3 col-12 d-flex align-items-end">
                                        <div class="w-100 d-flex justify-content-between">
                                            <button id="filterBtn" class="btn btn-primary w-48">Filter</button>
                                            <button id="clearBtn" class="btn btn-secondary w-48">Clear</button>
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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($resTrainee) > 0) {
                                        $sno = 1; 
                                        while ($row = mysqli_fetch_assoc($resTrainee)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['phone_number']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td>
                                            <button class="coustome_btn text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="View" onclick="window.location.href='viewTrainee.php?id=<?php echo $row['id']; ?>';">                                            
                                                <i class="lni lni-eye"></i>
                                            </button>
                                            <button type="button" class="coustome_btn text-warning" onclick="goEditTrainee(<?php echo $row['id']; ?>);" data-bs-toggle="modal" data-bs-target="#editTraineeModal">
                                                <i class="lni lni-pencil"></i>
                                            </button>
                                            <button class="coustome_btn text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="goDeleteTrainee(<?php echo $row['id']; ?>);">
                                                <i class="lni lni-trash"></i>
                                            </button>
                                            <a href="listSyllabus.php?traineeId=<?php echo $row['id']; ?>">
                                                <button class="coustome_btn text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Syllabus">
                                                    <i class="bi bi-book"></i>
                                                </button>
                                            </a>
                                            <a href="listApplication.php?traineeId=<?php echo $row['id']; ?>">
                                                <button class="coustome_btn text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Application">
                                                    <i class="bi bi-file-text"></i>
                                                </button>
                                            </a>
                                            <a href="traineeMiniProject.php?traineeId=<?php echo $row['id']; ?>">
                                                <button class="coustome_btn text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Projects">
                                                    <i class="bi bi-diagram-3"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                            $sno++;
                                            }
                                        } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center"> trainees Not found</td>
                                    </tr>
                                    <?php
                                        }
                                        mysqli_free_result($resTrainee);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php include("modal/trainee.php");?>
            </div>
            <?php include("include/footer.php"); ?>
        </div>
    </div>
    </body>
</html>

