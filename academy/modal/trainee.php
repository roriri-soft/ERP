<div class="modal fade" id="addTraineeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTraineeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form name="frmAddTrainee" id="addTrainee" enctype="multipart/form-data">
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
                                    <label><b>Course</b> <span class="text-danger">*</span></label>
                                    <select id="course" class="form-select">
                                        <option value="">-- Select Course --</option>
                                        <?php
                                        $query = "SELECT id, name FROM course WHERE status='Active'";
                                        $res = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                               
                                <div class="col-md-6">
                                    <label><b>Duration</b> <span class="text-danger">*</span></label>
                                    <select id="duration" class="form-select">
                                        <option value="">-- Select Duration --</option>
                                    </select>
                                </div>

                                
                                <div class="col-md-6 mt-3">
                                    <label><b>Fee</b></label>
                                    <input type="number" id="fee" class="form-control" readonly>
                                </div>


                                   <div class="col-md-6 mt-3">
                                    <label><b>Discount</b></label>
                                    <input type="text" id="discount" class="form-control" readonly>
                                </div>                             
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
<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<!-- edit modal for trainee -->

<div class="modal fade" id="editTraineeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editTraineeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form name="frmEditTrainee" id="editTrainee" enctype="multipart/form-data">
                <input type="hidden" name="edit_person_id" id="edit_person_id">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Trainee</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="row p-3">
                        <div class="col-12">
                            <h5 class="pb-2">Basic Details</h5>
                            <div class="row">
                                <div class="col-md-6 pb-3">
                                    <label for="edit_name"><b>Name</b> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Enter Name">
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="edit_regno"><b>Register.No</b> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_regno" name="edit_regno" placeholder="Enter Register Number">
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="edit_phone"><b>Mobile No</b> <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="edit_phone" name="edit_phone" placeholder="Enter Mobile No">
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="edit_email"><b>Email</b> <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="edit_email" name="edit_email" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="edit_course"><b>Course</b></label>
                                    <select id="edit_course" name="edit_course" class="form-select">
                                        <option value="">-- Select Course --</option>
                                        <?php
                                        $query = "SELECT id, name FROM course WHERE status='Active'";
                                        $res = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="edit_duration"><b>Duration</b></label>
                                    <select id="edit_duration" name="edit_duration" class="form-select">
                                        <option value="">-- Select Duration --</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="edit_fee"><b>Fee</b></label>
                                    <input type="number" class="form-control" id="edit_fee" name="edit_fee" readonly>
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="edit_discount"><b>Discount</b></label>
                                    <input type="text" class="form-control" id="edit_discount" name="edit_discount" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            <h5 class="pb-2">Additional Details</h5>
                            <div class="row">
                                <div class="col-md-4 pb-3">
                                    <label for="edit_dob"><b>DOB</b></label>
                                    <input type="date" class="form-control" id="edit_dob" name="edit_dob">
                                </div>
                                <div class="col-md-4 pb-3">
                                    <label for="edit_doj"><b>DOJ</b></label>
                                    <input type="date" class="form-control" id="edit_doj" name="edit_doj">
                                </div>
                                <div class="col-md-4 pb-3">
                                    <label for="edit_address"><b>Address</b></label>
                                    <input type="text" class="form-control" id="edit_address" name="edit_address">
                                </div>
                                <div class="col-md-4 pb-3">
                                    <label for="edit_blood_group"><b>Blood Group</b></label>
                                    <input type="text" class="form-control" id="edit_blood_group" name="edit_blood_group">
                                </div>
                                <div class="col-md-4 pb-3">
                                    <label for="edit_gender"><b>Gender</b></label>
                                    <select id="edit_gender" name="edit_gender" class="form-select">
                                        <option value="">--Select Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="edit_profile"><b>Image</b></label>
                                    <input type="file" class="form-control" id="edit_profile" name="edit_profile">
                                    <small>Upload new to change</small>
                                    <div id="existing_profile" class="mt-2"></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="updateBtn" class="btn btn-success">Update changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

