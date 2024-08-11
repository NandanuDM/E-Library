<!-- The Modal -->
<div class="modal fade" id="createModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Penerbit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('publishers.store') }}" method="POST">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="createName">Nama Penerbit</label>
                        <input type="text" class="form-control" id="createName" name="name" value="{{ old('name') }}" maxlength="255" required="" oninvalid="this.setCustomValidity('Nama wajib diisi!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>