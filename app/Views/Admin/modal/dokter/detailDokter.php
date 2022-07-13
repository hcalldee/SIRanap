<div class="modal fade" id="detail-<?= $title_slug ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Dokter</label>
                    <input type="text" class="form-control" id="nama" disabled>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="exampleInputEmail1">Telepon</label>
                        <input type="text" class="form-control" id="no_telp" disabled>
                    </div>
                    <div class="form-group col-md-7">
                        <label for="exampleInputEmail1">Spesialis</label>
                        <select class="custom-select" id="spesialis" name="spesialis" disabled>
                            <option value="">Pilih Spesialis</option>
                            <?php
                            foreach ($spesialis as $sp) { ?>
                                <option value="<?= $sp['id'] ?>">
                                    <?= $sp['nama'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="2" disabled></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>