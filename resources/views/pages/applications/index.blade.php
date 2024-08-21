@extends('layouts.app')

@section('title', 'Pengaturan Aplikasi')

@section('page-header')
<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pengaturan Aplikasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('applications.index') }}"><i class="fas fas fa-cog mr-1"></i> Aplikasi</a></li>
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
                    <h3 class="card-title">Form Pengaturan Aplikasi</h3>
                </div>

                <!-- form start -->
                <form action="{{ route('applications.update', $application->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body media align-items-center">
                        <div id="picture">
                            <img id="photoPreview" src="{{ Storage::disk('public')->exists($application->logo ? $application->logo : 'logo.jpg') ? asset('storage/'.$application->logo) : asset('AdminLTE-3.2.0/dist/img/AdminLTELogo.png') }}">
                        </div>
                        <div class="media-body ml-4" id="mediabtn">
                            <label class="btn btn-outline-primary" id="filebutton">
                                <div id="overlay">Upload Logo Baru</div>
                                <input id="logo" name="logo" type="file" class="FileUpload" accept=".jpg,.png,.jpeg">
                            </label>
                            <div class="col-9">
                                <ul id="photoMetadata" class="list-unstyled mt-4">
                                    <li><span id="fileName"></span></li>
                                    <li><span id="fileSize"></span></li>
                                    <li><span id="fileType"></span></li>
                                </ul>
                                <div class="text-danger d-none" id="fileError">File terlalu besar, maksimal ukuran 1 MB.</div>
                            </div>
                        </div>
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control mb-1" value="{{ $application->name }}" maxlength="255" onkeypress="return isLetter(event)" required="" oninvalid="this.setCustomValidity('Nama wajib diisi!')" oninput="setCustomValidity('')">
                            @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $application->email }}" required oninvalid="if (this.value == ''){this.setCustomValidity('Email wajib diisi!')} if (this.value != ''){this.setCustomValidity('Format email tidak valid!')}" oninput="setCustomValidity('')">
                            @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" class="form-control mb-1" rows="4" value="{{ $application->description }}" required="" oninvalid="this.setCustomValidity('Deskripsi wajib diisi!')" oninput="setCustomValidity('')">{{ $application->description }}</textarea>
                            @if ($errors->has('description'))
                            <div class="text-danger">
                                {{ $errors->first('description') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone">phone</label>
                            <input type="text" name="phone" class="form-control mb-1" value="{{ $application->phone }}" onkeypress="return isNumber(event)" required="" oninvalid="this.setCustomValidity('Telepon wajib diisi!')" oninput="setCustomValidity('')">
                            @if ($errors->has('phone'))
                            <div class="text-danger">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="facebook">Facebok</label>
                                    <input type="text" class="form-control" name="facebook" placeholder="Masukkan link facebook" value="{{ $application->facebook }}">
                                    @if ($errors->has('facebook'))
                                    <div class="text-danger">
                                        {{ $errors->first('facebook') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="twitter">X</label>
                                    <input type="text" class="form-control" name="twitter" placeholder="Masukkan link X" value="{{ $application->twitter }}">
                                    @if ($errors->has('twitter'))
                                    <div class="text-danger">
                                        {{ $errors->first('twitter') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" placeholder="Masukkan link instagram" value="{{ $application->instagram }}">
                                    @if ($errors->has('instagram'))
                                    <div class="text-danger">
                                        {{ $errors->first('instagram') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="text" class="form-control" name="linkedin" placeholder="Masukkan link LinkedIn" value="{{ $application->linkedin }}" >
                                    @if ($errors->has('linkedin'))
                                    <div class="text-danger">
                                        {{ $errors->first('linkedin') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    #overlay {
        text-align: center;
        position: absolute;
    }

    .FileUpload {
        opacity: 0;
        position: relative;
        z-index: 1;
    }

    #picture {
        height: 200px !important;
        width: 200px !important;
        overflow: hidden;
    }

    #filebutton {
        height: 40px;
        width: 160px;
    }

    #picture img {
        /* max-width: 100%; */
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
@endsection

@section('js')
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }

    $(document).ready(function() {
        $('#logo').change(function(e) {
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
                $(this).next('.custom-file-label').html('Pilih foto anggota'); // Reset file input label
                // Clear metadata information
                $('#fileName').text('');
                $('#fileSize').text('');
                $('#fileType').text('');
                $('#cancelUploadButton').addClass('d-none'); // Hide the cancel button
            }
        });

        $('#cancelUploadButton').click(function() {
            // Reset file input
            $('#logo').val('');
            // Reset file input label
            $('.custom-file-label').html('Pilih foto');
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

        @if(session('success'))
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Berhasil',
            autohide: true, // Enable auto hide
            delay: 3000, // Auto close after 3 seconds
            body: '{{ session("success") }}'
        });
        @endif

        @if(session('failed'))
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Gagal',
            autohide: true, // Enable auto hide
            delay: 3000, // Auto close after 3 seconds
            body: '{{ session("failed") }}'
        });
        @endif
    });
</script>
@endsection