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
                <form action="#" id="formeditruangan">
                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="exampleInputEmail1">Nama Ruangan</label>
                            <input type="text" class="form-control" id="e_nama-ruangan" name="ruangan">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Kapasitas</label>
                            <select name="kapasitas" class="custom-select" id="e_kapasitas">
                                <option value="">Bed</option>
                                <?php for ($i = 1; $i < 61; $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editruangan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>