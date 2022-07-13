<script>
    $('.detail-Dokter').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Dokter/getDokter'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#no_telp').val(data.no_telp);
                $('#alamat').val(data.alamat);
                $('#spesialis').val(data.id_spesialis).change;
            }
        });
    });

    $('.edit-Dokter').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Dokter/getDokter'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#editdokter').attr('data-id', id);
                $('#e_nama').val(data.nama);
                $('#e_no_telp').val(data.no_telp);
                $('#e_alamat').val(data.alamat);
                $('#e_spesialis').val(data.id_spesialis).change;
            }
        });
    });

    $('#editdokter').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Dokter/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditdokter").serialize(),
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

    $('#tambahdokter').on('click', function() {
        $.ajax({
            url: "<?= base_url('Admin/dokter/create'); ?>/",
            type: "POST",
            data: $("#formtambahdokter").serialize(),
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

    $('.hapus-Dokter').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/dokter/getDokter'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#hapusdokter').attr('data-id', id);
                $('#h_info').html("Anda Yakin Ingin Hapus Data " + data.nama + " ... ? ");
            }
        });
    })


    $('#hapusdokter').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Dokter/hapus'); ?>/" + id,
            dataType: "JSON",
            success: function(data) {
                $('#hapus-<?= $title_slug; ?>').modal('hide');
                window.location.href = '<?= base_url('/Admin//' . $title) ?>';
                info('disimpan', 'success', 'Data Dihapus');
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