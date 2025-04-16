console.log("course.js script is loaded");
//Editcourse
function goEditcourse(id) {
  $.ajax({
    url: "action/fetch_course.php", // You’ll create this file
    type: "POST",
    data: { course_id: id },
    dataType: "json",
    success: function(response) {
      $('#edit_course_id').val(response.course.id);
      $('#edit_course_name').val(response.course.name);

      let subjects = response.subjects;
      let selectedSubjects = response.selected_subjects;

      let html = '';
      subjects.forEach(sub => {
        const checked = selectedSubjects.includes(sub.id.toString()) ? 'checked' : '';
        html += `
          <div class="col-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="subject[]" value="${sub.id}" id="sub_${sub.id}" ${checked}>
              <label class="form-check-label" for="sub_${sub.id}">${sub.name}</label>
            </div>
          </div>
        `;
      });
      $('#edit_subject_list').html(html);
    }
  });
}
//submit edit course

$(document).ready(function () {
  $('#editCourseForm').on('submit', function (e) {
    e.preventDefault();

    const formData = $(this).serialize();

    $.ajax({
      url: "action/update_course.php",
      type: "POST",
      data: formData,
      success: function (response) {
        if (response.trim() === "success") {
          Swal.fire({
            icon: 'success',
            title: 'Updated!',
            text: 'Course updated successfully!',
            showConfirmButton: false,
            timer: 2000
          });

          $('#editCourseModal').modal('hide');

          setTimeout(() => {
            location.reload();
          }, 2000); // reload after 2 sec
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "Update failed: " + response
          });
        }
      }
    });
  });
});
// delete course
function goDeleteCourse(course_id) {
  Swal.fire({
      title: "Are you sure?",
      text: "This will permanently delete the course.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Yes, delete it!"
  }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url: "action/delete_course.php",
              type: "POST",
              data: { course_id: course_id },
              success: function (response) {
                  if (response.trim() === "success") {
                      Swal.fire("Deleted!", "The course has been deleted.", "success");
                      setTimeout(() => location.reload(), 1000);
                  } else {
                      Swal.fire("Error!", response, "error");
                  }
              }
          });
      }
  });
}
$('#addCourseForm').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    url: 'action/add_course.php',
    type: 'POST',
    data: $(this).serialize(),
    success: function(response) {
      if (response == 'success') {
          Swal.fire({
              title: 'Success!',
              text: 'Course added successfully.',
              icon: 'success',
              confirmButtonText: 'OK'
          }).then(function() {
              $('#staticBackdrop').modal('hide');
              $('#addCourseForm')[0].reset();
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
    error: function(xhr, status, error) {
        Swal.fire({
            title: 'Error!',
            text: 'There was an issue with the request.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
  });
});

$(document).ready(function() {
  $('#duration').select2({
    placeholder: "Select durations",
    allowClear: true,
    width: '100%',
    dropdownParent: $('#staticBackdrop') // 👈 set this to your modal ID
  });
});


