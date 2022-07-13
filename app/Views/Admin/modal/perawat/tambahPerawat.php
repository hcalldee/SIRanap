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
                <form action="#" id="formtambahperawat">
                    <div class="row">
                        <div class="form-group col-md-8 col-8">
                            <label for="exampleInputEmail1">Perawat</label>
                            <input type="text" class="form-control" name="perawat">
                        </div>
                        <div class="form-group col-md-4 col-4">
                            <label for="exampleInputEmail1">No Registrasi</label>
                            <input type="text" class="form-control" name="no_regis">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-6">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="custom-select" name="status">
                                <option value="">Pilih Status</option>
                                <?php
                                $status = [
                                    0 => 'Perawat',
                                    1 => 'Tim Covid'
                                ];
                                for ($i = 0; $i < 2; $i++) { ?>
                                    <option value="<?= $i ?>">
                                        <?= $status[$i] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-6">
                            <label for="exampleInputEmail1">Telepon</label>
                            <input type="text" class="form-control" name="no_telp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ruangan</label>
                        <select class="custom-select" name="ruangan">
                            <option value="">Pilih Ruangan</option>
                            <?php foreach ($ruangan as $r) { ?>
                                <?php if ($r['id'] == session()->get('ruangan')) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                } ?>
                                <option <?= $selected ?> value="<?= $r['id'] ?>"><?= $r['nama_ruangan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" rows="2" name="alamat"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="tambahperawat">Tambah Data Perawat</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>