
<!-- Add Course Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="addCourseForm">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="course_name" class="form-label">Course Name</label>
                <input type="text" class="form-control" name="course_name" id="course_name" required>
            </div>
            <div class="mb-3">
              <label class="form-label"><b>Select Subjects</b></label>
              <div class="row">
                <?php
                $subjects = mysqli_query($conn, "SELECT id, name FROM subject");
                while ($row = mysqli_fetch_assoc($subjects)) {
                  echo '<div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subjects[]" value="' . $row['id'] . '">
                            <label class="form-check-label">' . $row['name'] . '</label>
                          </div>
                        </div>';
                }
                ?>
              </div>
            </div>

            <div class="mb-3">
              <label for="duration" class="form-label">Duration</label>
              <select id="duration" name="duration[]" class="form-select" multiple required>
                <option value="1 month">1 month</option>
                <option value="2 months">2 months</option>
                <option value="3 months">3 months</option>
                <option value="4 months">4 months</option>
                <option value="5 months">5 months</option>
                <option value="6 months">6 months</option>
                <option value="7 months">7 months</option>
                <option value="8 months">8 months</option>
                <option value="9 months">9 months</option>
                <option value="10 months">10 months</option>
                <option value="11 months">11 months</option>
                <option value="12 months">12 months</option>
              </select>
            </div>

      </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Course</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Course Modal -->
<div class="modal fade" id="editCourseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editCourseForm">
        <input type="hidden" name="course_id" id="edit_course_id">

        <div class="modal-header">
          <h4 class="modal-title" id="editCourseModalLabel">Edit Course</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_course_name" class="form-label"><b>Course Name</b></label>
            <input type="text" class="form-control" id="edit_course_name" name="course_name" required>
          </div>

          <div class="mb-3">
            <label class="form-label"><b>Subjects</b></label>
            <div class="row" id="edit_subject_list">
              <!-- Checkboxes will be loaded by JS -->
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
