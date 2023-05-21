import helper from "./helper";
import colors from "./colors";
import Chart from "chart.js/auto";

(function () {
    "use strict";

    // Chart
    if ($("#report-line-chart").length) {
        let ctx = $("#report-line-chart")[0].getContext("2d");
        let myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [
                            0, 200, 250, 200, 700, 550, 650, 1050, 950, 1100,
                            900, 1200,
                        ],
                        borderWidth: 2,
                        borderColor: colors.primary(0.8),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "# of Votes",
                        data: [
                            0, 300, 400, 560, 320, 600, 720, 850, 690, 805,
                            1200, 1010,
                        ],
                        borderWidth: 2,
                        borderDash: [2, 2],
                        borderColor: $("html").hasClass("dark")
                            ? colors.slate["400"](0.6)
                            : colors.slate["400"](),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: 12,
                            },
                            color: colors.slate["500"](0.8),
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: 12,
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return "$" + value;
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
        });
    }

    if ($("#report-pie-chart").length) {
        let ctx = $("#report-pie-chart")[0].getContext("2d");
        let myPieChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [
                    "31 - 50 Years old",
                    ">= 50 Years old",
                    "17 - 30 Years old",
                ],
                datasets: [
                    {
                        data: [15, 10, 65],
                        backgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    }

    if ($("#report-donut-chart").length) {
        let ctx = $("#report-donut-chart")[0].getContext("2d");
        let myDoughnutChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: [
                    "31 - 50 Years old",
                    ">= 50 Years old",
                    "17 - 30 Years old",
                ],
                datasets: [
                    {
                        data: [15, 10, 65],
                        backgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                cutout: "80%",
            },
        });
    }

    if ($("#report-bar-chart").length) {
        // Fake visitor data
        let reportBarChartData = new Array(40).fill(0).map((data, key) => {
            if (key % 3 == 0 || key % 5 == 0) {
                return Math.ceil(Math.random() * (0 - 20) + 20);
            } else {
                return Math.ceil(Math.random() * (0 - 7) + 7);
            }
        });

        // Fake visitor bar color
        let reportBarChartColor = reportBarChartData.map((data) => {
            if (data >= 8 && data <= 14) {
                return $("html").hasClass("dark")
                    ? "#2E51BBA6"
                    : colors.primary(0.65);
            } else if (data >= 15) {
                return $("html").hasClass("dark")
                    ? "#2E51BB"
                    : colors.primary();
            }

            return $("html").hasClass("dark")
                ? "#2E51BB59"
                : colors.primary(0.35);
        });

        let ctx = $("#report-bar-chart")[0].getContext("2d");
        let myBarChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: reportBarChartData,
                datasets: [
                    {
                        label: "Html Template",
                        barThickness: 6,
                        data: reportBarChartData,
                        backgroundColor: reportBarChartColor,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            display: false,
                        },
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        ticks: {
                            display: false,
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                },
            },
        });

        setInterval(() => {
            // Swap visitor data
            let newData = reportBarChartData[0];
            reportBarChartData.shift();
            reportBarChartData.push(newData);

            // Swap visitor bar color
            let newColor = reportBarChartColor[0];
            reportBarChartColor.shift();
            reportBarChartColor.push(newColor);

            myBarChart.update();
        }, 1000);
    }

    if ($("#report-bar-chart-1").length) {
        let ctx = $("#report-bar-chart-1")[0].getContext("2d");
        let myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [
                    {
                        label: "Html Template",
                        barThickness: 8,
                        maxBarThickness: 6,
                        data: [
                            60, 150, 30, 200, 180, 50, 180, 120, 230, 180, 250,
                            270,
                        ],
                        backgroundColor: colors.primary(0.9),
                    },
                    {
                        label: "VueJs Template",
                        barThickness: 8,
                        maxBarThickness: 6,
                        data: [
                            50, 135, 40, 180, 190, 60, 150, 90, 250, 170, 240,
                            250,
                        ],
                        backgroundColor: $("html").hasClass("dark")
                            ? colors.darkmode["400"]()
                            : colors.slate["300"](),
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: 11,
                            },
                            color: colors.slate["500"](0.8),
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            display: false,
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.darkmode["300"](0.8)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
        });
    }

    if ($("#report-donut-chart-1").length) {
        let ctx = $("#report-donut-chart-1")[0].getContext("2d");
        let myDoughnutChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Yellow", "Dark"],
                datasets: [
                    {
                        data: [15, 10, 65],
                        backgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 2,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                cutout: "83%",
            },
        });
    }

    if ($("#report-donut-chart-2").length) {
        let ctx = $("#report-donut-chart-2")[0].getContext("2d");
        let myDoughnutChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Yellow", "Dark"],
                datasets: [
                    {
                        data: [15, 10, 65],
                        backgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 2,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                cutout: "83%",
            },
        });
    }

    if ($("#report-donut-chart-3").length) {
        let ctx = $("#report-donut-chart-3")[0].getContext("2d");
        let myDoughnutChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Yellow", "Dark"],
                datasets: [
                    {
                        data: [15, 10, 65],
                        backgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.slate[200](),
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                cutout: "82%",
            },
        });
    }

    if ($(".simple-line-chart-1").length) {
        $(".simple-line-chart-1").each(function () {
            let ctx = $(this)[0].getContext("2d");
            let myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                    datasets: [
                        {
                            label: "# of Votes",
                            data:
                                $(this).data("random") !== undefined
                                    ? helper.randomNumbers(0, 5, 12)
                                    : [
                                          0, 200, 250, 200, 500, 450, 850, 1050,
                                          950, 1100, 900, 1200,
                                      ],
                            borderWidth: 2,
                            borderColor:
                                $(this).data("line-color") !== undefined
                                    ? $(this).data("line-color")
                                    : colors.primary(0.8),
                            backgroundColor: "transparent",
                            pointBorderColor: "transparent",
                            tension: 0.4,
                        },
                    ],
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        x: {
                            ticks: {
                                display: false,
                            },
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                        },
                        y: {
                            ticks: {
                                display: false,
                            },
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                        },
                    },
                },
            });
        });
    }

    if ($(".simple-line-chart-2").length) {
        $(".simple-line-chart-2").each(function () {
            let ctx = $(this)[0].getContext("2d");
            let myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                    datasets: [
                        {
                            label: "# of Votes",
                            data:
                                $(this).data("random") !== undefined
                                    ? helper.randomNumbers(0, 5, 12)
                                    : [
                                          0, 300, 400, 560, 320, 600, 720, 850,
                                          690, 805, 1200, 1010,
                                      ],
                            borderWidth: 2,
                            borderDash: [2, 2],
                            borderColor:
                                $(this).data("line-color") !== undefined
                                    ? $(this).data("line-color")
                                    : colors.slate["300"](),
                            backgroundColor: "transparent",
                            pointBorderColor: "transparent",
                        },
                    ],
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        x: {
                            ticks: {
                                display: false,
                            },
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                        },
                        y: {
                            ticks: {
                                display: false,
                            },
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                        },
                    },
                },
            });
        });
    }

    if ($(".simple-line-chart-3").length) {
        let ctx = $(".simple-line-chart-3")[0].getContext("2d");
        let myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [
                            0, 200, 250, 200, 700, 550, 650, 1050, 950, 1100,
                            900, 1200,
                        ],
                        borderWidth: 2,
                        borderColor: colors.primary(0.8),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "# of Votes",
                        data: [
                            0, 300, 400, 560, 320, 600, 720, 850, 690, 805,
                            1200, 1010,
                        ],
                        borderWidth: 2,
                        borderDash: [2, 2],
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode["100"]()
                            : colors.slate["400"](),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            display: false,
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            display: false,
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                },
            },
        });
    }

    if ($(".simple-line-chart-4").length) {
        let ctx = $(".simple-line-chart-4")[0].getContext("2d");
        let myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [
                            0, 200, 250, 200, 700, 550, 650, 1050, 950, 1100,
                            900, 1200,
                        ],
                        borderWidth: 2,
                        borderColor: colors.primary(0.8),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "# of Votes",
                        data: [
                            0, 300, 400, 560, 320, 600, 720, 850, 690, 805,
                            1200, 1010,
                        ],
                        borderWidth: 2,
                        borderDash: [2, 2],
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode["100"]()
                            : colors.slate["400"](),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            display: false,
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            display: false,
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                },
            },
        });
    }

    // Chart widget page
    if ($("#vertical-bar-chart-widget").length) {
        let ctx = $("#vertical-bar-chart-widget")[0].getContext("2d");
        let myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                ],
                datasets: [
                    {
                        label: "Html Template",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        data: [0, 200, 250, 200, 500, 450, 850, 1050],
                        backgroundColor: colors.primary(),
                    },
                    {
                        label: "VueJs Template",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        data: [0, 300, 400, 560, 320, 600, 720, 850],
                        backgroundColor: $("html").hasClass("dark")
                            ? colors.darkmode["200"]()
                            : colors.slate["300"](),
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: 12,
                            },
                            color: colors.slate["500"](0.8),
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return "$" + value;
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
        });
    }

    if ($("#horizontal-bar-chart-widget").length) {
        let ctx = $("#horizontal-bar-chart-widget")[0].getContext("2d");
        let myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                ],
                datasets: [
                    {
                        label: "Html Template",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        data: [0, 200, 250, 200, 500, 450, 850, 1050],
                        backgroundColor: colors.primary(),
                    },
                    {
                        label: "VueJs Template",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        data: [0, 300, 400, 560, 320, 600, 720, 850],
                        backgroundColor: $("html").hasClass("dark")
                            ? colors.darkmode["200"]()
                            : colors.slate["300"](),
                    },
                ],
            },
            options: {
                indexAxis: "y",
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return "$" + value;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
        });
    }

    if ($("#stacked-bar-chart-widget").length) {
        let ctx = $("#stacked-bar-chart-widget")[0].getContext("2d");
        let myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [
                    {
                        label: "Html Template",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        backgroundColor: colors.primary(),
                        data: helper.randomNumbers(-100, 100, 12),
                    },
                    {
                        label: "VueJs Template",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        backgroundColor: $("html").hasClass("dark")
                            ? colors.darkmode["200"]()
                            : colors.slate["300"](),
                        data: helper.randomNumbers(-100, 100, 12),
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        stacked: true,
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        stacked: true,
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return "$" + value;
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
        });
    }

    if ($("#stacked-bar-chart-1").length) {
        let ctx = $("#stacked-bar-chart-1")[0].getContext("2d");
        let myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [...Array(16).keys()],
                datasets: [
                    {
                        label: "Html Template",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        backgroundColor: colors.primary(0.8),
                        data: helper.randomNumbers(-100, 100, 16),
                    },
                    {
                        label: "VueJs Template",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        backgroundColor: $("html").hasClass("dark")
                            ? colors.darkmode["200"]()
                            : colors.slate["300"](),
                        data: helper.randomNumbers(-100, 100, 16),
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        stacked: true,
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        stacked: true,
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return "$" + value;
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
        });
    }
    var client = mqtt.connect('ws://185.201.8.195:9001', 
        {
            username: 'root',
            password: 'Telerobotics@1234'
        });
    client.on('connect', function() {
        client.subscribe('TA-morobs');
        client.subscribe('TA-hapdevs');
        client.subscribe('TA-gyro')
    });

    client.on('message', function(topic, message) {
        console.log('Received message:', message.toString());
        const now = new Date();
        const timezoneOffset = now.getTimezoneOffset() * 60000;
        const timestamp = new Date(now - timezoneOffset).toISOString().slice(0, 19).replace('T', ' ');
        if(topic == 'TA-morobs'){
            // Split the message by comma to get data for each motor
            var allData = message.toString().split(',');
            var motor1 = parseFloat(allData[0]);
            var motor2 = parseFloat(allData[1]);
            var motor3 = parseFloat(allData[2]);
            var motor4 = parseFloat(allData[3]);
            var motor5 = parseFloat(allData[4]);
            var motor6 = parseFloat(allData[5]);
            var motor7 = parseFloat(allData[6]);
            var motor8 = parseFloat(allData[7]);
            var motor9 = parseFloat(allData[8]);
            var motor10 = parseFloat(allData[9]);
    
            var motor1Elem = document.getElementById('motor1');
            if (motor1Elem) {
                motor1Elem.innerText = motor1;
            }
    
            var motor2Elem = document.getElementById('motor2');
            if (motor2Elem) {
                motor2Elem.innerText = motor2;
            }
    
            var motor3Elem = document.getElementById('motor3');
            if (motor3Elem) {
                motor3Elem.innerText = motor3;
            }
    
            var motor4Elem = document.getElementById('motor4');
            if (motor4Elem) {
                motor4Elem.innerText = motor4;
            }
    
            var motor5Elem = document.getElementById('motor5');
            if (motor5Elem) {
                motor5Elem.innerText = motor5;
            }

            var motor6Elem = document.getElementById('motor6');
            if (motor6Elem) {
                motor6Elem.innerText = motor6;
            }
    
            var motor7Elem = document.getElementById('motor7');
            if (motor7Elem) {
                motor7Elem.innerText = motor7;
            }
    
            var motor8Elem = document.getElementById('motor8');
            if (motor8Elem) {
                motor8Elem.innerText = motor8;
            }
    
            var motor9Elem = document.getElementById('motor9');
            if (motor9Elem) {
                motor9Elem.innerText = motor9;
            }
    
            var motor10Elem = document.getElementById('motor10');
            if (motor10Elem) {
                motor10Elem.innerText = motor10;
            }
            const motor_data = {
                motor1: allData[0] || null,
                motor2: allData[1] || null,
                motor3: allData[2] || null,
                motor4: allData[3] || null,
                motor5: allData[4] || null,
                motor6: allData[5] || null,
                motor7: allData[6] || null,
                motor8: allData[7] || null,
                motor9: allData[8] || null,
                motor10: allData[9] || null,
                published_at: timestamp
            };
            axios.post('/mqtt-data-motor', motor_data);
        } else if (topic == 'TA-hapdevs'){
            var allHapdev = message.toString().split(',');
            var haptic1 = parseFloat(allHapdev[0]);
            var haptic2 = parseFloat(allHapdev[1]);
            var haptic3 = parseFloat(allHapdev[2]);
            var haptic4 = parseFloat(allHapdev[3]);
            var haptic5 = parseFloat(allHapdev[4]);
            var haptic6 = parseFloat(allHapdev[5]);
            var haptic7 = parseFloat(allHapdev[6]);
            var haptic8 = parseFloat(allHapdev[7]);
            var haptic9 = parseFloat(allHapdev[8]);
            var haptic10 = parseFloat(allHapdev[9]);
    
            var haptic1Elem = document.getElementById('haptic1');
            if (haptic1Elem) {
                haptic1Elem.innerText = haptic1;
            }
    
            var haptic2Elem = document.getElementById('haptic2');
            if (haptic2Elem) {
                haptic2Elem.innerText = haptic2;
            }
    
            var haptic3Elem = document.getElementById('haptic3');
            if (haptic3Elem) {
                haptic3Elem.innerText = haptic3;
            }
    
            var haptic4Elem = document.getElementById('haptic4');
            if (haptic4Elem) {
                haptic4Elem.innerText = haptic4;
            }
    
            var haptic5Elem = document.getElementById('haptic5');
            if (haptic5Elem) {
                haptic5Elem.innerText = haptic5;
            }

            var haptic6Elem = document.getElementById('haptic6');
            if (haptic6Elem) {
                haptic6Elem.innerText = haptic6;
            }
    
            var haptic7Elem = document.getElementById('haptic7');
            if (haptic7Elem) {
                haptic7Elem.innerText = haptic7;
            }
    
            var haptic8Elem = document.getElementById('haptic8');
            if (haptic8Elem) {
                haptic8Elem.innerText = haptic8;
            }
    
            var haptic9Elem = document.getElementById('haptic9');
            if (haptic9Elem) {
                haptic9Elem.innerText = haptic9;
            }
    
            var haptic10Elem = document.getElementById('haptic10');
            if (haptic10Elem) {
                haptic10Elem.innerText = haptic10;
            }
            const haptic_data = {
                haptic1: allHapdev[0] || null,
                haptic2: allHapdev[1] || null,
                haptic3: allHapdev[2] || null,
                haptic4: allHapdev[3] || null,
                haptic5: allHapdev[4] || null,
                haptic6: allHapdev[5] || null,
                haptic7: allHapdev[6] || null,
                haptic8: allHapdev[7] || null,
                haptic9: allHapdev[8] || null,
                haptic10: allHapdev[9] || null,
                published_at: timestamp
            };
            axios.post('/mqtt-data-haptic', haptic_data);
        }else if (topic =='TA-gyro'){
            var gyro = message.toString();
            const gyro_data ={
                data: gyro || null,
                published_at : timestamp
            };
            axios.post('/mqtt-data-gyro', gyro_data);
        }
    });

function getCurrentTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, "0");
        const minutes = now.getMinutes().toString().padStart(2, "0");
        return hours + ":" + minutes;
    }

if ($("#line-chart-widget-1").length) {
        let maxDataPoints =14;
        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            if (topic == 'TA-hapdevs') {
                var allHapdev = message.toString().split(',');
                var haptic1 = parseFloat(allHapdev[0]);
                myChart1.data.datasets[0].data.push({
                    x: new Date().getTime(),
                    y: haptic1
                });
    
                if (myChart1.data.datasets[1].data.length < myChart1.data.datasets[0].data.length) {
                    let latestX = myChart1.data.datasets[0].data[myChart1.data.datasets[0].data.length - 1].x;
                    myChart1.data.datasets[1].data.push({
                        x: latestX,
                        y: null
                    });
                }
            } else if (topic === 'TA-morobs') {
                var allData = message.toString().split(',');
                var motor1 = parseFloat(allData[0]);
    
                myChart1.data.datasets[1].data.push({
                    x: new Date().getTime(),
                    y: motor1
                });
    
                if (myChart1.data.datasets[0].data.length < myChart1.data.datasets[1].data.length) {
                    let latestX = myChart1.data.datasets[1].data[myChart1.data.datasets[1].data.length - 1].x;
                    myChart1.data.datasets[0].data.push({
                        x: latestX,
                        y: null
                    });
                }
            }
    
            // Limit data to maximum number of points
            if (myChart1.data.datasets[0].data.length > maxDataPoints) {
                myChart1.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
            }
    
            if (myChart1.data.datasets[1].data.length > maxDataPoints) {
                myChart1.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
            }
    
            myChart1.data.labels = myChart1.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());
    
            myChart1.update();
                
        });
    
        let ctx = $("#line-chart-widget-1")[0].getContext("2d");
        let myChart1 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 1",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 1",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // Use getCurrentTime() function to get the current time
                                return getCurrentTime();
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }

