<div class="modal fade" id="hapus-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= 'Hapus ' . $title_slug; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Yakin Menghapus Pembagian Pasien...?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="hapustindakan">Ya</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
        </div>
    </div>
</div>