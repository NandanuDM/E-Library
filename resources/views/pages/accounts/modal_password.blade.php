<!-- The Modal -->
<div class="modal fade" id="passwwordModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ganti Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('accounts.passwordChange') }}" method="POST" id="changepassword">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="card-body pb-2">

                        <div class="form-group">
                            <label class="form-label">Current password</label>
                            <input type="password" id="currentpassword" name="currentpassword" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">New password</label>
                            <input type="password" id="newpassword" name="newpassword" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Repeat new password</label>
                            <input type="password" id="repeatnewpassword" name="repeatnewpassword" class="form-control">
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="passwordCheck(event)"><i class="fas fa-save mr-1"></i>Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>