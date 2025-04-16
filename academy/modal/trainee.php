<div class="modal fade" id="addTraineeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTraineeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form name="frmAddTrainee" id="addTrainee" enctype="multipart/form-data">
                <input type="hidden" name="hdnAction" value="addTrainee">
                <div class="modal-header">
                    <h4 class="modal-title">Add Trainee</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="row p-3">
                        <div class="col-12">
                            <h5 class="pb-2">Basic Details</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="name" class="form-label"><b>Name</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" required>
                                        <div id="fnameError" style="color: red" class="error-message">Name is required.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="regno" class="form-label"><b>Register.No</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Register Number" name="regno" id="regno" required>
                                        <div id="fregnoError" style="color: red" class="error-message">Register.No is required.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="phone" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                        <input type="number" pattern="[0-9]{10}" class="form-control" placeholder="Enter Mobile No" name="phone" id="phone" required>
                                        <div id="phoneError" style="color: red" class="error-message">Phone is required.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="pemail" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Enter Email" name="pemail" id="pemail">
                                        <div id="emailError" style="color: red" class="error-message">Email ID is required.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="course" class="form-label"><b>Course</b><span class="text-danger">*</span></label>
                                        <select id="course" class="form-select">
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
                                        <div id="courseError" style="color: red" class="error-message">Course is required.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="course" class="form-label"><b>Duration</b><span class="text-danger">*</span></label>
                                        <select id="duration" class="form-select">
                                            <option value="">-- Select Duration --</option>
                                           
                                        </select>
                                        <div id="durationError" style="color: red" class="error-message">Duration is required.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="fee" class="form-label"><b>Fee</b></label>
                                        <input type="number" class="form-control" placeholder="Enter Fee Amount" name="fee" id="fee" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="discount" class="form-label"><b>Discount Amount (₹)</b></label>
                                        <input type="text" class="form-control" name="discount" id="discount" readonly>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="fee_amount" class="form-label"><b>Fee Amount</b><span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Enter Fee Amount" name="fee_amount" id="fee_amount">
                                        <div id="fee_amountError" style="color: red" class="error-message">Fee Amount is required.</div>
                                    </div>
                                </div> -->
                            </div>
                        </div>     
                        <div class="col-12 mt-2">
                            <h5 class="pb-2">Additional Details</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group pb-3">
                                        <label for="dob" class="form-label"><b>DOB</b></label>
                                        <input type="date" class="form-control" placeholder="Enter Date Of Birth" name="dob" id="dob">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group pb-3">
                                        <label for="doj" class="form-label"><b>DOJ</b></label>
                                        <input type="date" class="form-control" placeholder="Enter Date Of Joining" name="doj" id="doj">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group pb-3">
                                        <label for="address" class="form-label"><b>Address</b></label>
                                        <input type="text" class="form-control" placeholder="Enter the Address" name="address" id="address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group pb-3">
                                        <label for="blood_group" class="form-label"><b>Bloog Group</b></label>
                                        <input type="text" class="form-control" placeholder="Enter Blood Group" name="blood_group" id="blood_group">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group pb-3">
                                        <label for="gender" class="form-label"><b>Gender</b></label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option selected="" value="">--Select Gender--</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pb-3">
                                        <label for="profile" class="form-label"><b>Image</b></label>
                                        <input type="file" class="form-control" placeholder="Upload Image" name="profile" id="profile">
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="submitBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    
$(document).ready(function () {
    // When course is selected
    $('#course').on('change', function () {
        let courseId = $(this).val();

        // Clear previous options
        $('#duration').html('<option value="">-- Select Duration --</option>');
        $('#fee').val('');
        $('#discount').val('');

        if (courseId) {
            $.ajax({
                url: 'trainee.php',
                type: 'POST',
                data: {
                    type: 'get_durations',
                    course_id: courseId
                },
                success: function (response) {
                    $('#duration').append(response);
                    console.log("Durations loaded:", response);
                },
                error: function (xhr, status, error) {
                    console.log("Error loading durations:", error);
                }
            });
        }
    });

    // When duration is selected
    $('#duration').on('change', function () {
        let courseId = $('#course').val();
        let duration = $(this).val();

        if (courseId && duration) {
            $.ajax({
                url: 'trainee.php',
                type: 'POST',
                data: {
                    type: 'get_fee_discount',
                    course_id: courseId,
                    duration: duration
                },
                dataType: 'json',
                success: function (response) {
                    $('#fee').val(response.fee);
                    $('#discount').val(response.discount);
                },
                error: function (xhr, status, error) {
                    console.log("Error loading fee/discount:", error);
                }
            });
        }
    });
});


    // On Form Submit
    $("#addTrainee").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'action/trainee.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Trainee added successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function () {
                        $('#addTraineeModal').modal('hide');
                        $('#addTrainee')[0].reset();
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response,
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an issue with the request.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });





// console.log("Trainee.js script is loaded");
// $(document).ready(function() {
//     $('#course').on('change', function () {
//         let courseId = $(this).val();
//         $('#duration').html('<option value="">-- Select Duration --</option>');
//         $('#fee').val('');
//         if (courseId) {
//             $.ajax({
//                 url: 'trainee.php',
//                 type: 'POST',
//                 data: { course_id: courseId },
//                 success: function (response) {
//                     $('#duration').append(response);
//                 }
//             });
//         }
//     });
    
//     $('#duration').on('change', function () {
//         let courseId = $('#course').val();
//         let duration = $(this).val();
    
//         if (courseId && duration) {
//             $.ajax({
//                 url: 'trainee.php',
//                 type: 'POST',
//                 data: {
//                     course_id: courseId,
//                     duration: duration
//                 },
//                 success: function (fee) {
//                     $('#fee').val(fee);
//                 }
//             });
//         }
//     });
    
//     $("#addTrainee").submit(function(e) {
//         e.preventDefault();
//         var formData = new FormData(this);
//         $.ajax({
//             url: 'action/trainee.php', 
//             type: 'POST',
//             data: formData,
//             contentType: false,  
//             processData: false,  
//             success: function(response) {
//                 if (response == 'success') {
//                     Swal.fire({
//                         title: 'Success!',
//                         text: 'Trainee added successfully.',
//                         icon: 'success',
//                         confirmButtonText: 'OK'
//                     }).then(function() {
//                         $('#addTraineeModal').modal('hide');
//                         $('#addTrainee')[0].reset();
//                         location.reload();
//                     });
//                 } else {
//                     Swal.fire({
//                         title: 'Error!',
//                         text: response,
//                         icon: 'error',
//                         confirmButtonText: 'Try Again'
//                     });
//                 }
//             },
//             error: function(xhr, status, error) {
//                 Swal.fire({
//                     title: 'Error!',
//                     text: 'There was an issue with the request.',
//                     icon: 'error',
//                     confirmButtonText: 'OK'
//                 });
//             }
//         });
//     });
// });
</script>