console.log("Trainee.js script is loaded");
$(document).ready(function() {
    $("#addTrainee").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'action/trainee.php', 
            type: 'POST',
            data: formData,
            contentType: false,  
            processData: false,  
            success: function(response) {
                if (response == 'success') {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Trainee added successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
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
});

  