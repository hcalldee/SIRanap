<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title . ' Ruangan ' . $ruangan; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Registrasi</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($Perawat as $pr) {
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $pr['no_registrasi'] ?></td>
                                <td><?= $pr['nama'] ?></td>
                                <td><?= $pr['no_telp'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-info detail-perawat" data-toggle="modal" data-target="#detail-perawat" data-id="<?= $pr['id']; ?>"><i class="fas fa-info-circle"></i></button>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->include('KR/modal/detailPerawat'); ?>