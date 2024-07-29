@extends('layouts.app')

@section('title', 'Daftar Penyewaan Buku')

@section('page-header')
<div class="row">
    <div class="col-12">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Penyewaan Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><i class="fas fa-book mr-1"></i> Penyewaan</li>
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
                <div class="card-header">
                    <a href="{{ route('borrowings.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Tambah Penyewaan</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Anggota</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                                <th>Keterlambatan</th>
                                <th>Denda Keterlambatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowings as $borrowing)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $borrowing->member->full_name }}</td>
                                    <td>{{ $borrowing->book->title }}</td>
                                    <td>{{ $borrowing->formatted_borrow_date }}</td>
                                    <td>{{ $borrowing->formatted_return_date }}</td>
                                    <td>{{ ucfirst($borrowing->status) }}</td>
                                    <td>
                                        @if ($borrowing->is_late)
                                            <span class="badge badge-danger">Terlambat {{ $borrowing->late_days }} hari</span>
                                        @else
                                            <span class="badge badge-success">Tidak terlambat</span>
                                        @endif
                                    </td>
                                    <td>{{ $borrowing->formatted_late_fee }}</td>
                                    <td>
                                        <a href="{{ route('borrowings.show', $borrowing->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this borrowing?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection