<div class="modal fade" id="Tambah-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= 'Tambah ' . $title_slug; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formrole">
                    <div class="form-group">
                        <label for="example">Perawat</label>
                        <select class="custom-select" id="input-role-perawat" name="perawat">
                            <option id="pilih-perawat" value="">Pilih Perawat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example">Jabatan</label>
                        <select class="custom-select" id="input-jabatan-perawat" name="role">
                            <option id="pilih-perawat" value="">Pilih Jabatan</option>
                        </select>
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="buatrole">Buat Jabatan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>