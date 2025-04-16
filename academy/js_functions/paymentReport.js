

let dataTable;
$(document).ready(function () {
    // Initialize DataTable and store the instance
    dataTable = $('#addTraineeTable').DataTable({
        "pageLength": 8,
        "lengthChange": false,
        "ordering": true,
        "searching": true,
        "paging": true
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const filterBtn = document.getElementById("filterBtn");
    const clearBtn = document.getElementById("clearBtn");

    if (!filterBtn || !clearBtn) return;

    filterBtn.addEventListener("click", function (e) {
        e.preventDefault();

        const person_id = document.getElementById("person_id").value;
        const course_id = document.getElementById("courseFilter").value;
        const payment_date = document.getElementById("reportPaymentDate").value;

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "action/paymentReport.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                const tbody = document.querySelector("#addTraineeTable tbody");
                if (tbody) {
                    // Destroy existing DataTable before updating
                    if ($.fn.DataTable.isDataTable('#addTraineeTable')) {
                        dataTable.destroy();
                    }

                    tbody.innerHTML = xhr.responseText;

                    // Reinitialize DataTable after updating rows
                    dataTable = $('#addTraineeTable').DataTable({
                        "pageLength": 8,
                        "lengthChange": false,
                        "ordering": true,
                        "searching": true,
                        "paging": true
                    });
                }
            } else {
                alert("Error fetching payment data.");
            }
        };

        const params = `person_id=${encodeURIComponent(person_id)}&course_id=${encodeURIComponent(course_id)}&payment_date=${encodeURIComponent(payment_date)}`;
        xhr.send(params);
    });

    clearBtn.addEventListener("click", function (e) {
        e.preventDefault();

        document.getElementById("person_id").value = "";
        document.getElementById("courseFilter").value = "";
        document.getElementById("reportPaymentDate").value = "";

        filterBtn.click(); // reload all data
    });
});
