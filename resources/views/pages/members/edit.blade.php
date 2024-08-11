@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('page-header')
<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Anggota</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('members.index') }}"><i class="fas fa-users mr-1"></i> Anggota</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                    <h3 class="card-title">Form Edit Anggota</h3>
                </div>

                <!-- form start -->
                <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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

                        <div class="form-group">
                            <label for="full_name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $member->full_name) }}" required>
                            @if ($errors->has('full_name'))
                            <div class="text-danger">
                                {{ $errors->first('full_name') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $member->address) }}</textarea>
                            @if ($errors->has('address'))
                            <div class="text-danger">
                                {{ $errors->first('address') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $member->phone) }}" required>
                            @if ($errors->has('phone'))
                            <div class="text-danger">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $member->email) }}" required>
                            @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="type">Tipe Anggota</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="" disabled selected>Pilih tipe anggota</option>
                                <option value="pelajar" {{ old('type', $member->type) == 'pelajar' ? 'selected' : '' }}>Pelajar</option>
                                <option value="mahasiswa" {{ old('type', $member->type) == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                <option value="guru" {{ old('type', $member->type) == 'guru' ? 'selected' : '' }}>Guru</option>
                                <option value="dosen" {{ old('type', $member->type) == 'dosen' ? 'selected' : '' }}>Dosen</option>
                                <option value="umum" {{ old('type', $member->type) == 'umum' ? 'selected' : '' }}>Umum</option>
                            </select>
                            @if ($errors->has('type'))
                            <div class="text-danger">
                                {{ $errors->first('type') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="photo">Foto Anggota</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="customfile-input" id="photo" name="photo" accept=".png,.jpg,.jpeg" required>
                                    <label class="custom-file-label" for="photo">Pilih foto anggota</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="uploadButton">Unggah</span>
                                </div>
                            </div>
                            @if ($errors->has('photo'))
                            <div class="text-danger">
                                {{ $errors->first('photo') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-12">
                            <div class="row" id="previewContainer">
                                <div class="col-3">
                                    <label for="photoPreview">Pratinjau Foto</label>
                                    <img id="photoPreview" src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('https://placehold.co/400x600') }}" alt="Image Preview" class="img-fluid" />
                                </div>
                                <div class="col-9">
                                    <ul id="photoMetadata" class="list-unstyled mt-4">
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
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Update</button>
                        <a href="{{ route('members.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i>Kembali</a>
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
        // Store initial cover image for cancel functionality
        const initialphoto = $('#photoPreview').attr('src');

        $('#photo').change(function(e) {
            const file = e.target.files[0]; // Get the selected file
            if (file) {
                const maxSizeMB = 1; // Maximum file size in MB
                const maxSizeBytes = maxSizeMB * 1024 * 1024; // Convert MB to Bytes

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#photoPreview').attr('src', e.target.result); // Set image preview
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
            }
        });

        $('#cancelUploadButton').click(function() {
            // Reset file input
            $('#photo').val('');
            // Reset file input label
            $('.custom-file-label').html('Pilih gambar PNG');
            // Reset preview image to initial cover image
            $('#photoPreview').attr('src', initialphoto);
            // Hide any error messages
            $('#fileError').addClass('d-none');
            $('#fileError2').addClass('d-none');
            // Clear metadata information
            $('#fileName').text('');
            $('#fileSize').text('');
            $('#fileType').text('');
            // Hide the cancel button
            $('#cancelUploadButton').addClass('d-none');
        });
    });
</script>
@endsection