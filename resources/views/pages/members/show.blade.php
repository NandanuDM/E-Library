@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('page-header')
<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Anggota</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('members.index') }}"><i class="fas fa-book mr-1"></i> Member</a></li>
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
                    <h3 class="card-title">{{ $member->full_name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('https://placehold.co/400x600') }}" style="width: 600px; height:320px;" alt="{{ $member->full_name }}" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Nama Anggota</label>
                                        <p>{{ $member->full_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Alamat</label>
                                        <p>{{ $member->address }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="published_year">Nomor Telepon</label>
                                        <p>{{ $member->phone }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Email</label>
                                        <p>{{ $member->email }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="publisher_id">Tipe Anggota</label>
                                        <p>{{ $member->type }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('members.index') }}" class="btn btn-primary mt-3"><i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar Anggota</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection