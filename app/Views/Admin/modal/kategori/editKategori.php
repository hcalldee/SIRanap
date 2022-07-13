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
                <form action="#" id="formeditkategori">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="exampleInputEmail1">Kelas</label>
                            <input type="text" class="form-control" id="e_kategori" name="kategori" placeholder="Nama Kelas">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="example">Ruangan</label>
                            <select class="custom-select" id="e_ruang" name="ruangan">
                                <option value="">Ruangan</option>
                                <?php foreach ($ruangan as $r) { ?>
                                    <?php if ($r['id'] == session()->get('ruangan')) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    } ?>
                                    <option value="<?= $r['id'] ?>" <?= $selected ?>><?= $r['nama_ruangan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="example">Bed</label>
                            <select class="custom-select" id="e_jml_bed" name="jml_bed">
                                <option value="">Jumlah Bed</option>
                                <?php for ($i = 1; $i <= 20; $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editkategori">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>