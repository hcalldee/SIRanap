<div class="modal fade" id="reset-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= 'Reset ' . $title_slug; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formresetakun">
                    <input type="text" name="username" id="usr" value="" hidden>
                </form>
                <h6 class="text-center text-gray-900" id="r_info">Anda Yakin Ingin Reset Akun Ini...?</h6>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="resetakun">Reset Akun</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>