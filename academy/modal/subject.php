<!-- Modal -->
<div class="modal fade" id="addSubjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="frmAddStudent" id="addSubject" enctype="multipart/form-data">
                <input type="hidden" name="hdnAction" value="addSubject">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Add Subject</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="row">
                    <div class="col-sm-6">
                            <div class="form-group pb-3">
                                <label for="course_name" class="form-label"><b>Course Name</b></label>
                                <select class="form-control" id="course_name" name="course_name" required="required">
                                        
                                    <option>----select----</option>

                                        
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group pb-3">
                                <label for="sub_name" class="form-label"><b>Subject Name</b></label>
                                <input type="text" class="form-control" placeholder="Enter topic name" name="sub_name" id="sub_name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group pb-3">
                                <label for="sub_duration" class="form-label"><b>Subject Duration</b></label>
                                <input type="text" class="form-control" placeholder="Enter last name" name="sub_duration" id="sub_duration">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- edit modal for subject -->

                              <!-- Modal -->
                              <div class="modal fade" id="editSubjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmEditSubject" id="editSubject" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="hdnEditSubject">
                    <input type="hidden" name="editId" value="" id="editId">
                    
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Subject</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                        <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editcourse_name" class="form-label"><b>Course Name</b></label>
                                    <input type="text" class="form-control" placeholder="Enter topic name" name="edit_name" id="edit_name" required="required" disabled>
                                </div>
                        </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editsub_name" class="form-label"><b>Subject Name</b></label>
                                    <input type="text" class="form-control" placeholder="Enter topic name" name="editsub_name" id="editsub_name" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="edit_duration" class="form-label"><b>Subject Duration</b></label>
                                    <input type="text" class="form-control" placeholder="Enter topic name" name="edit_duration" id="edit_duration" required="required"> 
                                </div>
                            </div>
                        </div>
                        </div>
                        <div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateBtn">Save changes</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->