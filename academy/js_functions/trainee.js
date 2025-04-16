
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
                url: 'action/trainee.php',
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
                url: 'action/trainee.php',
                type: 'POST',
                data: {
                    type: 'get_fee_discount',
                    course_id: courseId,
                    duration: duration
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    $('#fee').val(response.fee);
                    $('#discount').val(response.discount);
                },
                error: function (xhr) {
                    console.log("AJAX Error:", xhr.responseText);
                    alert("Something went wrong. Check console for details.");
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

// edit modal for trainee


$(document).ready(function () {
    $('.editTraineeBtn').click(function () {
        // Get values from data attributes
        var id = $(this).data('id');
        var name = $(this).data('name');
        var regno = $(this).data('regno');
        var phone = $(this).data('phone');
        var pemail = $(this).data('pemail');
        var course = $(this).data('course');
        var duration = $(this).data('duration');
        var fee = $(this).data('fee');
        var discount = $(this).data('discount');
        var dob = $(this).data('dob');
        var doj = $(this).data('doj');
        var address = $(this).data('address');
        var blood_group = $(this).data('blood_group');
        var gender = $(this).data('gender');

        // Set values in modal fields
        $('#name').val(name);
        $('#regno').val(regno);
        $('#phone').val(phone);
        $('#pemail').val(pemail);
        $('#course').val(course).trigger('change'); // If you have dependent dropdown
        $('#duration').val(duration);
        $('#fee').val(fee);
        $('#discount').val(discount);
        $('#dob').val(dob);
        $('#doj').val(doj);
        $('#address').val(address);
        $('#blood_group').val(blood_group);
        $('#gender').val(gender);

        // Show the modal
        $('#addTraineeModal').modal('show');
    });
});

