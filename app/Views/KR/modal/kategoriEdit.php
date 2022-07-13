<div class="modal fade" id="edit-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= 'Edit ' . $title_slug; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formeditkategori">
                    <input type="text" name="id_ruangan" id="e_id_ruangan" value="" hidden>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="exampleInputEmail1">Kategori</label>
                            <input type="text" class="form-control" id="e_kategori" name="kategori" placeholder="Nama Kelas">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="example">Bed</label>
                            <select class="custom-select" id="e_jml_bed" name="jml_bed">
                                <option value="">Jumlah Bed</option>
                                <?php for ($i = 1; $i <= 20; $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editkategori">Ubah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>