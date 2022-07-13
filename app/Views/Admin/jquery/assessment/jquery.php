<script>
    $('.edit-Assessment').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Assessment/getAssessment'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#assessment').val(data.assessment);
                $('#editassessment').attr('data-id', id);
            }
        });
    });

    $('#editassessment').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Assessment/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditassessment").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#edit-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//' . $title)  ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('#tambahassessment').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Assessment/create'); ?>/",
            type: "POST",
            data: $("#formtambahassessment").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//' . $title)  ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });
    $('.hapus-Assessment').on('click', function() {
        $("#hapusassessment").attr('data-id', $(this).data('id'));
    });
    $('#hapusassessment').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Assessment/hapus'); ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data == "berhasil") {
                    $('#hapus-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//' . $title) ?>';
                    info('disimpan', 'success', 'Data Berhasil Dihapus');
                } else {
                    info(data, 'warning', 'Data Gagal Dihapus');
                }
            }
        });
    });
</script>