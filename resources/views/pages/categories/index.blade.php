@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('page-header')
<div class="row">
    <div class="col-12">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><i class="fas fa-users mr-1"></i> Kategori</li>
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
                    <a class="btn btn-primary float-left" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus mr-1"></i>Tambah kategeori</a>
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
                    <table id="categoriesTable" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead style="background-color: cyan;">
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.categories.modal_create');
@include('pages.categories.modal_edit');
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
    function onEdit(action, name) {
        console.log(action);
        $("#editName").val(name);
        $("#editAction").val(action);
    };

    function get_action(form) {
        var action = $("#editAction").val();
        console.log("action = " + action);
        form.action = action;
    }
    $(document).ready(function() {
        $('#categoriesTable').DataTable({
            ajax: " {{ route('categories.index') }}",
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
                    data: null,
                    render: function(data, type, row, meta) {
                        console.log("data = " + row.id);
                        var edit = "<a data-toggle=\"modal\" data-target=\"#editModal\" class = \"btn btn-warning btn-sm mr-2\" onclick=\"onEdit('/categories/" + row.id + "', '" + row.name + "')\"> Edit </a>";
                        var destroy = "<button type = \"button\" id=\"n-" + meta.row + "\" class = \"deletebtn btn btn-danger btn-sm\" > Delete </button> ";
                        var form = "<form id=\"deleteForm-" + row.id + "\" action = \"/categories/" + row.id + "\" method = \"POST\" style = \"display:inline;\" > <input type=\"hidden\" name=\"_token\" value=\" {{csrf_token()}} \"> <input type=\"hidden\"name=\"_method\" value=\"delete\" /> </form>";
                        var allButton = edit + destroy + form;
                        return allButton;
                    }
                }
            ]
        });

        $('#categoriesTable tbody').on('click', '.deletebtn', function() {
            var id = $(this).attr("id").match(/\d+/)[0];
            var data = $('#categoriesTable').DataTable().row(id).data();
            confirmDelete(data['id'], data['name']);
        });

        function confirmDelete(memberId, memberName) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Setelah dihapus, Anda tidak dapat memulihkan kategori \"" + memberName + "\"!",
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