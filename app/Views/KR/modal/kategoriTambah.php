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
                <form action="#" id="formtambahkategori">
                    <input type="text" name="id_ruangan" id="id_ruangan" value="<?= $id_ruangan ?>" hidden>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="exampleInputEmail1">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Nama Kelas">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="example">Bed</label>
                            <select class="custom-select" id="jml_bed" name="jml_bed">
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
                <button type="button" class="btn btn-primary" id="tambahkategori">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>