@extends('layouts.app')

@section('title', 'Date Picker')

@section('page-header')
<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Date Picker</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><i class="fas fa-calendar mr-1"></i> Date Picker</li>
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
        <div class="col-12 col-lg-8 offset-lg-2">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title">Contoh Penggunaan Date Picker</h3>
                </div>

                <!-- form start -->
                <form action="#" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group date" id="datepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datepicker">
                                        <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal dan Jam</label>
                                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker">
                                        <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Rentang Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="daterangepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Rentang Waktu dan Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="datetimerangepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Minimal Hari Ini</label>
                                    <div class="input-group date" id="datepicker-min-date" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datepicker-min-date">
                                        <div class="input-group-append" data-target="#datepicker-min-date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Maksimal Hari ini</label>
                                    <div class="input-group date" id="datepicker-max-date" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datepicker-max-date">
                                        <div class="input-group-append" data-target="#datepicker-max-date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('AdminLTE-3.2.0/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('#datepicker').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('#datetimepicker').datetimepicker({ 
        icons: { time: 'far fa-clock' } 
    });

    $('#daterangepicker').daterangepicker({
        locale: {
            format: 'MM/DD/YYYY'
        }
    })

    $('#datetimerangepicker').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY'
        }
    })

    $('#datepicker-min-date').datetimepicker({
        format: 'DD/MM/YYYY',
        minDate: moment() // Set minimum date to today
    });

    $('#datepicker-max-date').datetimepicker({
        format: 'DD/MM/YYYY',
        maxDate: moment() // Set maximum date to today
    });
});s
</script>
@endsection
