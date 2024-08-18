//Book Category
function createBookCategoryChart(container, data, title) {
    Highcharts.chart(container, {
        chart: {
            type: "pie",
        },
        title: {
            text: title,
            align: "left",
            y: 20,
        },
        credits: {
            enabled: false,
        },
        series: [
            {
                name: "Jumlah Buku",
                data: data,
                innerSize: "60%",
                point: {
                    events: {
                        click: function () {
                            // Set modal content
                            $("#modalContent").text(
                                "Kategori: " + this.name + ", Jumlah: " + this.y
                            );
                            // Show modal
                            $("#dataPointModal").modal("show");
                        },
                    },
                },
            },
        ],
        tooltip: {
            pointFormat: "{series.name}: <b>{point.y}</b>",
        },
        exporting: {
            enabled: true, // Enable export feature
        },
        legend: {
            enabled: true,
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                cursor: "pointer",
                borderRadius: 0,
                dataLabels: [
                    {
                        enabled: false,
                    },
                    {
                        enabled: false,
                    },
                ],
                showInLegend: true,
            },
        },
    });
}

//Book Status Chart
function createBookStatusChart(container, data, title) {
    Highcharts.chart(container, {
        chart: {
            type: "pie",
            spacingBottom: 0,
            spacingTop: 0,
            spacingLeft: 0,
            spacingRight: 7,
            marginRight: 110,
            custom: {},
            events: {
                render() {
                    const chart = this,
                        series = chart.series[0];
                    let customLabel = chart.options.chart.custom.label;
                    var total = Math.round(
                        (series.data[0].y /
                            (series.data[0].y +
                                series.data[1].y +
                                series.data[2].y)) *
                            100
                    );
                    if (!customLabel) {
                        customLabel = chart.options.chart.custom.label =
                            chart.renderer
                                .label(
                                    "<strong style='font-size: 10px;'>" +
                                        total +
                                        "%</strong><br/>" +
                                        "<p style='font-size: 10px;'>Tersedia</p>"
                                )
                                .css({
                                    color: "#000",
                                    textAnchor: "middle",
                                })
                                .add();
                    }

                    const x = series.center[0] + chart.plotLeft,
                        y =
                            series.center[1] +
                            chart.plotTop -
                            customLabel.attr("height") / 2;

                    customLabel.attr({
                        x,
                        y,
                    });
                    // Set font size based on chart diameter
                    customLabel.css({
                        fontSize: `${series.center[2] / 12}px`,
                    });
                },
            },
        },
        title: {
            text: title,
            align: "left",
            y: 20,
        },
        credits: {
            enabled: false,
        },
        exporting: {
            enabled: false, // Enable export feature
        },
        series: [
            {
                name: "Jumlah Buku",
                data: data,
                innerSize: "60%",
                point: {
                    events: {
                        click: function () {
                            // Set modal content
                            $("#modalContent").text(
                                "Status: " + this.name + ", Jumlah: " + this.y
                            );
                            // Show modal
                            $("#dataPointModal").modal("show");
                        },
                    },
                },
            },
        ],
        tooltip: {
            pointFormat: "{series.name}: <b>{point.y}</b>",
        },
        legend: {
            enabled: true,
            align: "right",
            verticalAlign: "top",
            horizontalAlign: "right",
            layout: "vertical",
            x: 15,
            y: 80,
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                cursor: "pointer",
                borderRadius: 0,
                dataLabels: [
                    {
                        enabled: false,
                    },
                    {
                        enabled: false,
                    },
                ],
                showInLegend: true,
            },
        },
    });
}

//Best Seller Book Chart
function createBestSellerChart(container, data, title) {
    Highcharts.chart(container, {
        chart: {
            type: "column",
            marginTop: 80,
        },
        title: {
            align: "left",
            text: title,
        },
        accessibility: {
            announceNewData: {
                enabled: true,
            },
        },
        credits: {
            enabled: false,
        },
        xAxis: {
            type: "category",
        },
        yAxis: {
            title: {
                text: null,
            },
        },
        legend: {
            enabled: false,
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: false,
                },
            },
        },

        tooltip: {
            headerFormat:
                '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat:
                '<span style="color:{point.color}">{point.name}</span>: ' +
                "Jumlah Buku: <b>{point.y}</b><br/>",
        },

        series: [
            {
                name: "Buku",
                colorByPoint: true,
                data: data,
            },
        ],
        drilldown: {
            breadcrumbs: {
                position: {
                    align: "right",
                },
            },
        },
    });
}

//Total Borrower Chart
function createTotalBorrowerchart(
    container,
    title,
    subtitle,
    categories,
    oldmembers,
    newmembers
) {
    Highcharts.chart(container, {
        chart: {
            type: "column",
        },
        title: {
            text: title,
            align: "left",
        },
        credits: {
            enabled: false,
        },
        subtitle: {
            text: subtitle,
            align: "left",
        },
        exporting: {
            enabled: false,
        },
        xAxis: {
            categories: categories,
            crosshair: true,
            accessibility: {
                description: "Dates",
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: null,
            },
        },
        tooltip: {
            valueSuffix: "",
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
            },
        },
        series: [
            {
                name: "Anggota Lama",
                data: oldmembers,
            },
            {
                name: "Anggota Baru",
                data: newmembers,
            },
        ],
    });
}

//Total Income Chart
function createTotalIncomeChart(
    container,
    title,
    subtitle,
    incomes,
    rents,
    latefees,
    dates
) {
    Highcharts.chart(container, {
        chart: {
            type: "line",
        },
        title: {
            text: title,
            align: "left",
        },

        subtitle: {
            text: subtitle,
            align: "left",
        },

        credits: {
            enabled: false,
        },
        exporting: {
            enabled: false,
        },
        xAxis: {
            // type: "datetime",
            // min: dates.getTime(),
            // max: new Date().getTime(),
            categories: dates,
        },
        yAxis: {
            title: {
                text: null,
            },
        },

        plotOptions: {
            getExtremesFromAll: true,
            series: {
                marker: {
                    enabled: false,
                    states: {
                        hover: {
                            enabled: false,
                        },
                    },
                },
                showInLegend: true,
            },
        },

        series: [
            {
                name: "Total Pendapatan",
                showInLegend: true,
                type: "spline",
                data: incomes,
            },
            {
                name: "Total Biaya Sewa",
                showInLegend: true,
                type: "spline",
                data: rents,
            },
            {
                name: "Total Bayaran Denda",
                showInLegend: true,
                type: "spline",
                data: latefees,
            },
        ],

        responsive: {
            rules: [
                {
                    condition: {
                        maxWidth: 500,
                    },
                    chartOptions: {
                        legend: {
                            layout: "horizontal",
                            align: "bottom",
                            verticalAlign: "bottom",
                            y: 100,
                        },
                    },
                },
            ],
        },
    });
}
