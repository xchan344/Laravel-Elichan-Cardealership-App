document.addEventListener('DOMContentLoaded', function () {
    // Get the carTransactionData from the defined JavaScript variable
    var carTransactionData = window.carTransactionData;

    // Get the canvas element
    var carTransactionChartCanvas = document.getElementById('carTransactionChart').getContext('2d');

    // Create a new Chart instance
    var carTransactionChart = new Chart(carTransactionChartCanvas, {
        type: 'bar',
        data: {
            labels: carTransactionData.map(item => item.model),
            datasets: [{
                label: 'Total Transactions',
                data: carTransactionData.map(item => item.total_transactions),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
});
