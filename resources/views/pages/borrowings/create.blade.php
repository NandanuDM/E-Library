@extends('layouts.app')

@section('title', 'Tambah Penyewaan Buku')

@section('page-header')
<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Penyewaan Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('borrowings.index') }}"><i class="fas fa-book mr-1"></i> Penyewaan</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
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
                    <h3 class="card-title">Form Penyewaan Buku</h3>
                </div>

                <!-- form start -->
                <form action="{{ route('borrowings.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <!-- validation error handler -->
                        @if ($errors->any())
                        <div class="alert alert-secondary alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Terdapat input yang tidak valid!</h5>
                            <ul class="mb-0 px-3">
                                @foreach ($errors->all() as $error)
                                <li><small>{{ $error }}</small></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="member_id">Anggota</label>
                                    <select class="form-control" id="member_id" name="member_id" required oninvalid="this.setCustomValidity('Anggota wajib dipilih!')" oninput="setCustomValidity('')">
                                        @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="book_id">Buku</label>
                                    <select class="form-control" id="bookId" name="book_id" required onchange="updateRentalPrice()" oninvalid="this.setCustomValidity('Buku wajib dipilih!')" oninput="setCustomValidity('')">
                                        <option value="" selected disabled>Pilih Buku</option>
                                        @foreach($books as $book)
                                        <option value="{{ $book->id }}" data-rental-price="{{ $book->rental_price }}">{{ $book->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="borrow_date">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="{{ old('borrow_date', date('Y-m-d')) }}" required oninvalid="this.setCustomValidity('Tanggal peminjaman wajib diisi!')" oninput="setCustomValidity('')">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="rental_price">Biaya Sewa</label>
                                    <input type="number" class="form-control" id="rentalPrice" name="rental_price" value="{{ old('rental_price') }}" required readonly>
                                </div>
                            </div>
                            <!-- hidden librarian_id -->
                            <input type="hidden" name="librarian_id" value="{{ Auth::id() }}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
                        <a href="{{ route('borrowings.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i>Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function updateRentalPrice() {
        const bookSelect = document.getElementById('bookId');
        const rentalPriceInput = document.getElementById('rentalPrice');
        const selectedOption = bookSelect.options[bookSelect.selectedIndex];
        const rentalPrice = selectedOption.getAttribute('data-rental-price');
        rentalPriceInput.value = rentalPrice;
    }
</script>
@endsection