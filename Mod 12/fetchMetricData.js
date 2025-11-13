async function fetchMetricData() {
    const response = await fetch('./fetch.php');
    const data = await response.json();
    return data;
}

async function renderChart() {
    const metricData = await fetchMetricData();

    //process data
    const labels = metricData.map(item => item.metric + ' (' + new Date(item.time_created).toLocaleDateString() + ')');
    const values = metricData.map(item => item.value);
    //create chart
    const ctx = document.getElementById('metricsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: "Metric Value",
                data: values,
                borderWidth: 1,
                backgroundColor: 'rgba(75,192,192,.2)',
                borderColor: 'rgba(75 ,192,192,1)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

renderChart();