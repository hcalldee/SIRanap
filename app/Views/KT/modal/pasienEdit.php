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
                <form action="#" id="formeditpasien">
                    <div class="row">
                        <div class="form-group col-md-5 col-5">
                            <label for="exampleInputEmail1">Nama Pasien</label>
                            <input type="text" class="form-control" id="e_nama-pasien" name="nama">
                        </div>
                        <div class="form-group col-md-4 col-4">
                            <label for="exampleInputEmail1">No MR</label>
                            <input type="text" class="form-control" id="e_no_mr" name="nomr">
                        </div>
                        <div class="form-group col-md-3 col-3">
                            <label for="example">Covid</label>
                            <select class="custom-select" id="e_status" name="status">
                                <option value="">Status</option>
                                <option value="Positif">Positif</option>
                                <option value="Negatif">Negatif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7 col-7">
                            <label for="example">Kelas</label>
                            <select class="custom-select" id="e_kategori" name="kategori">
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kategori as $k) { ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['kategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5 col-5">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="e_tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-6">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <select class="custom-select" id="e_jk" name="jk">
                                <option value="">Pilih</option>
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-3">
                            <label for="exampleInputEmail1">Tinggi Badan</label>
                            <input type="number" min="0" class="form-control" id="e_tinggi" name="tinggi" placeholder="Cm">
                        </div>
                        <div class="form-group col-md-3 col-3">
                            <label for="exampleInputEmail1">Berat Badan</label>
                            <input type="number" min="0" class="form-control" id="e_berat" name="berat" placeholder="Kg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-4">
                            <label for="exampleFormControlTextarea1">Dokter</label>
                            <select class="custom-select" id="e_dokter" name="dokter">
                                <option value="">Pilih Dokter</option>
                                <?php foreach ($dokter as $k) { ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-8 col-8">
                            <label for="exampleFormControlTextarea1">Diagnosa Medis</label>
                            <input type="text" class="form-control" id="e_diagnosa" name="diagnosa_medis">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="e_alamat" rows="2" name="alamat"></textarea>
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editpasien">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>