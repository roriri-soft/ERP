<?php
    session_start();
    include("include/course.php"); 
?>
<!doctype html>
<html lang="en">

<?php include("head.php");?>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include("left.php");?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include("top.php");?>
		<!--end header -->
        
		<!--start page wrapper -->
		<div class="page-wrapper">
        <div class="page-content">
                
				
                <div class="page-title-box">
                    
                    <div class="page-title-right">
                        <h4 class="page-title">Course</h4>
                      
    
                    </div>
                       
                </div>
    <!-- Add Course Button (Right Aligned) -->
<div class="d-flex justify-content-end mb-3">
    <button type="button" id="addCourseBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
        Add Course
    </button>
</div>

<!-- Your Table -->
<table class="table table-bordered">
    <!-- table header and body -->
</table>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dt-buttons btn-group">      
                                    <button class="btn btn-outline-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="scroll-horizontal-datatable" type="button"><span>Copy</span></button> 
                                    <button class="btn btn-outline-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="scroll-horizontal-datatable" type="button"><span>Excel</span></button> <button class="btn btn-outline-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example2" type="button"><span>PDF</span></button> <button class="btn btn-outline-secondary buttons-print" tabindex="0" aria-controls="example2" type="button"><span>Print</span></button> </div></div><div class="col-sm-12 col-md-6"><div id="example2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example2"></label></div></div></div><div class="row"><div class="col-sm-12">
                                <table id="scroll-horizontal-datatable" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S. No: activate to sort column descending" style="width: 100.828px;">S. No</th>
                                            <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 124.953px;">Course</th>
                                            <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 285.125px;">Subject</th>
                                            <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 147.938px;">Duration</th>
                                            <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 147.938px;">Incharge Name</th>

                                            <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 285.125px;">Fees</th>
                                            <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 303.766px;">Action</th></tr>
                                    </thead>
                                    <?php
                                        if (mysqli_num_rows($rescourse) > 0) {
                                        $sno = 1; 
                                        while ($row = mysqli_fetch_assoc($rescourse)) {
                                    ?>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?php  echo $sno; ?></td>
                                                <td><?php echo $row['course_name']; ?></td>
                                                <td><?php echo $row['subject_names']; ?></td>
                                                <td><?php echo $row['duration']; ?></td>
                                                <td><?php echo $row['incharge_name']; ?></td>
                                                <td><?php echo $row['fee']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditcourse(<?php echo $row['course_id']; ?>);" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                                                        <i class='bx bx-pencil'></i>
                                                    </button>
                                                    <button class="btn btn-circle btn-danger text-white" onclick="goDeleteCourse(<?php echo $row['course_id']; ?>);">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
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
                                                    mysqli_free_result($rescourse);
                                                ?>
                                            
                                        </tbody>

                                    </table>
                                </div>
                             </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 3 of 3 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="example2_previous">
                                            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Prev</a>
                                        </li>
                                        <li class="paginate_button page-item active">
                                            <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                        </li>
                                        <li class="paginate_button page-item next disabled" id="example2_next">
                                            <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
		<!--end page wrapper -->
		<!--start overlay-->
    <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2024. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->


	<!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="modal-header gap-2">
			  <div class="position-relative popup-search w-100">
				<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
      <?php include("modal/course.php");?>
    <!-- end search modal -->
</body>
</html>
