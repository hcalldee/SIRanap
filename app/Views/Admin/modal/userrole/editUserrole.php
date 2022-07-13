<div class="modal fade" id="edit-<?= $title_slug ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formeditrole">
                    <div class="form-group">
                        <label for="example">Jabatan</label>
                        <select class="custom-select" id="e_role" name="role">
                            <option value="">Pilih Jabatan</option>
                            <?php foreach ($role as $r) {
                                if ($r['nama'] != 'Admin') { ?>
                                    <option value="<?= $r['id'] ?>"><?= $r['nama'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edituserrole">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>