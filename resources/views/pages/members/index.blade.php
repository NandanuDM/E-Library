@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('page-header')
<div class="row">
    <div class="col-12">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Anggota</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><i class="fas fa-users mr-1"></i> Anggota</li>
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
                    <a href="{{ route('members.create') }}" class="btn btn-primary float-left"><i class="fas fa-plus mr-1"></i>Tambah Anggota</a>
                    <a href="{{ route('members.export') }}" class="btn btn-success float-right"><i class="fas fa-light fa-file-export"></i></i> Export Excel</a>
                </div>
                <div class="card-body">
                    <table id="membersTable" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead style="background-color: cyan;">
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Tipe Anggota</th>
                                <th style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<style>
</style>
@endsection

@section('js')
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#membersTable').DataTable({
            ajax: " {{ route('members.index') }}",
            processing: true,
            serverSide: true,
            order: [
                [2, 'asc']
            ],
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    width: '5%'
                },
                {
                    data: "photo",
                    render: function(data) {
                        if (FileExists('storage/' + data)) {
                            return '<img src="storage/' + data + '" width="80px height="80px">'
                        } else {
                            return `<img src="{{ asset('storage/members/defaultPhoto.png') }}" width="80px" height="80px" />`;
                        }
                    }
                },
                {
                    data: 'full_name',
                },
                {
                    data: 'address',
                },
                {
                    data: 'phone',
                },
                {
                    data: 'email',
                },
                {
                    data: 'type',
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        console.log("data = " + row.id);
                        var show = "<a href=\"/members/" + row.id + "\" class=\"btn btn-info btn-sm mr-1\"> Detail </a>";
                        var edit = "<a href = \"/members/" + row.id + "/edit\" class = \"btn btn-warning btn-sm mr-1\" > Edit </a>";
                        var form = "<form id=\"deleteForm-" + row.id + "\" action = \"/members/" + row.id + "\" method = \"POST\" style = \"display:inline;\" > <input type=\"hidden\" name=\"_token\" value=\" {{csrf_token()}} \"> <input type=\"hidden\"name=\"_method\" value=\"delete\" /> </form>";
                        var destroy = "<button type = \"button\" id=\"n-" + meta.row + "\" class = \"deletebtn btn-danger btn-sm\" > Delete </button> ";
                        var allButton = show + edit + destroy + form;
                        return allButton;
                    }
                }
            ]
        });

        function FileExists(link) {
            var http = new XMLHttpRequest();
            http.open('HEAD', link, false);
            http.send();
            return http.status != 404;
        }

        $('#membersTable tbody').on('click', '.deletebtn', function() {
            var id = $(this).attr("id").match(/\d+/)[0];
            var data = $('#membersTable').DataTable().row(id).data();
            confirmDelete(data['id'], data['full_name']);
        });

        function confirmDelete(memberId, memberName) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Setelah dihapus, Anda tidak dapat memulihkan anggota \"" + memberName + "\"!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + memberId).submit();
                }
            })
        }


        @if(session('success'))
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Berhasil',
            autohide: true, // Enable auto hide
            delay: 3000, // Auto close after 3 seconds
            body: '{{ session("success") }}'
        });
        @endif
    });
</script>
@endsection