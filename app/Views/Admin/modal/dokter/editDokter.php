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
                <form action="#" id="formeditdokter">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dokter</label>
                        <input type="text" class="form-control" id="e_nama" name="nama">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="exampleInputEmail1">Spesialis</label>
                            <select class="custom-select" id="e_spesialis" name="spesialis">
                                <option value="">Pilih Spesialis</option>
                                <?php
                                foreach ($spesialis as $sp) { ?>
                                    <option value="<?= $sp['id'] ?>">
                                        <?= $sp['nama'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">No Telepon</label>
                            <input type="text" class="form-control" id="e_no_telp" name="no_telp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="e_alamat" name="alamat" rows="2"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editdokter">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>