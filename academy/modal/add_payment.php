
<div class="modal fade" id="PaymenttraineeModal" tabindex="-1" aria-labelledby="PaymenttraineeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PaymenttraineeModalLabel">Add Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Payment form starts here -->
        <form id="paymentForm" action="action/add_payment.php" method="POST">
          <div class="mb-3">
            <label for="paymentDate" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="paymentDate" name="paymentDate" required>
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
          </div>
          <div class="mb-3">
            <label for="received_by" class="form-label">Received By</label>
            <input type="text" class="form-control" id="received_by" name="received_by" required>
          </div>
          <div class="mb-3">
            <label for="paymentMode" class="form-label">Payment Mode</label>
            <select class="form-select" id="paymentMode" name="paymentMode" required>
              <option value="Cash">Cash</option>
              <option value="Online Payment">Online Payment</option>
              <option value="Cheque">Cheque</option>
            </select>
          </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit Payment</button>
          </div>
        </form>
        <!-- Payment form ends here -->
      </div>
    </div>
  </div>
</div>
