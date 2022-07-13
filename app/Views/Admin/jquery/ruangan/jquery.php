<script>
    $('.detail-Ruangan').on('click', function() {
        id = $(this).data('id');
        var student = '';
        $.ajax({
            url: "<?= base_url('Admin/Ruangan/getRuanganKategori'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                console.log();
                var i = 1;
                if (data['length'] > 0) {
                    $.each(data, function(index, item) {
                        student += '<tr>';
                        student += '<td class="sorting_1">' + i + '</td>';
                        student += '<td>' + item.kategori + '</td>';
                        student += '<td>' + item.jml_bed + '</td>';
                        student += '</tr>';
                        i++;
                    });
                } else {
                    student += '<td colspan="3" class="dataTables_empty" valign="top">No data available in table</td>';
                }
                $('#dataModal tbody').html(student);

            }
        });
    });
    $('.edit-Ruangan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Ruangan/getRuangan'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#e_nama-ruangan').val(data.nama_ruangan);
                $('#e_kapasitas').val(data.kapasitas).change();
                $('#editruangan').attr('data-id', id);
            }
        });
    });

    $('#editruangan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Ruangan/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditruangan").serialize(),
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
    $('#tambahruangan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Ruangan/create'); ?>/",
            type: "POST",
            data: $("#formtambahruangan").serialize(),
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
    $('.hapus-Ruangan').on('click', function() {
        $("#hapusruangan").attr('data-id', $(this).data('id'));
    });
    $('#hapusruangan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/ruangan/hapus'); ?>/" + id,
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