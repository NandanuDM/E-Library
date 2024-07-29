@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('page-header')
<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('books.index') }}"><i class="fas fa-book mr-1"></i> Buku</a></li>
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
                    <h3 class="card-title">Form Tambah Buku</h3>
                </div>

                <!-- form start -->
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul buku" value="{{ old('title') }}" required>
                                    @if ($errors->has('title'))
                                        <div class="text-danger">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="author">Pengarang</label>
                                    <input type="text" class="form-control" id="author" name="author" placeholder="Masukkan nama pengarang" value="{{ old('author') }}" required>
                                    @if ($errors->has('author'))
                                        <div class="text-danger">
                                            {{ $errors->first('author') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan ISBN" value="{{ old('isbn') }}">
                                    @if ($errors->has('isbn'))
                                        <div class="text-danger">
                                            {{ $errors->first('isbn') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="published_year">Tahun Terbit</label>
                                    <input type="number" class="form-control" id="publishedYear" name="published_year" placeholder="Masukkan tahun terbit" value="{{ old('published_year') }}" required>
                                    @if ($errors->has('published_year'))
                                        <div class="text-danger">
                                            {{ $errors->first('published_year') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select class="form-control" id="categoryId" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <div class="text-danger">
                                            {{ $errors->first('category_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="publisher_id">Penerbit</label>
                                    <select class="form-control" id="publisherId" name="publisher_id" required>
                                        @foreach($publishers as $publisher)
                                            <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('publisher_id'))
                                        <div class="text-danger">
                                            {{ $errors->first('publisher_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="language">Bahasa</label>
                                    <select class="form-control" id="language" name="language" required>
                                        <option value="indonesia" {{ old('language') == 'indonesia' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="inggris" {{ old('language') == 'inggris' ? 'selected' : '' }}>Inggris</option>
                                        <option value="arab" {{ old('language') == 'arab' ? 'selected' : '' }}>Arab</option>
                                        <option value="mandarin" {{ old('language') == 'mandarin' ? 'selected' : '' }}>Mandarin</option>
                                        <option value="jepang" {{ old('language') == 'jepang' ? 'selected' : '' }}>Jepang</option>
                                        <option value="perancis" {{ old('language') == 'perancis' ? 'selected' : '' }}>Perancis</option>
                                        <option value="lain-lain" {{ old('language') == 'lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                                    </select>
                                    @if ($errors->has('language'))
                                        <div class="text-danger">
                                            {{ $errors->first('language') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="stock">Stok</label>
                                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan jumlah stok" value="{{ old('stock') }}" required>
                                    @if ($errors->has('stock'))
                                        <div class="text-danger">
                                            {{ $errors->first('stock') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- Accept only PNG images -->
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="coverImage">Gambar Sampul</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="coverImage" name="cover_image" accept=".png" required>
                                            <label class="custom-file-label" for="coverImage">Pilih gambar PNG</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="uploadButton">Unggah</span>
                                        </div>
                                    </div>
                                    @if ($errors->has('cover_image'))
                                        <div class="text-danger">
                                            {{ $errors->first('cover_image') }}
                                        </div>
                                    @endif
                                    <button type="button" class="btn btn-danger mt-2 d-none" id="cancelUploadButton"><i class="fas fa-trash-alt"></i> Batal Pilih</button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="rental_price">Harga Sewa</label>
                                    <input type="number" class="form-control" id="rentalPrice" name="rental_price" placeholder="Masukkan harga sewa" value="{{ old('rental_price') }}" required>
                                    @if ($errors->has('rental_price'))
                                        <div class="text-danger">
                                            {{ $errors->first('rental_price') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row d-none" id="previewContainer">
                                    <div class="col-3">
                                        <label for="coverPreview">Pratinjau Sampul</label>
                                        <img id="coverPreview" src="#" alt="Image Preview" class="img-fluid"/>
                                    </div>
                                    <div class="col-9">
                                        <ul id="coverMetadata" class="list-unstyled mt-4">
                                            <li><span id="fileName"></span></li>
                                            <li><span id="fileSize"></span></li>
                                            <li><span id="fileType"></span></li>
                                        </ul>
                                        <div class="text-danger d-none" id="fileError">File terlalu besar, maksimal ukuran 1 MB.</div>
                                        <div class="text-danger d-none" id="fileError2">File melebihi ukuran 2 MB, tidak dapat diunggah.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i>Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#coverImage').change(function(e) {
        const file = e.target.files[0]; // Get the selected file
        if (file) {
            const maxSizeMB = 1; // Maximum file size in MB
            const maxSizeBytes = maxSizeMB * 1024 * 1024; // Convert MB to Bytes

            const reader = new FileReader();
            reader.onload = function(e) {
                $('#coverPreview').attr('src', e.target.result); // Set image preview
                $('#previewContainer').removeClass('d-none'); // Show the preview container
                $('#cancelUploadButton').removeClass('d-none'); // Show the cancel button
            }
            reader.readAsDataURL(file); // Read the file as a data URL

            // Update the label with the file name
            $(this).next('.custom-file-label').html(file.name);

            // Update metadata information
            $('#fileName').text(file.name);

            // Check if file size exceeds the limit
            if (file.size > maxSizeBytes) {
                // Display size in MB if file is too large
                const fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);
                $('#fileSize').text(fileSizeMB + ' MB');
                // Show error message
                $('#fileError').removeClass('d-none');
                $('#previewContainer').addClass('d-none'); // Hide preview if file is too large
            } else {
                // Display size in KB if it's within the limit
                $('#fileSize').text((file.size / 1024).toFixed(2) + ' KB');
                $('#fileError').addClass('d-none'); // Hide error message
            }

            $('#fileType').text(file.type); // Display file type
        } else {
            // If no file is selected, hide preview and error message, reset label and metadata
            $('#previewContainer').addClass('d-none');
            $('#fileError').addClass('d-none');
            $(this).next('.custom-file-label').html('Pilih gambar PNG'); // Reset file input label
            // Clear metadata information
            $('#fileName').text('');
            $('#fileSize').text('');
            $('#fileType').text('');
            $('#cancelUploadButton').addClass('d-none'); // Hide the cancel button
        }
    });

    $('#cancelUploadButton').click(function() {
        // Reset file input
        $('#coverImage').val('');
        // Reset file input label
        $('.custom-file-label').html('Pilih gambar PNG');
        // Hide preview container
        $('#previewContainer').addClass('d-none');
        // Hide the cancel button
        $('#cancelUploadButton').addClass('d-none');
        // Clear metadata information
        $('#fileName').text('');
        $('#fileSize').text('');
        $('#fileType').text('');
        // Hide any error messages
        $('#fileError').addClass('d-none');
        $('#fileError2').addClass('d-none');
    });
});
</script>
@endsection