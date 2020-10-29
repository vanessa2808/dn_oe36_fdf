window.onload = function () {
    Chart.defaults.global.defaultFontColor = '#000000';
    Chart.defaults.global.defaultFontFamily = 'Arial';
    var lineChart = document.getElementById('order-chart-month');
    var dataStatistical = [0, 0, 0, 0];
    $.ajax({
        type: 'GET',
        url: 'api/statistical/month',
        success: function (res) {
            for (let item in res) {
                dataStatistical[item] = res[item];
            }
            var myChart = new Chart(lineChart, {
                type: 'bar',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [
                        {
                            label: 'Revenue per week',
                            backgroundColor: 'rgba(0, 128, 128, 0.3)',
                            borderColor: 'rgba(0, 128, 128, 0.7)',
                            borderWidth: 1,
                            data: dataStatistical,
                        },
                    ]
                },
                options: {
                    animation: {
                        duration: 1000,
                        easing: 'linear'
                    },
                    scales: {
                        yAxes: [{
                            stacked: true
                        }]
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                            }
                        }]
                    },
                },
            });
        },
        error: function (err) {
            alert('Has error');
        }
    });

};
