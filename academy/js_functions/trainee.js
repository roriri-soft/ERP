
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