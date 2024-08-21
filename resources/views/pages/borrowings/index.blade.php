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
                            <li class="breadcrumb-item active"><i class="fas fa-file mr-1"></i> Penyewaan</li>
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
                    <a href="{{ route('borrowings.export') }}" class="btn btn-success float-right"><i class="fas fa-light fa-file-export"></i></i> Export Excel</a>
                </div>
                <div class="card-body">
                    <table id="borrowingsTable" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead style="background-color: cyan;">
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
<script>
    function confirmDelete(Id, book, renter) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Setelah dihapus, Anda tidak dapat memulihkan penyewaan buku \"" + book + "\" yang dipinjam oleh \"" + renter + "\"!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + Id).submit();
            }
        })
    }

    $(document).ready(function() {
        $('#borrowingsTable').DataTable({
            ajax: "{{ route('borrowings.index') }}",
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
                    data: "member.full_name",
                },
                {
                    data: 'book.title',
                },
                {
                    data: 'borrow_date',
                },
                {
                    data: 'return_date',
                },
                {
                    data: 'status',
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        if (row.is_late) {
                            return "<span class = \"badge badge-danger\" > Terlambat " + row.late_days + " hari </span>"
                        } else {
                            return "<span class=\"badge badge-success \">Tidak terlambat</span>"
                        }
                    }
                },
                {
                    data: 'formatted_late_fee',
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        console.log("data = " + row.id);
                        var dropdown = "<div class=\"btn-group dropleft\"> <button type = \"button\" class=\"btn btn-secondary btn-sm\">Pilih</button> <button type = \"button\" class=\"btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <span class = \"sr-only\">Toggle Dropdown</span> </button>";
                        var buttons = "<div class=\"dropdown-menu dropdown-menu-left\"> <a class = \"dropdown-item\" href=\"/borrowings/" + row.id + "\">Detail</a> <a class = \"dropdown-item\" href=\"/borrowings/" + row.id + "/edit\">Edit</a> <a class = \"dropdown-item\" href=\"#\" onclick=\"confirmDelete('" + row.id + "', '" + row.book.title + "', '" + row.member.full_name + "' )\">Hapus</a> </div> </div>";
                        var form = "<form id=\"delete-form-" + row.id + "\" action=\"/borrowings/" + row.id + "\" method=\"POST\" style=\"display: none;\"> <input type = \"hidden\" name=\"_token\" value=\" {{csrf_token()}} \"> <input type = \"hidden\" name=\"_method\" value=\"delete\" /> </form>";
                        var allButton = dropdown + buttons + form;
                        return allButton;
                    }
                }
            ]
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
    });
</script>
@endsection