<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <div class="p-2">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="ml-auto">
                <button class="btn btn-primary Tambah-<?= $title_slug ?>" data-toggle="modal" data-target="#Tambah-<?= $title_slug; ?>">Tambah Data</button>
            </div>
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
                                    <button class="btn btn-info detail-<?= $title_slug ?>" data-toggle="modal" data-target="#detail-<?= $title_slug ?>" data-id="<?= $ps['id']; ?>"><i class="fas fa-info-circle"></i></button>
                                    <button class="btn btn-success edit-<?= $title_slug ?>" data-toggle="modal" data-target="#edit-<?= $title_slug ?>" data-id="<?= $ps['id']; ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger hapus-<?= $title_slug ?>" data-toggle="modal" data-target="#hapus-<?= $title_slug ?>" data-id="<?= $ps['id']; ?>"><i class="fas fa-trash"></i></button>
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


<?= $this->include("KT/modal/detailPasien"); ?>
<?= $this->include("KT/modal/pasienTambah"); ?>
<?= $this->include("KT/modal/pasienEdit"); ?>
<?= $this->include("KR/modal/hapusPasien"); ?>