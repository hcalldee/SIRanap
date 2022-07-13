<script>
    $('.edit-kategori').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Kategori/getkategori'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#editkategori').attr('data-id', id);
                $('#e_kategori').val(data.kategori);
                $('#e_ruang').val(data.id_ruangan);
                $('#e_jml_bed').val(data.jml_bed);
            }
        });
    });

    $('#editkategori').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Kategori/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditkategori").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else if (data == "max") {
                    info(data, 'warning', 'Kapasitas Ruangan Tidak Mencukupi');
                } else {
                    $('#edit-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Kategori')  ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('#tambahkategori').on('click', function() {
        $.ajax({
            url: "<?= base_url('Admin/Kategori/create'); ?>/",
            type: "POST",
            data: $("#formtambahkategori").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else if (data == "max") {
                    info(data, 'warning', 'Kapasitas Ruangan Tidak Mencukupi');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Kategori')  ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });
    $('.hapus-kategori').on('click', function() {
        $("#hapuskategori").attr('data-id', $(this).data('id'));
    });
    $('#hapuskategori').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Kategori/hapus'); ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data == "berhasil") {
                    $('#hapus-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Kategori') ?>';
                    info('disimpan', 'success', 'Data Berhasil Dihapus');
                } else {
                    info(data, 'warning', 'Data Gagal Dihapus');
                }
            }
        });
    });
</script>