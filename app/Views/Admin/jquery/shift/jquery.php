<script>
    $('.edit-shift').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Shift/getshift'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $("#editShift").attr('data-id', id);
                $("#e_tgl").val(data.tanggal);
                $("#e_perawat").val(data.id_perawat).change();
                $("#e_jaga").val(data.keterangan).change();
            }
        });
    });

    $('#editShift').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Shift/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditshif").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Shift') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('#tambahShift').on('click', function() {
        $.ajax({
            url: "<?= base_url('Admin/Shift/create'); ?>",
            type: "POST",
            data: $("#formtambahshift").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Shift') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $(".hapus-shift").on('click', function() {
        $('#hapusshift').attr('data-id', $(this).data('id'));
    })
    $('#hapusshift').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Shift/hapus'); ?>/" + id,
            dataType: "JSON",
            success: function(data) {
                info('disimpan', 'success', 'Data Dihapus');
                window.location.href = '<?= base_url('/Admin//Shift') ?>';
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