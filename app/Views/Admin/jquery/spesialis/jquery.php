<script>
    $('.edit-spesialis').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Spesialis/getSpesialis'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#editspesialis').attr('data-id', id);
                $('#spesialis').val(data.nama);
            }
        });
    });

    $('#editspesialis').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Spesialis/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditspesialis").serialize(),
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

    $('#tambahspesialis').on('click', function() {
        $.ajax({
            url: "<?= base_url('Admin/Spesialis/create'); ?>/",
            type: "POST",
            data: $("#formtambahspesialis").serialize(),
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

    $('.hapus-spesialis').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/spesialis/getSpesialis'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#hapusspesialis').attr('data-id', id);
                $('#h_info').html("Anda Yakin Ingin Hapus Data " + data.nama + " ... ? ");
            }
        });
    })


    $('#hapusspesialis').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Spesialis/hapus'); ?>/" + id,
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