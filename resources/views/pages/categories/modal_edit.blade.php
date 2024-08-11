<!-- The Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="#" method="POST" id="editForm" onsubmit="get_action(this);">
                @csrf
                @method('PUT')
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editName">Nama Kategori</label>
                        <input type="text" class="form-control" id="editName" name="name" value="{{ old('name') }}" maxlength="255" required="" oninvalid="this.setCustomValidity('Nama wajib diisi!')" oninput="setCustomValidity('')">
                    </div>
                    <input type="hidden" id="editAction" value="" />
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