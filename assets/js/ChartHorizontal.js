Chart.defaults.global.defaultFontFamily = "Lato";

var horizontalBarChart = new Chart(horizontalBarChartCanvas, {
    type: 'horizontalBar',
    data: {
        labels: ["2017-18", "2018-19", "2019-20"],
        datasets: [{
            data: [60000, 70000, 80000,],
            backgroundColor: ["#cc65fe", "#ff6384", "#36a2eb",],
        }]
    },
    options: {
        tooltips: {
            enabled: false
        },
        responsive: true,
        legend: {
            display: false,
            position: 'bottom',
            fullWidth: true,
            labels: {
                boxWidth: 20,
                padding: 50
            }
        },
        scales: {
            yAxes: [{
                barPercentage: 0.75,
                gridLines: {
                    display: true,
                    drawTicks: true,
                    drawOnChartArea: false
                },
                ticks: {
                    fontColor: '#555759',
                    fontFamily: 'Lato',
                    fontSize: 11
                }

            }],
            xAxes: [{
                gridLines: {
                    display: true,
                    drawTicks: false,
                    tickMarkLength: 4,
                    drawBorder: false
                },
                ticks: {
                    padding: 5,
                    beginAtZero: true,
                    fontColor: '#555759',
                    fontFamily: 'Lato',
                    fontSize: 11,
                    callback: function (label, index, labels) {
                        return label / 1000;
                    }

                },
                scaleLabel: {
                    display: true,
                    padding: 10,
                    fontFamily: 'Lato',
                    fontColor: '#555759',
                    fontSize: 16,
                    fontStyle: 700,
                    labelString: 'Company Visited'
                },

            }]
        }
    }
});