if ($("#line-chart-widget-2").length) {
    let maxDataPoints =14;
    client.on('message', function(topic, message) {
        console.log('Received message:', message.toString());
        if (topic == 'TA-hapdevs') {
            var allHapdev = message.toString().split(',');
            var haptic2 = parseFloat(allHapdev[1]);
            myChart2.data.datasets[0].data.push({
                x: new Date().getTime(),
                y: haptic2
            });

            if (myChart2.data.datasets[1].data.length < myChart2.data.datasets[0].data.length) {
                let latestX = myChart2.data.datasets[0].data[myChart2.data.datasets[0].data.length - 1].x;
                myChart2.data.datasets[1].data.push({
                    x: latestX,
                    y: null
                });
            }
        } else if (topic === 'TA-morobs') {
            var allData = message.toString().split(',');
            var motor2 = parseFloat(allData[1]);

            myChart2.data.datasets[1].data.push({
                x: new Date().getTime(),
                y: motor2
            });

            if (myChart2.data.datasets[0].data.length < myChart2.data.datasets[1].data.length) {
                let latestX = myChart2.data.datasets[1].data[myChart2.data.datasets[1].data.length - 1].x;
                myChart2.data.datasets[0].data.push({
                    x: latestX,
                    y: null
                });
            }
        }

        // Limit data to maximum number of points
        if (myChart2.data.datasets[0].data.length > maxDataPoints) {
            myChart2.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
        }

        if (myChart2.data.datasets[1].data.length > maxDataPoints) {
            myChart2.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
        }

        myChart2.data.labels = myChart2.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());

        myChart2.update();
            
    });
    
        let ctx = $("#line-chart-widget-2")[0].getContext("2d");
        let myChart2 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 2",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 2",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // Use getCurrentTime() function to get the current time
                                return getCurrentTime();
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }

