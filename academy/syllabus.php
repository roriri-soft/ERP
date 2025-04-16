<?php
    session_start();
    include("include/syllabus.php"); 
?>
<!doctype html>
<html lang="en">

<?php include("include/head.php");?>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include("include/left.php");?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include("include/top.php");?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
            <div class="page-content" id="syllabus-content">
                <?php $row = mysqli_fetch_assoc($viewSubject) ?>
                <h4 id="h4subId">Syllabus :  <?php echo $row['subject_name']; ?></h4>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button type="button" class="btn btn-danger" onclick="javascript:location.href='subject.php'">Back to Subjects</button>
                    <button type="button" id="addTopicBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addTopicModal">Add Topic</button>
                </div>
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Topic</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="syllabusTableBody">
                        <tbody>
                                    <?php
                                    if (mysqli_num_rows($viewSubject) > 0) {
                                        $sno = 1; 
                                        while ($row = mysqli_fetch_assoc($viewSubject)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $row['syllabus_name']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                       
                                        <td>
                                           
                                        </td>
                                    </tr>
                                    <?php
                                        $sno++;
                                        }
                                    } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No trainees found</td>
                                    </tr>
                                    <?php
                                    }
                                mysqli_free_result($viewSubject);
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div> 
        </div>
        <?php include("include/footer.php");?>
    </div>
</body>
</html>