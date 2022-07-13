<script>
    //akun
    $('.detail-User').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/User/getAkun'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#perawat').val(data.perawat);
                $('#foto').val(data.image);
            }
        });
    });

    $('.Tambah-User').on('click', function() {
        $("#input-perawat").prop("disabled", true);
        $("#buatakun").prop("hidden", true);
        items = "<option>" + 'Pilih Perawat' + "</option>";
        $.ajax({
            url: "<?= base_url('Admin/User/getAkun'); ?>/",
            dataType: 'json',
            success: function(data) {
                if (data != 0) {
                    $("#input-perawat").prop("disabled", false);
                    $("#buatakun").prop("hidden", false);
                    $.each(data, function(index, item) {
                        items += "<option value='" + item.no_registrasi + "'>" + item.nama + "</option>";
                    })
                    $('#input-perawat').html(items);
                } else {
                    $('#pilih-perawat').html('Semua Perawat Telah Memiliki Akun');
                }
            }
        });
    });

    $('#buatakun').on('click', function() {
        $.ajax({
            url: "<?= base_url('Admin/User/create'); ?>",
            type: "POST",
            data: $("#formakun").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data != 'gagal') {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url("/Admin//User") ?>';
                    info('disimpan', 'success', "data disimpan");
                } else {
                    info(data, 'warning', "gagal menyimpan data");
                }
            }
        })
    })
    $('.reset-User').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/User/getAkun'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#resetakun').attr('data-id', id);
                $('#usr').val(data.username);
                $('#r_info').html("Anda Yakin Ingin Reset Akun Milik " + data.perawat + " ... ? ");
            }
        });
    })

    $('#resetakun').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/User/reset'); ?>/" + id,
            type: "POST",
            data: $("#formresetakun").serialize(),
            dataType: "JSON",
            success: function(data) {
				info('disimpan', 'success', "Akun Berhasil Direset");
                window.location.href = '<?= base_url("/Admin//User") ?>';
            }
        })
    })

    $('.hapus-User').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/User/getAkun'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#hapusakun').attr('data-id', id);
                $('#h_info').html("Anda Yakin Ingin Hapus Akun Milik " + data.perawat + " ... ? ");
            }
        });
    })


    $('#hapusakun').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/User/hapus'); ?>/" + id,
            dataType: "JSON",
            success: function(data) {
				info('disimpan', 'success', "Akun Berhasil Dihapus");
                window.location.href = "<?= base_url('/Admin//User') ?>";
            }
        })
    })
</script>