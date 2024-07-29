@extends('layouts.app')

@section('title', 'Detail Penyewaan Buku')

@section('page-header')
<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Penyewaan Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('borrowings.index') }}"><i class="fas fa-book mr-1"></i> Penyewaan</a></li>
                            <li class="breadcrumb-item active">Detail</li>
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
                <div class="card-header">
                    <h3 class="card-title">Detail Penyewaan Buku</h3>
                </div>

                <div class="card-body">
                    @if ($isLate)
                        <div class="alert alert-danger">
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Keterlambatan!</h5>
                            @if ($borrowing->return_date)
                                Buku ini terlambat dikembalikan selama {{ $lateDays }} hari. Denda yang dikenakan: {{ $lateFee }}
                            @else
                                Buku ini sudah terlambat selama {{ $lateDays }} hari. Denda yang dikenakan saat ini: {{ $lateFee }}
                            @endif
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $borrowing->book->cover_image ? asset('storage/' . $borrowing->book->cover_image) : asset('https://placehold.co/400x600') }}" 
                                 alt="{{ $borrowing->book->title }}" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="member_id">Peminjam</label>
                                <p>{{ $borrowing->member->full_name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="book_id">Judul Buku</label>
                                <p>{{ $borrowing->book->title }}</p>
                            </div>
                            <div class="form-group">
                                <label for="borrow_date">Tanggal Peminjaman</label>
                                <p>{{ formatDate($borrowing->borrow_date) }}</p>
                            </div>
                            <div class="form-group">
                                <label for="return_date">Tanggal Pengembalian</label>
                                <p>{{ formatDate($borrowing->return_date) }}</p>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <p>{{ $borrowing->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('borrowings.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
