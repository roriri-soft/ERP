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
        xhr.open("POST", "action/filter_payment.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                const tbody = document.querySelector("#addTraineeTable tbody");
                if (tbody) {
                    tbody.innerHTML = xhr.responseText;
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

        // Clear filters
        document.getElementById("person_id").value = "";
        document.getElementById("courseFilter").value = "";
        document.getElementById("reportPaymentDate").value = "";

        // Reload all data
        filterBtn.click();
    });
});
