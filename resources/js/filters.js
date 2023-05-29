function applyFilters() {
    // Get the filter values
    var firstName = document.querySelector('input[name="customer_first_name"]').value;
    var lastName = document.querySelector('input[name="customer_last_name"]').value;
    var carModel = document.querySelector('input[name="car_model"]').value;
    var transactionType = document.querySelector('select[name="transaction_type"]').value;
    var transactionStatus = document.querySelector('select[name="transaction_status"]').value;

    // Build the query string with the filter values
    var queryString = '?customer_first_name=' + encodeURIComponent(firstName) +
                      '&customer_last_name=' + encodeURIComponent(lastName) +
                      '&car_model=' + encodeURIComponent(carModel) +
                      '&transaction_type=' + encodeURIComponent(transactionType) +
                      '&transaction_status=' + encodeURIComponent(transactionStatus);

    // Redirect to the index page with the filter query string
    window.location.href = '{{ route("transactions.index") }}' + queryString;
}

function resetFilters() {
    // Redirect to the index page without any filter query string
    window.location.href = '{{ route("transactions.index") }}';
}