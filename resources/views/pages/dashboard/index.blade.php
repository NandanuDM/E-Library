@extends('layouts.app')

@section('title', 'Dasbor')

@section('page-header')
<div class="row">
    <div class="col-12">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dasbor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><i class="nav-icon fas fa-tachometer-alt mr-1"></i>Dasbor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="text-center my-5" id="lineChartLoader">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="card-body" id="lineChartContainer">
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body" id="barChartContainer">
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body" id="pieChartContainer">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="dataPointModal" tabindex="-1" role="dialog" aria-labelledby="dataPointModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataPointModalLabel">Detail Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modalContent"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
$(document).ready(function() {
    // Show loader
    $('#lineChartLoader').show();

    // AJAX request to fetch data for line chart
    $.ajax({
        url: "{{ route('dashboard.data.books_by_month') }}",
        method: 'GET',
        success: function(response) {
            const borrowings = response.borrowings;
            const borrowMonths = response.months;

            // Create line chart
            createLineChart('lineChartContainer', 'Jumlah Peminjaman Buku Per Bulan', borrowMonths, borrowings);

            // Hide loader
            $('#lineChartLoader').hide();
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ', error);
            // Hide loader in case of error
            $('#lineChartLoader').hide();
        }
    });
});

function createLineChart(container, title, categories, data) {
    Highcharts.chart(container, {
        chart: {
            type: 'line'
        },
        title: {
            text: title
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            title: {
                text: 'Jumlah Peminjaman'
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Peminjaman',
            data: data,
            point: {
                events: {
                    click: function() {
                        // Set modal content
                        $('#modalContent').text('Bulan: ' + this.category + ', Jumlah: ' + this.y);
                        // Show modal
                        $('#dataPointModal').modal('show');
                    }
                }
            }
        }],
        tooltip: {
            formatter: function() {
                return 'Bulan: ' + this.x + '<br>Jumlah: ' + this.y;
            }
        },
        exporting: {
            enabled: true // Enable export feature
        },
        accessibility: {
            enabled: true,
            description: 'Line chart showing the number of book borrowings per month. The data shows a varying trend over the months.',
            point: {
                valueDescriptionFormat: '{index}. {xDescription}, {value}.'
            }
        }
    });
}
</script>

<script>
// Dummy chart data
$(document).ready(function() {
    Highcharts.chart('barChartContainer', {
        chart: {
            type: 'bar' // Specify chart type as bar
        },
        title: {
            text: 'Jumlah Buku yang Dipinjam per Kategori' // Chart title
        },
        xAxis: {
            categories: ['Fiksi', 'Non-Fiksi', 'Sains', 'Sejarah', 'Teknologi', 'Sosial'] // X-axis categories
        },
        yAxis: {
            title: {
                text: 'Jumlah Buku' // Y-axis title
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Kategori',
            data: [120, 80, 150, 90, 60, 100] // Data series
        }]
    });

    Highcharts.chart('pieChartContainer', {
        chart: {
            type: 'pie' // Specify chart type as pie
        },
        title: {
            text: 'Distribusi Anggota Berdasarkan Tipe Keanggotaan' // Chart title
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' // Tooltip format
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %' // Data labels format
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Anggota',
            colorByPoint: true,
            data: [{
                name: 'Mahasiswa',
                y: 25.0,
                sliced: true,
                selected: true
            }, {
                name: 'Guru',
                y: 15.0
            }, {
                name: 'Dosen',
                y: 10.0
            }, {
                name: 'Umum',
                y: 22.0
            }, {
                name: 'Pelajar',
                y: 28.0
            }]
        }]
    });
});
</script>
@endsection