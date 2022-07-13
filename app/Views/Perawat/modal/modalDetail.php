<div class="modal fade" id="detail-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= 'Detail ' . $title_slug; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- carousel -->
                <div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card border-0 d-block w-100">
                                <div class="row">
                                    <div class="form-group col-md-4 col-5">
                                        <label for="exampleInputEmail1">Nomor MR</label>
                                        <input type="text" class="form-control" id="p_nomr" disabled>
                                    </div>
                                    <div class="form-group col-md-8 col-7">
                                        <label for="exampleInputEmail1">Pasien</label>
                                        <input type="text" class="form-control" id="p_pasien" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3 col-3">
                                        <label for="exampleInputEmail1">TD</label>
                                        <input type="text" class="form-control" id="p_tekanandarah" disabled>
                                    </div>
                                    <div class="form-group col-md-3 col-3">
                                        <label for="exampleInputEmail1">Temperatur</label>
                                        <input type="text" class="form-control" id="p_temp" disabled>
                                    </div>
                                    <div class="form-group col-md-3 col-3">
                                        <label for="exampleInputEmail1">Nadi</label>
                                        <input type="text" class="form-control" id="p_denyutjantung" disabled>
                                    </div>
                                    <div class="form-group col-md-3 col-3">
                                        <label for="exampleInputEmail1">Respirasi</label>
                                        <input type="text" class="form-control" id="p_jumlahnafas" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">GCS</label>
                                            <ul class="list-group list-group-horizontal-sm list-group-horizontal">
                                                <li class="list-group-item" id="p_eye">E 0</li>
                                                <li class="list-group-item" id="p_verba">V 0</li>
                                                <li class="list-group-item" id="p_motorik">M 0</li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-7 col-7">
                                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                                <input type="text" class="form-control" id="p_tanggallahir" disabled>
                                            </div>
                                            <div class="form-group col-md-5 col-5">
                                                <label for="exampleInputEmail1">Laporan</label>
                                                <input type="text" class="form-control" id="p_shift" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                                        <textarea class="form-control" id="p_deskripsi" rows="4" disabled></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Keadaan Umum</label>
                                    <textarea class="form-control" id="p_KU" rows="2" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- row2 -->
                        <div class="carousel-item">
                            <div class="card border-0 d-block w-100">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subyektif</label>
                                    <textarea class="form-control" id="p_subyektif" rows="2" disabled></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Obyektif</label>
                                    <textarea class="form-control" id="p_obyektif" rows="2" disabled></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Assessment</label>
                                    <input type="text" class="form-control" id="p_assessment" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Planning</label>
                                    <input type="text" class="form-control" id="p_plan" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- row3 -->
                        <div class="carousel-item">
                            <div class="card border-0 d-block w-100">
                                <div class="row">
                                    <div class="form-group col-md-6 col-6">
                                        <label for="exampleInputEmail1">Ruangan</label>
                                        <input type="text" class="form-control" id="p_ruangan" disabled>
                                    </div>
                                    <div class="form-group col-md-6 col-6">
                                        <label for="exampleInputEmail1">Kategori</label>
                                        <input type="text" class="form-control" id="p_kategori" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 col-4">
                                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="p_jeniskelamin" disabled>
                                    </div>
                                    <div class="form-group col-md-2 col-2">
                                        <label for="exampleInputEmail1">Umur</label>
                                        <input type="text" class="form-control" id="p_umur" disabled>
                                    </div>
                                    <div class="form-group col-md-3 col-3">
                                        <label for="exampleInputEmail1">Tinggi Badan</label>
                                        <input type="text" class="form-control" id="p_tinggibadan" disabled>
                                    </div>
                                    <div class="form-group col-md-3 col-3">
                                        <label for="exampleInputEmail1">Berat Badan</label>
                                        <input type="text" class="form-control" id="p_beratbadan" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Dokter</label>
                                            <select class="custom-select" id="p_dokter" name="dokter" disabled>
                                                <option value="">Pilih Dokter</option>
                                                <?php foreach ($dokter as $d) { ?>
                                                    <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status Pasien</label>
                                            <input type="text" class="form-control" id="p_status" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Diagnosa Medis</label>
                                        <textarea class="form-control" id="p_diagnosamedis" rows="3" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mr-auto">
                            <a class="fas fa-arrow-circle-left pr-5" href="#carouselExampleIndicators" role="button" data-slide="prev"></a>
                            <br><small>sebelumya</small>
                        </div>
                        <div class="ml-auto">
                            <a class="fas fa-arrow-circle-right pl-5" href="#carouselExampleIndicators" role="button" data-slide="next"></a>
                            <br><small>selanjutnya</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>