<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2"><?= 'Daftar ' . $title; ?></h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($ruangan as $r) { ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $r['nama_ruangan'] ?></td>
                            <td><?= $r['kapasitas'] ?></td>
                            <td>
                                <button class="btn btn-info detail-pasien" data-toggle="modal" data-target="#detail-<?= $title; ?>" data-id="<?= $r['id']; ?>">Lihat</button>
                                <button class="btn btn-success">Ubah</button>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detail-<?= $title; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= 'Detail ' . $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>