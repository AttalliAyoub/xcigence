let ctx = document.getElementById("chart-pie").getContext("2d");
let varialbe = document.getElementById("chart-pie-data").textContent.trim();
varialbe = Number.parseInt(varialbe);

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Red', 'Orange', 'Yellow',],
        datasets: [
            {
                label: 'Dataset 1',
                data: [1000 - varialbe, varialbe],
                backgroundColor: [
                    'transparent',
                    '#fff'
                ],
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        borderColor: 'transparent',
        circumference: 180,
        rotation: -90,
        plugins: {
            legend: {
                display: false,
                position: 'top',
            },
            title: {
                display: true,
                text: 'Final Score :' + varialbe,
                color: '#fff',
                position: 'bottom',
            }
        },
        // interaction: {
        //     intersect: false,
        //     mode: 'index',
        // },
    },

});

var ctx3 = document.getElementById("chart-bars").getContext("2d");
let vulnerabilities = document.getElementById("chart-bars-data").textContent.trim();
vulnerabilities = vulnerabilities.split(",").filter(v => v).map(v => Number.parseInt(v));

new Chart(ctx3, {
    type: "bar",
    data: {
        labels: ["High", "Critical", "Medium", "Low"],
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            // backgroundColor: "rgba(255, 255, 255, .8)",
            backgroundColor: [
                '#D81B60',
                '#43A047',
                '#1A73E8',
                '#fff'
            ],
            data: vulnerabilities,
            maxBarThickness: 6
        },],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                    color: "#fff"
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});


var ctx3 = document.getElementById("chart-bars-user").getContext("2d");
let emails = document.getElementById("chart-bars-user-data").textContent.trim();
emails = emails.split(",").filter(v => v).map(v => Number.parseInt(v));

new Chart(ctx3, {
    type: "bar",
    data: {
        labels: ["Hacked", "High", "Medium", "Low"],
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            // backgroundColor: "rgba(255, 255, 255, .8)",
            backgroundColor: [
                '#D81B60',
                '#43A047',
                '#1A73E8',
                '#fff'
            ],
            data: emails,
            maxBarThickness: 6
        },],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                    color: "#fff"
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});


const locations = document.querySelectorAll('.geolocation > .value');

locations.forEach(el => {
    const code = el.textContent.trim();
    const selector = el.parentElement.querySelector('.index').textContent.trim();
    const map = new jsVectorMap({
        selector: selector,
        map: "world_merc",
        zoomOnScroll: false,
        zoomButtons: false,
        // selectedMarkers: [1, 3],
        selectedRegions: [code],
        markersSelectable: true,
        // markers: [{
        //     name: "USA",
        //     coords: [40.71296415909766, -74.00437720027804]
        // }],
        markerStyle: {
            initial: {
                fill: "#e91e63"
            },
            hover: {
                fill: "E91E63"
            },
            selected: {
                fill: "E91E63"
            }
        },


    });

});


