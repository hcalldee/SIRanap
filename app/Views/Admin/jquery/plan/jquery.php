<script>
    $('.edit-Planning').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Plan/getPlan'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#plan').val(data.planning);
                $('#editplan').attr('data-id', id);
            }
        });
    });

    $('#editplan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Plan/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditplan").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#edit-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Plan')  ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('#tambahplan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Plan/create'); ?>/",
            type: "POST",
            data: $("#formtambahplan").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Plan')  ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });
    $('.hapus-Planning').on('click', function() {
        $("#hapusplan").attr('data-id', $(this).data('id'));
    });
    $('#hapusplan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Plan/hapus'); ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data == "berhasil") {
                    $('#hapus-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Plan') ?>';
                    info('disimpan', 'success', 'Data Berhasil Dihapus');
                } else {
                    info(data, 'warning', 'Data Gagal Dihapus');
                }
            }
        });
    });
</script>