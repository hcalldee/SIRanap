<div class="modal fade" id="detail-<?= $title_slug ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="exampleInputEmail1">Pasien</label>
                        <input type="text" class="form-control" id="nama-pasien" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">No MR</label>
                        <input type="text" class="form-control" id="no_mr" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Status</label>
                        <input type="text" class="form-control" id="status" aria-describedby="emailHelp" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jk" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">umur</label>
                        <input type="text" class="form-control" id="umur" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Tanggal Masuk</label>
                        <input type="text" class="form-control" id="tgl_masuk" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1"><small>Di Rawat</small></label>
                        <input type="text" class="form-control" id="hari_rawat" aria-describedby="emailHelp" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 col-4">
                        <label for="example">Ruangan</label>
                        <select class="custom-select ruangan" id="d_ruang" name="ruangan" disabled>
                            <option class="pilih-ruang" value="">Pilih Ruangan</option>
                            <?php foreach ($ruangan as $r) { ?>
                                <option class="pilih-ruang" value="<?= $r['id'] ?>" data-id="<?= $r['id']; ?>"><?= $r['nama_ruangan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-4">
                        <label for="example">Kelas</label>
                        <select class="custom-select kategori" id="d_kategori" name="kategori" disabled>
                            <option class="pilih-kategori" value="">Pilih Kelas</option>
                            <?php foreach ($kategori as $k) { ?>
                                <option class="pilih-kategori" value="<?= $k['id'] ?>" data-id="<?= $k['id']; ?>"><?= $k['ruangan'] . ' ' . $k['kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">TB</label>
                        <input type="text" class="form-control" id="tinggi" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">BB</label>
                        <input type="text" class="form-control" id="berat" aria-describedby="emailHelp" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlTextarea1">Dokter</label>
                        <select class="custom-select" id="dokter" name="dokter" disabled>
                            <option value="">Pilih Dokter</option>
                            <?php foreach ($dokter as $k) { ?>
                                <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="exampleFormControlTextarea1">Diagnosa Medis</label>
                        <input type="text" class="form-control" id="diagnosa" disabled>
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