<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No MR</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Diagnosa Medis</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($Pasien as $ps) { ?>
                            <tr>
                                <td><?= $ps['nomor_mr'] ?></td>
                                <td><?= $ps['nama'] ?></td>
                                <td><?= $ps['age'] ?></td>
                                <td><?= $ps['diagnosa_medis'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-info detail-<?= $title ?>" data-toggle="modal" data-target="#detail-<?= $title_slug ?>" data-id="<?= $ps['id']; ?>"><i class="fas fa-info-circle"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
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
                    <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Pasien</label>
                        <input type="text" class="form-control" id="nama-pasien" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">No MR</label>
                        <input type="text" class="form-control" id="no_mr" aria-describedby="emailHelp" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Status</label>
                        <input type="text" class="form-control" id="status" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jk" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">umur</label>
                        <input type="text" class="form-control" id="umur" aria-describedby="emailHelp" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Tinggi Badan</label>
                        <input type="text" class="form-control" id="tinggi" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Berat Badan</label>
                        <input type="text" class="form-control" id="berat" aria-describedby="emailHelp" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Diagnosa Medis</label>
                    <textarea class="form-control" id="diagnosa" rows="2" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="1" disabled></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>