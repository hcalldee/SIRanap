<script>
    $('.detail-Perawat').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Perawat/getPerawat'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#nama-perawat').val(data.nama);
                $('#no_regis').val(data.no_registrasi);
                $('#no_telp').val(data.no_telp);
                $('#alamat').val(data.alamat);
                $('#ruangan').val(data.ruangan);
                if (data.status == 1) {
                    $('#status').val('Anggota Tim Covid');
                } else {
                    $('#status').val('Perawat');
                }
            }
        });
    });

    $('.edit-Perawat').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Perawat/getPerawat'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#editperawat').attr('data-id', id);
                $('#e_nama-perawat').val(data.nama);
                $('#e_no_regis').val(data.no_registrasi);
                $('#e_no_telp').val(data.no_telp);
                $('#e_alamat').val(data.alamat);
                $('#e_ruangan').val(data.id_ruangan).change;
                $('#e_status').val(data.status).change;
            }
        });
    });

    $('#editperawat').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/perawat/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditperawat").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#edit-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//' . $title) ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        })
    })

    $('#tambahperawat').on('click', function() {
        $.ajax({
            url: "<?= base_url('Admin/perawat/create'); ?>/",
            type: "POST",
            data: $("#formtambahperawat").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//' . $title) ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        })
    })

    $('.hapus-Perawat').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Perawat/getPerawat'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#hapusperawat').attr('data-id', id);
                $('#h_info').html("Anda Yakin Ingin Hapus Data " + data.nama + " ... ? ");
            }
        });
    })


    $('#hapusperawat').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Perawat/hapus'); ?>/" + id,
            dataType: "JSON",
            success: function(data) {
				info('disimpan', 'success', 'Data Berhasil Dihapus');
                window.location.href = '<?= base_url('/Admin//' . $title) ?>';
            }
        })
    })

    function info(data, info, msg) {
        if (data == 'disimpan') {
            Swal.fire({
                title: msg,
                icon: info,
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonColor: '#1cc88a',
                cancelButtonText: 'Kembali'
            })
        } else {
            Swal.fire({
                title: msg,
                icon: info,
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonColor: '#e74a3b',
                cancelButtonText: 'Kembali'
            })
        }
    }
</script>