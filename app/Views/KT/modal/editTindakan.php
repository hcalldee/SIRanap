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
                <form action="#" id="formedittindakan">
                    <div class="row">
                        <input type="text" name="id_jadwal" id="e_id_jadwal" value="" hidden>
                        <input type="text" name="id_gcs" id="e_id_gcs" value="" hidden>
                        <input type="text" name="id" id="e_id" value="" hidden>
                        <div class="form-group col-md-6">
                            <label for="example">Perawat</label>
                            <select class="custom-select" id="edit-perawat" name="shif">
                                <option value="" class="pilih-perawat">Pilih Perawat</option>
                                <?php if ($perawat != null) { ?>
                                    <?php foreach ($perawat as $p) { ?>
                                        <option class="pilih-perawat" value="<?= $p->id ?>" data-id="<?= $p->id_perawat ?>"><?= $p->perawat . ' ' . $p->keterangan ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="example">Pasien</label>
                            <select class="custom-select" id="edit-pasien" name="pasien">
                                <option>Pilih Pasien</option>
                                <?php if ($pasien != null) { ?>
                                    <?php foreach ($pasien as $p) { ?>
                                        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edittindakan">Ubah Pembagian</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>