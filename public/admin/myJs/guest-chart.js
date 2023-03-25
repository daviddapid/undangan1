var options = {
    series: [44, 55, 13],
    chart: {
        width: 380,
        type: "pie",
    },
    labels: ["Hadir", "Berhalangan", "Pending"],
    responsive: [
        {
            breakpoint: 480,
            options: {
                chart: {
                    width: 200,
                },
                legend: {
                    position: "bottom",
                },
            },
        },
    ],
};

var chart = new ApexCharts(document.querySelector("#guest-chart"), options);
chart.render();
