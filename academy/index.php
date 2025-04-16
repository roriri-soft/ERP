<?php

	session_start();
	// include("include/dashboard.php");

?>

<!doctype html>
<html lang="en">	
	<?php include("include/head.php"); ?>
<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include "include/left.php";?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include "include/top.php";?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">


			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
					<div class="col">
						<div class="card radius-10">
						    <a href="trainee.php">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Trainees</p>
										<h4 class="my-1">0
										</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>$34 from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Trainer</p>
										<h4 class="my-1">1
										</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>$34 from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Completed Application</p>
										2
										</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>$24 from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-group'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Completed Syllabus</p>
										<h4 class="my-1">
										2
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>$34 from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-binoculars'></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card radius-10">
						    <a href="course.php">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Courses</p>
										<h4 class="my-1">3
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					
					<div class="col">
						<div class="card radius-10">
						    <a href="trainee.php">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Three Month Student</p>
										<h4 class="my-1">2
										</h4>
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					
					<div class="col">
						<div class="card radius-10">
						    <a href="trainee.php">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Four Month Student</p>
										<h4 class="my-1">1
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					
					<div class="col">
						<div class="card radius-10">
						    <a href="trainee.php">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Six Month Student</p>
										<h4 class="my-1">0
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					
					
					
					<div class="col">
						<div class="card radius-10">
						    <a href="trainee.php">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">One Year Student</p>
										<h4 class="my-1">2
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					
					
					<div class="col">
						<div class="card radius-10">
						    <a href="trainee.php">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Two Year Student</p>
										<h4 class="my-1">2
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>	
					

					<div class="col">
						<div class="card radius-10">
						    <a href="traineePayment.php">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Income in this Month</p>
										<h4 class="my-1">1
										</h4>
									</div>
									<div class="text-success ms-auto font-35"><i class='bx bxl-shopify'></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					<div class="col">
						<div class="card bg-primary text-white">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Completed Tasks</p>
										<h4 class="my-1 text-white">
										       30/123
										</h4>
									</div>
									<div class="widgets-icons bg-light-dark text-dark ms-auto"><i class="bx bxs-calendar-check"></i>
									</div>
								</div>
							</div>
							    <div class="px-3 pb-3"> 
                                    <div class="progress" style="height:7px;">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 24.39%;" aria-valuenow="24.39" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
						</div>
					</div>
					
					<div class="col">
						<div class="card bg-dark text-white">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Completed Topics</p>
										<h4 class="my-1 text-white">
										       80/423
										</h4>
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-book"></i>
									</div>
								</div>
							</div>
							    <div class="px-3 pb-3"> 
                                    <div class="progress" style="height:7px;">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 18.9%;" aria-valuenow="18.9" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
						</div>
					</div>
					
					<div class="col">
						<div class="card bg-info text-white">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Attendance Percentage</p>
										<h4 class="my-1 text-white">
										       92%
										</h4>
									</div>
									<div class="widgets-icons bg-light-dark text-dark ms-auto"><i class="bx bxs-bar-chart-alt-2"></i>
									</div>
								</div>
							</div>
							    <div class="px-3 pb-3"> 
                                    <div class="progress" style="height:7px;">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 92%;" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
						</div>
					</div>
					
					<div class="col">
						<div class="card bg-success text-white">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Your Trainers</p>
										<h4 class="my-1 text-white">
										       Xxxxx, Yyyyy
										</h4>
									</div>
									<div class="widgets-icons bg-light-dark text-dark ms-auto"><i class="bx bxs-user"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col">
						<div class="card bg-danger text-white">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Leaves</p>
										<h4 class="my-1 text-white">
										       4 Days
										</h4>
									</div>
									<div class="widgets-icons bg-light-dark text-dark ms-auto"><i class="bx bxs-calendar-minus"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col">
						<div class="card bg-warning text-white">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Remaining Days</p>
										<h4 class="my-1 text-white">
										       250 Days
										</h4>
									</div>
									<div class="widgets-icons bg-light-dark text-dark ms-auto"><i class="bx bxs-time"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

		
				</div>
				</div>
				<!--end row-->
				
			

			
			
		
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include "include/footer.php"; ?>
	</div>
	<!--end wrapper-->




	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="<?php echo $bootsrapBundle; ?>"></script>
	<!--plugins-->
	<script src="<?php echo $js; ?>"></script>
	<script src="<?php echo $simplebar;?>"></script>
	<script src="<?php echo $mentimenu; ?>"></script>
	<script src="<?php echo $perfectScrolbar;  ?>"></script>
	<script src="<?php echo $charts;  ?>"></script>
	<script src="<?php echo $datatableMin; ?>"></script>
	<script src="<?php echo $datatbaleBootstrap;?>"></script>
	
	<script src="<?php echo $index;?>"></script>
	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>