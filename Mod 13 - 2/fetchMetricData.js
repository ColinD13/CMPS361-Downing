async function fetchMetricData() {
    const response = await fetch('./fetch.php');
    const data = await response.json();
    return data;
}

async function fetchMetricCollegeData() {
    const response_college = await fetch('./fetch_college.php');
    const data_college = await response_college.json();
    return data_college;
}

async function renderChart() {
    const metricData = await fetchMetricData();

    //process data
    const labels = metricData.map(item => item.team);
    const values = metricData.map(item => Number(item.player_count));
    //create chart
    const ctx = document.getElementById('metricsChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: "Players Per NFL Team",
                data: values,
                borderWidth: 1,
                backgroundColor: 'rgba(75,192,192,.2)',
                borderColor: '#1c3d61'
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

async function renderChartCollege() {
    const metricData = await fetchMetricCollegeData();

    //process data
    const labels = metricData.map(item => item.college);
    const values = metricData.map(item => Number(item.player_count));
    //create chart
    const ctx = document.getElementById('metricsChartCollege').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: "Players Per College Team",
                data: values,
                borderWidth: 1,
                backgroundColor: 'rgba(75,192,192,.2)',
                borderColor: '#1c3d61'
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
renderChartCollege();