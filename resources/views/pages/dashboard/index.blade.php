@extends('layouts.app')

@section('title', 'Dasbor')

@section('page-header')
<div class="row">
    <div class="col-12">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dasboard Library</h1>
                        <br>
                        <div class="col-sm-4">
                            <form action="{{ route('dashboard.filter') }}" method="POST" id="dateFilter">
                                @csrf
                                <input
                                    placeholder="{{ $month? $month : 'All Time' }}"
                                    class="textbox-n"
                                    type="text"
                                    onfocus="(this.type='month')"
                                    onblur="(this.type='text')"
                                    onchange="FilterSubmit();"
                                    id="month"
                                    name="month" />
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><i class="nav-icon fas fa-tachometer-alt mr-1"></i>Dashboard</li>
                        </ol>
                        <br>
                        <br>
                        <div class="float-sm-right">
                            <a href="#" class="btn btn-light float-right"><i class="fas fa-light fa-file-export"></i></i> Export Data</a>
                        </div>
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
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="bg-primary rounded mr-2 p-3">
                            <i class="fa fa-regular fa-book h2"></i>
                        </span>
                        <div class="content-left">
                            <p class="mb-0 pb-2">Total Buku</p>
                            <strong>{{ $bookCount }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="bg-success rounded mr-2 p-3">
                            <i class="fa fa-solid fa-book-reader h2"></i>
                        </span>
                        <div class="content-left">
                            <p class="mb-0 pb-2">Buku Disewa</p>
                            <strong>{{ $rentedBook }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="bg-warning rounded mr-2 p-3">
                            <i class="fas fa-calendar-times h2" style="color: #fff"></i>
                        </span>
                        <div class="content-left">
                            <p class="mb-0 pb-2">Buku Telat Kembali</p>
                            <strong>{{ $late }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="bg-danger rounded mr-2 p-3">
                            <i class="fas fa-users h2" style="color: #fff"></i>
                        </span>
                        <div class="content-left">
                            <p class="mb-0 pb-2">Total Anggota</p>
                            <strong>{{ $memberCount }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="text-center my-5" id="BookCategoryChartLoader">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="card-body" id="BookCategorychart">
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="row">
                <div class="col-12">
                    <div class="card h-auto">
                        <div class="card-body" id="PopularCategory">
                            <h5 class="title pt-2 pb-2"> Kategori Populer</h5>
                            <div class="row">
                                <div class="col col-5 pb-2">
                                    <small class="font-weight-normal">#1 {{ $name_1 }}</small>
                                </div>
                                <div class="col col-4 progressBar pb-2">
                                    <div class="Bar">
                                        <div class="Progress" style="background-color: orange; width: {{ $percentage_1 }}%"></div>
                                    </div>
                                </div>
                                <div class="col col-3 pb-2">
                                    <strong>{{ $counter_1 }}</strong>
                                </div>
                                <div class=" col col-5 pb-2">
                                    <small class="font-weight-normal">#2 {{ $name_2 }}</small>
                                </div>
                                <div class="col col-4 progressBar pb-2">
                                    <div class="Bar">
                                        <div class="Progress" style="background-color: DodgerBlue; width: {{ $percentage_2 }}%"></div>
                                    </div>
                                </div>
                                <div class="col col-3 pb-2">
                                    <strong>{{ $counter_2 }}</strong>
                                </div>
                                <div class=" col col-5 pb-2">
                                    <small class="font-weight-normal">#3 {{ $name_3 }}</small>
                                </div>
                                <div class=" col col-4 progressBar pb-2">
                                    <div class="Bar">
                                        <div class="Progress" style="background-color: Crimson; width: {{ $percentage_3 }}%"></div>
                                    </div>
                                </div>
                                <div class="col col-3 pb-2">
                                    <strong>{{ $counter_3 }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="card">
                        <div class="text-center my-5" id="BookStatusChartLoader">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="card-body h-100 scroll flex-row flex-nowrap" id="BookStatusChart" style="height: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="text-center my-5" id="MostBorrowedBooksChartLoader">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="card-body" id="MostBorrowedBooksChart">
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="text-center my-5" id="TotalBorrowerChartLoader">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="card-body" id="TotalBorrowerChart">
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="text-center my-5" id="TotalIncomeChartLoader">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="card-body" id="TotalIncomeChart">
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-lg-6 pt-2">
                            <h3 class="card-title text-bold">Penyewaan Terbaru</h2>
                        </div>
                        <div class="col col-lg-6 pt-2">
                            <p class="text-md-right"><a href="{{ route('borrowings.index') }}">Lihat Semua</a></p>
                        </div>
                    </div>
                </div>
                <div class="card-body m-0 p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table" style="margin-bottom: 0">
                            <thead>
                                <tr>
                                    <th>Buku</th>
                                    <th>Penyewa</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($RecentBorrows as $key => $values)
                                <tr>
                                    <td>{{ $values->book->title }}</td>
                                    <td>{{ $values->member->full_name }}</td>
                                    <td>{{ date_format(date_create($values->borrow_date),"d M Y") }}</td>
                                    <td class="text-center pr-3"><a href="{{ route('borrowings.show', $values->id) }}"><i class="fas fa-search"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-lg-6 pt-2">
                            <h3 class="card-title text-bold">Pengembalian Terlambat</h2>
                        </div>
                        <div class="col col-lg-6 pt-2">
                            <select class="form-control float-right" style="width: 150px;">
                                <option value="Terbaru">Terbaru</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body m-0 p-0">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped w-100 d-block d-md-table" style="margin-bottom: 0">
                            <thead>
                                <tr>
                                    <th>Buku</th>
                                    <th>Penyewa</th>
                                    <th>Telat</th>
                                    <th>Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($LateReturn as $key => $values)
                                <tr>
                                    <td>{{ $values->book->title }}</td>
                                    <td>{{ $values->member->full_name }}</td>
                                    <td>{{ $values->late_days }} hari</td>
                                    <td>{{ formatRp($values->late_fee) }}</td>
                                    <td class="text-center pr-3"><a href="{{ route('borrowings.show', $values->id) }}"><i class="fas fa-search"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class=" modal fade" id="dataPointModal" tabindex="-1" role="dialog" aria-labelledby="dataPointModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataPointModalLabel">Detail Kategori</h5>
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

@section('css')
<Style>
    body {
        --table-width: 100%;
        /* Or any value, this will change dinamically */
    }

    tbody {
        display: block;
        max-height: 500px;
        overflow-y: auto;
    }

    thead,
    tbody tr {
        display: table;
        width: var(--table-width);
        table-layout: fixed;
    }

    .scroll {
        max-height: 240px;
        overflow-y: auto;
        max-width: 100%;
        overflow-x: auto;
    }

    .progressBar {
        margin: auto;
    }

    .Bar {
        border-radius: 25px;
        width: 100%;
        background-color: lightgray;
        height: 10px;
    }

    .Progress {
        border-radius: 25px;
        width: 30%;
        height: 10px;
    }
</style>
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    var month = {!!json_encode($jsmonth) !!} ? {!!json_encode($jsmonth) !!} : null;
    console.log(month);

    function FilterSubmit() {
        month = $('#month').val();
        console.log(month);
        // document.getElementById('dateFilter').submit();
        $('#dateFilter').submit();
    }
    $(document).ready(function() {
        // Show loader
        $('#BookCategoryChartLoader').show();
        $('#BookStatusChartLoader').show();
        $('#MostBorrowedBooksChartLoader').show();
        $('#TotalBorrowerChartLoader').show();
        $('#TotalIncomeChartLoader').show();

        //Book Category Chart
        $.ajax({
            url: "{{ route('dashboard.data.getBooksByCategory') }}",
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                'month': month,
            },
            success: function(response) {
                console.log(response)
                const title = 'Kategori Buku';
                const y = 0;
                var data = [];
                for (i in response) {
                    data.push({
                        "name": i,
                        "y": response[i],
                    });
                }

                // Create line chart
                createBookCategoryChart('BookCategorychart', data, title);

                // Hide loader
                $('#BookCategoryChartLoader').hide();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', error);
                // Hide loader in case of error
                $('#BookCategoryChartLoader').hide();
            }
        });

        //Book Status Chart
        $.ajax({
            url: "{{ route('dashboard.data.getBooksStatus') }}",
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                'month': month,
            },
            success: function(response) {
                const title = 'Status Buku';
                const y = 70;
                var data = [];
                for (i in response) {
                    data.push({
                        "name": i,
                        "y": response[i],
                    });
                }

                // Create line chart
                createBookStatusChart('BookStatusChart', data, title);

                // Hide loader
                $('#BookStatusChartLoader').hide();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', error);
                // Hide loader in case of error
                $('#BookStatusChartLoader').hide();
            }
        });
    });

    //Most Borrowed Book Chart
    $.ajax({
        url: "{{ route('dashboard.data.getBestSellerBooks') }}",
        method: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            'month': month,
        },
        success: function(response) {
            const title = 'Buku Terlaris';
            // const label = 'Status';
            const y = 70;
            var data = [];
            for (i in response) {
                data.push({
                    "name": i,
                    "y": response[i],
                });
            }

            // Create line chart
            createBestSellerChart('MostBorrowedBooksChart', data, title);

            // Hide loader
            $('#MostBorrowedBooksChartLoader').hide();
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ', error);
            // Hide loader in case of error
            $('#MostBorrowedBooksChartLoader').hide();
        }
    });

    //Total Borrower Chart
    $.ajax({
        url: "{{ route('dashboard.data.getTotalBorrower') }}",
        method: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            'month': month,
        },
        success: function(response) {
            const title = 'Total Penyewa Buku';
            const subtitle = 'Bulan Agustus';
            // const label = 'Status';
            const y = 70;
            var data = [];
            for (i in response) {
                data.push({
                    "name": i,
                    "y": response[i],
                });
            }

            // Create line chart
            createTotalBorrowerchart('TotalBorrowerChart', title, subtitle, response.dates, response.oldmembers, response.newmembers);

            // Hide loader
            $('#TotalBorrowerChartLoader').hide();
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ', error);
            // Hide loader in case of error
            $('#TotalBorrowerChartLoader').hide();
        }
    });

    //Total Income Chart
    $.ajax({
        url: "{{ route('dashboard.data.getTotalIncome') }}",
        method: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            'month': month,
        },
        success: function(response) {
            const title = 'Total Pendapatan';
            const subtitle = 'Bulan Agustus';
            var data = [];
            for (i in response) {
                data.push({
                    "name": i,
                    "y": response[i],
                });
            }

            var dates = ThreeDaysInterval();

            var today = new Date(); // Your timezone!
            var startdate = new Date(today);
            startdate.setDate(today.getDate() - 30);
            startdate.getTime();
            // var startdate = startdate.getTime();

            console.log(response.rents);

            // Create line chart
            createTotalIncomeChart('TotalIncomeChart', title, subtitle, response.incomes, response.rents, response.latefees, response.dates);

            // Hide loader
            $('#TotalIncomeChartLoader').hide();
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ', error);
            // Hide loader in case of error
            $('#TotalIncomeChartLoader').hide();
        }
    });

    function ThreeDaysInterval() {
        const today = new Date();
        const thirtyDaysAgo = new Date(today);
        thirtyDaysAgo.setDate(today.getDate() - 30);

        const dateArray = [];
        let currentDate = today;

        while (currentDate >= thirtyDaysAgo) {
            const today = new Date(currentDate);
            let mm = today.getMonth() + 1; // Months start at 0!
            let dd = today.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm == 1) {
                mm = 'Jan';
            } else if (mm == 2) {
                mm = 'Feb';
            } else if (mm == 3) {
                mm = 'Mar';
            } else if (mm == 4) {
                mm = 'Apr';
            } else if (mm == 5) {
                mm = 'May';
            } else if (mm == 6) {
                mm = 'Jun';
            } else if (mm == 7) {
                mm = 'Jul';
            } else if (mm == 8) {
                mm = 'Aug';
            } else if (mm == 9) {
                mm = 'Sep';
            } else if (mm == 10) {
                mm = 'Oct';
            } else if (mm == 11) {
                mm = 'Nov';
            } else if (mm == 12) {
                mm = 'Dec';
            };
            const formattedToday = dd + '-' + mm;
            dateArray.push(formattedToday); // Push a copy of the current date
            currentDate.setDate(currentDate.getDate() - 3); // Move 3 days back
        }

        return dateArray;
    }
</script>
<script src="{{ asset('charts/dashboard.js') }}"></script>
@endsection