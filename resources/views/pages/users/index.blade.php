@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('page-header')
<div class="row">
    <div class="col-12">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Pengguna</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><i class="nav-icon fas fa-user-friends"></i> Pengguna</li>
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
                    <a class="btn btn-primary float-left" href="{{ route('users.create') }}"><i class="fas fa-plus mr-1"></i>Tambah pengguna</a>
                </div>
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
                    <div class="card-body">
                        <table id="usersTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead style="background-color: cyan;">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</< /th>
                                    <th>Role</th>
                                    <th>Dibuat Pada</th>
                                    <th>Aksi</th>
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
    <script type="text/javascript" src="http://www.datejs.com/build/date.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#usersTable').DataTable({
                ajax: " {{ route('users.index') }}",
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        width: '5%'
                    },
                    {
                        data: "name",
                    },
                    {
                        data: "email",
                    },
                    {
                        data: "role",
                    },
                    {
                        data: "created_at",
                        render: function(data, row, meta, type) {
                            const date = new Date(data);
                            let yyyy = date.getFullYear();
                            let mm = date.getMonth() + 1; // Months start at 0!
                            let dd = date.getDate();

                            let hh = date.getHours();
                            let m = date.getMinutes();

                            if (dd < 10) dd = '0' + dd;
                            if (mm < 10) mm = '0' + mm;
                            if (hh < 10) hh = '0' + hh;
                            if (m < 10) m = '0' + m;

                            const formatteddate = dd + '/' + mm + '/' + yyyy + ' ' + hh + ':' + m;
                            return formatteddate;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            var destroy = "<button type = \"button\" id=\"n-" + meta.row + "\" class = \"deletebtn btn btn-danger btn-sm\" > Delete </button> ";
                            var form = "<form id=\"deleteForm-" + row.id + "\" action = \"/users/" + row.id + "\" method = \"POST\" style = \"display:inline;\" > <input type=\"hidden\" name=\"_token\" value=\" {{csrf_token()}} \"> <input type=\"hidden\"name=\"_method\" value=\"delete\" /> </form>";
                            var allButton = destroy + form;
                            return allButton;
                        }
                    }
                ]
            });

            $('#usersTable tbody').on('click', '.deletebtn', function() {
                var id = $(this).attr("id").match(/\d+/)[0];
                var data = $('#usersTable').DataTable().row(id).data();
                confirmDelete(data['id'], data['name']);
            });

            function confirmDelete(userId, name) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Setelah dihapus, Anda tidak dapat memulihkan Pengguna \"" + name + "\"!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm-' + userId).submit();
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