if ($("#line-chart-widget-3").length) {

    let maxDataPoints =14;
    client.on('message', function(topic, message) {
        console.log('Received message:', message.toString());
        if (topic == 'TA-hapdevs') {
            var allHapdev = message.toString().split(',');
            var haptic3 = parseFloat(allHapdev[2]);
            myChart3.data.datasets[0].data.push({
                x: new Date().getTime(),
                y: haptic3
            });

            if (myChart3.data.datasets[1].data.length < myChart3.data.datasets[0].data.length) {
                let latestX = myChart3.data.datasets[0].data[myChart3.data.datasets[0].data.length - 1].x;
                myChart3.data.datasets[1].data.push({
                    x: latestX,
                    y: null
                });
            }
        } else if (topic === 'TA-morobs') {
            var allData = message.toString().split(',');
            var motor3 = parseFloat(allData[2]);

            myChart3.data.datasets[1].data.push({
                x: new Date().getTime(),
                y: motor3
            });

            if (myChart3.data.datasets[0].data.length < myChart3.data.datasets[1].data.length) {
                let latestX = myChart3.data.datasets[1].data[myChart3.data.datasets[1].data.length - 1].x;
                myChart3.data.datasets[0].data.push({
                    x: latestX,
                    y: null
                });
            }
        }

        // Limit data to maximum number of points
        if (myChart3.data.datasets[0].data.length > maxDataPoints) {
            myChart3.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
        }

        if (myChart3.data.datasets[1].data.length > maxDataPoints) {
            myChart3.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
        }

        myChart3.data.labels = myChart3.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());

        myChart3.update();
            
    });
    
        let ctx = $("#line-chart-widget-3")[0].getContext("2d");
        let myChart3 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 3",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 3",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }

    if ($("#line-chart-widget-4").length) {
        let maxDataPoints =14;
        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            if (topic == 'TA-hapdevs') {
                var allHapdev = message.toString().split(',');
                var haptic4 = parseFloat(allHapdev[3]);
                myChart4.data.datasets[0].data.push({
                    x: new Date().getTime(),
                    y: haptic4
                });
    
                if (myChart4.data.datasets[1].data.length < myChart4.data.datasets[0].data.length) {
                    let latestX = myChart4.data.datasets[0].data[myChart4.data.datasets[0].data.length - 1].x;
                    myChart4.data.datasets[1].data.push({
                        x: latestX,
                        y: null
                    });
                }
            } else if (topic === 'TA-morobs') {
                var allData = message.toString().split(',');
                var motor4 = parseFloat(allData[3]);
    
                myChart4.data.datasets[1].data.push({
                    x: new Date().getTime(),
                    y: motor4
                });
    
                if (myChart4.data.datasets[0].data.length < myChart4.data.datasets[1].data.length) {
                    let latestX = myChart4.data.datasets[1].data[myChart4.data.datasets[1].data.length - 1].x;
                    myChart4.data.datasets[0].data.push({
                        x: latestX,
                        y: null
                    });
                }
            }
    
            // Limit data to maximum number of points
            if (myChart4.data.datasets[0].data.length > maxDataPoints) {
                myChart4.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
            }
    
            if (myChart4.data.datasets[1].data.length > maxDataPoints) {
                myChart4.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
            }
    
            myChart4.data.labels = myChart4.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());
    
            myChart4.update();
                
        });
    
        let ctx = $("#line-chart-widget-4")[0].getContext("2d");
        let myChart4 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 4",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 4",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }

    if ($("#line-chart-widget-5").length) {
        let maxDataPoints =14;
        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            if (topic == 'TA-hapdevs') {
                var allHapdev = message.toString().split(',');
                var haptic5 = parseFloat(allHapdev[4]);
                myChart5.data.datasets[0].data.push({
                    x: new Date().getTime(),
                    y: haptic5
                });
    
                if (myChart5.data.datasets[1].data.length < myChart5.data.datasets[0].data.length) {
                    let latestX = myChart5.data.datasets[0].data[myChart5.data.datasets[0].data.length - 1].x;
                    myChart5.data.datasets[1].data.push({
                        x: latestX,
                        y: null
                    });
                }
            } else if (topic === 'TA-morobs') {
                var allData = message.toString().split(',');
                var motor5 = parseFloat(allData[4]);
    
                myChart5.data.datasets[1].data.push({
                    x: new Date().getTime(),
                    y: motor5
                });
    
                if (myChart5.data.datasets[0].data.length < myChart5.data.datasets[1].data.length) {
                    let latestX = myChart5.data.datasets[1].data[myChart5.data.datasets[1].data.length - 1].x;
                    myChart5.data.datasets[0].data.push({
                        x: latestX,
                        y: null
                    });
                }
            }
    
            // Limit data to maximum number of points
            if (myChart5.data.datasets[0].data.length > maxDataPoints) {
                myChart5.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
            }
    
            if (myChart5.data.datasets[1].data.length > maxDataPoints) {
                myChart5.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
            }
    
            myChart5.data.labels = myChart5.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());
    
            myChart5.update();
                
        });
    
        let ctx = $("#line-chart-widget-5")[0].getContext("2d");
        let myChart5 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 5",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 5",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }
    if ($("#line-chart-widget-6").length) {
        let maxDataPoints =14;
        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            if (topic == 'TA-hapdevs') {
                var allHapdev = message.toString().split(',');
                var haptic6 = parseFloat(allHapdev[5]);
                myChart6.data.datasets[0].data.push({
                    x: new Date().getTime(),
                    y: haptic6
                });
    
                if (myChart6.data.datasets[1].data.length < myChart6.data.datasets[0].data.length) {
                    let latestX = myChart6.data.datasets[0].data[myChart6.data.datasets[0].data.length - 1].x;
                    myChart6.data.datasets[1].data.push({
                        x: latestX,
                        y: null
                    });
                }
            } else if (topic === 'TA-morobs') {
                var allData = message.toString().split(',');
                var motor6 = parseFloat(allData[5]);
    
                myChart6.data.datasets[1].data.push({
                    x: new Date().getTime(),
                    y: motor6
                });
    
                if (myChart6.data.datasets[0].data.length < myChart6.data.datasets[1].data.length) {
                    let latestX = myChart6.data.datasets[1].data[myChart6.data.datasets[1].data.length - 1].x;
                    myChart6.data.datasets[0].data.push({
                        x: latestX,
                        y: null
                    });
                }
            }
    
            // Limit data to maximum number of points
            if (myChart6.data.datasets[0].data.length > maxDataPoints) {
                myChart6.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
            }
    
            if (myChart6.data.datasets[1].data.length > maxDataPoints) {
                myChart6.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
            }
    
            myChart6.data.labels = myChart6.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());
    
            myChart6.update();
                
        });
    
        let ctx = $("#line-chart-widget-6")[0].getContext("2d");
        let myChart6 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 1",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 1",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }

    if ($("#line-chart-widget-7").length) {
        let maxDataPoints =14;
        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            if (topic == 'TA-hapdevs') {
                var allHapdev = message.toString().split(',');
                var haptic7 = parseFloat(allHapdev[6]);
                myChart7.data.datasets[0].data.push({
                    x: new Date().getTime(),
                    y: haptic7
                });
    
                if (myChart7.data.datasets[1].data.length < myChart7.data.datasets[0].data.length) {
                    let latestX = myChart7.data.datasets[0].data[myChart7.data.datasets[0].data.length - 1].x;
                    myChart7.data.datasets[1].data.push({
                        x: latestX,
                        y: null
                    });
                }
            } else if (topic === 'TA-morobs') {
                var allData = message.toString().split(',');
                var motor7 = parseFloat(allData[6]);
    
                myChart7.data.datasets[1].data.push({
                    x: new Date().getTime(),
                    y: motor7
                });
    
                if (myChart7.data.datasets[0].data.length < myChart7.data.datasets[1].data.length) {
                    let latestX = myChart7.data.datasets[1].data[myChart7.data.datasets[1].data.length - 1].x;
                    myChart7.data.datasets[0].data.push({
                        x: latestX,
                        y: null
                    });
                }
            }
    
            // Limit data to maximum number of points
            if (myChart7.data.datasets[0].data.length > maxDataPoints) {
                myChart7.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
            }
    
            if (myChart7.data.datasets[1].data.length > maxDataPoints) {
                myChart7.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
            }
    
            myChart7.data.labels = myChart7.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());
    
            myChart7.update();
                
        });
    
        let ctx = $("#line-chart-widget-7")[0].getContext("2d");
        let myChart7 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 7",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 7",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }

