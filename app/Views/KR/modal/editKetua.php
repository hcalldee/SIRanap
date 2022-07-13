<div class="modal fade" id="edit-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= 'Ubah ' . $title_slug; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formeditrole">
                    <div class="form-group">
                        <label for="example">Perawat</label>
                        <input type="text" id="usr" name="username" value="" hidden>
                        <select class="custom-select" id="input-role-perawat" name="perawat">
                            <option value="">Pilih Perawat</option>
                            <?php
                            foreach ($perawat as $p) { ?>
                                <option value="<?= $p['id_user'] ?>"><?= $p['nama'] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editketua">Ubah Ketua</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>