if ($("#line-chart-widget-8").length) {
    let maxDataPoints =14;
    client.on('message', function(topic, message) {
        console.log('Received message:', message.toString());
        if (topic == 'TA-hapdevs') {
            var allHapdev = message.toString().split(',');
            var haptic8 = parseFloat(allHapdev[7]);
            myChart8.data.datasets[0].data.push({
                x: new Date().getTime(),
                y: haptic8
            });

            if (myChart8.data.datasets[1].data.length < myChart8.data.datasets[0].data.length) {
                let latestX = myChart8.data.datasets[0].data[myChart8.data.datasets[0].data.length - 1].x;
                myChart8.data.datasets[1].data.push({
                    x: latestX,
                    y: null
                });
            }
        } else if (topic === 'TA-morobs') {
            var allData = message.toString().split(',');
            var motor8 = parseFloat(allData[7]);

            myChart8.data.datasets[1].data.push({
                x: new Date().getTime(),
                y: motor8
            });

            if (myChart8.data.datasets[0].data.length < myChart8.data.datasets[1].data.length) {
                let latestX = myChart8.data.datasets[1].data[myChart8.data.datasets[1].data.length - 1].x;
                myChart8.data.datasets[0].data.push({
                    x: latestX,
                    y: null
                });
            }
        }

        // Limit data to maximum number of points
        if (myChart8.data.datasets[0].data.length > maxDataPoints) {
            myChart8.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
        }

        if (myChart8.data.datasets[1].data.length > maxDataPoints) {
            myChart8.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
        }

        myChart8.data.labels = myChart8.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());

        myChart8.update();
            
    });
    
        let ctx = $("#line-chart-widget-8")[0].getContext("2d");
        let myChart8 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 8",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 8",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }

    if ($("#line-chart-widget-9").length) {
        let maxDataPoints =14;
        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            if (topic == 'TA-hapdevs') {
                var allHapdev = message.toString().split(',');
                var haptic9 = parseFloat(allHapdev[8]);
                myChart9.data.datasets[0].data.push({
                    x: new Date().getTime(),
                    y: haptic9
                });
    
                if (myChart9.data.datasets[1].data.length < myChart9.data.datasets[0].data.length) {
                    let latestX = myChart9.data.datasets[0].data[myChart9.data.datasets[0].data.length - 1].x;
                    myChart9.data.datasets[1].data.push({
                        x: latestX,
                        y: null
                    });
                }
            } else if (topic === 'TA-morobs') {
                var allData = message.toString().split(',');
                var motor9 = parseFloat(allData[8]);
    
                myChart9.data.datasets[1].data.push({
                    x: new Date().getTime(),
                    y: motor9
                });
    
                if (myChart9.data.datasets[0].data.length < myChart9.data.datasets[1].data.length) {
                    let latestX = myChart9.data.datasets[1].data[myChart9.data.datasets[1].data.length - 1].x;
                    myChart9.data.datasets[0].data.push({
                        x: latestX,
                        y: null
                    });
                }
            }
    
            // Limit data to maximum number of points
            if (myChart9.data.datasets[0].data.length > maxDataPoints) {
                myChart9.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
            }
    
            if (myChart9.data.datasets[1].data.length > maxDataPoints) {
                myChart9.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
            }
    
            myChart9.data.labels = myChart9.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());
    
            myChart9.update();
                
        });
    
        let ctx = $("#line-chart-widget-9")[0].getContext("2d");
        let myChart9 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 9",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 9",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }

    if ($("#line-chart-widget-10").length) {
        let maxDataPoints =14;
        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            if (topic == 'TA-hapdevs') {
                var allHapdev = message.toString().split(',');
                var haptic10 = parseFloat(allHapdev[9]);
                myChart10.data.datasets[0].data.push({
                    x: new Date().getTime(),
                    y: haptic10
                });
    
                if (myChart10.data.datasets[1].data.length < myChart10.data.datasets[0].data.length) {
                    let latestX = myChart10.data.datasets[0].data[myChart10.data.datasets[0].data.length - 1].x;
                    myChart10.data.datasets[1].data.push({
                        x: latestX,
                        y: null
                    });
                }
            } else if (topic === 'TA-morobs') {
                var allData = message.toString().split(',');
                var motor10 = parseFloat(allData[9]);
    
                myChart10.data.datasets[1].data.push({
                    x: new Date().getTime(),
                    y: motor10
                });
    
                if (myChart10.data.datasets[0].data.length < myChart10.data.datasets[1].data.length) {
                    let latestX = myChart10.data.datasets[1].data[myChart10.data.datasets[1].data.length - 1].x;
                    myChart10.data.datasets[0].data.push({
                        x: latestX,
                        y: null
                    });
                }
            }
    
            // Limit data to maximum number of points
            if (myChart10.data.datasets[0].data.length > maxDataPoints) {
                myChart10.data.datasets[0].data.shift(); // Remove oldest data point for Haptic 1
            }
    
            if (myChart10.data.datasets[1].data.length > maxDataPoints) {
                myChart10.data.datasets[1].data.shift(); // Remove oldest data point for Motor 1
            }
    
            myChart10.data.labels = myChart10.data.datasets[0].data.map(point => new Date(point.x).toLocaleTimeString());
    
            myChart10.update();
                
        });
    
        let ctx = $("#line-chart-widget-10")[0].getContext("2d");
        let myChart10 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 10",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 10",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderColor: "red",
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }
    if ($("#line-chart-widget-11").length) {

        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            if (topic == 'TA-gyro') {
                var gyro = message.toString()
                var gyro = parseFloat(message);
                myChart11.data.datasets[0].data.push(gyro);
                myChart11.data.labels.push(new Date().toLocaleTimeString());
                myChart11.update();
            }
        });
    
        let ctx = $("#line-chart-widget-11")[0].getContext("2d");
        let myChart11 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Gyro",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }


    /*if ($("#line-chart-widget-11").length) {

        client.on('message', function(topic, message) {
            console.log('Received message:', message.toString());
            if (topic == 'TA-gyro') {
            // Split the message by comma to get data for each motor
                var allData = message.toString().split(',');
                var motor10 = parseFloat(allData[9]);
    
                myChart10.data.datasets[0].data.push(parseFloat(motor10));
                myChart10.data.labels.push(new Date().toLocaleTimeString());
                myChart10.update();
            } else if (topic === 'TA-hapdevs') {
                var allHapdev = message.toString().split(',');
                var haptic10 = parseFloat(allHapdev[9]);
                myChart10.data.datasets[1].data.push(parseFloat(haptic10));
                myChart10.update();
            }
                
        });
    
        let ctx = $("#line-chart-widget-10")[0].getContext("2d");
        let myChart10 = new Chart(ctx, {
            type: "line",
            data: {
                labels: [], // empty array to be populated with timestamp values
                datasets: [
                    {
                        label: "Haptic 10",
                        data: [], // empty array to be populated with MQTT data for Motor 1
                        borderWidth: 2,
                        borderColor: colors.primary(),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                    {
                        label: "Motor 10",
                        data: [], // empty array to be populated with MQTT data for Haptic 1
                        borderWidth: 2,
                        borderDash: [2, 2],
                        borderColor: $("html").hasClass("dark")
                            ? colors.slate["400"](0.6)
                            : colors.slate["400"](),
                        backgroundColor: "transparent",
                        pointBorderColor: "transparent",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            font: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                // convert timestamp to hour and minute
                                const date = new Date(value);
                                const hours = date.getHours().toString().padStart(2, "0");
                                const minutes = date.getMinutes().toString().padStart(2, "0");
                                return hours + ":" + minutes;
                            },
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: colors.slate["500"](0.8),
                            callback: function (value, index, values) {
                                return value + "°"; // add degree symbol to y-axis ticks
                            },
                        },
                        grid: {
                            color: $("html").hasClass("dark")
                                ? colors.slate["500"](0.3)
                                : colors.slate["300"](),
                            borderDash: [2, 2],
                            drawBorder: false,
                        },
                    },
                },
            },
            
        });
        
    }

    if ($("#donut-chart-widget").length) {
        let ctx = $("#donut-chart-widget")[0].getContext("2d");
        let myDoughnutChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Html", "Vuejs", "Laravel"],
                datasets: [
                    {
                        data: [15, 10, 65],
                        backgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        hoverBackgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? colors.darkmode[700]()
                            : colors.white,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: colors.slate["500"](0.8),
                        },
                    },
                },
                cutout: "80%",
            },
        });
    }*/
})();
