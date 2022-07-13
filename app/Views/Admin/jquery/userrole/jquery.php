<script>
    $('.detail-Userrole').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Userrole/getAkun'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#milik').val(data.perawat);
            }
        });
    });

    $('.edit-userrole').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Userrole/getRole'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#edituserrole').attr('data-id', id + '-' + data.id_user);
                $('#e_role').val(data.role_id).change();
            }
        });
    });

    $('#edituserrole').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Userrole/edit'); ?>/" + id,
            type: "POST",
            data: $("#formeditrole").serialize(),
            dataType: "JSON",
            success: function(data) {
					info('disimpan', 'success', 'Data Disimpan');
                    window.location.href = '<?= base_url('/Admin//' . $title) ?>';
                    $('#edit-<?= $title_slug; ?>').modal('hide');
            }
        })
    })

    $('.Tambah-userrole').on('click', function() {
        items = "<option value=''>" + 'Pilih Perawat' + "</option>";
        roles = "<option value=''>" + 'Pilih Jabatan' + "</option>";
        $.ajax({
            url: "<?= base_url('Admin/Userrole/getAkun'); ?>/",
            dataType: 'json',
            success: function(data) {
                if (data != 0) {
                    $.each(data.perawat, function(index, item) {
                        items += "<option value='" + item.id + "'>" + item.nama + "</option>";
                    })
                    $('#input-role-perawat').html(items);
                    $.each(data.role, function(index, item) {
                        roles += "<option value='" + item.id + "'>" + item.nama + "</option>";
                    })
                    $('#input-jabatan-perawat').html(roles);
                }
            }
        });
    });

    $('#buatrole').on('click', function() {
        $.ajax({
            url: "<?= base_url('Admin/Userrole/create'); ?>",
            type: "POST",
            data: $("#formrole").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Userrole') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        })
    })

    $('.hapus-userrole').on('click', function() {
        id = $(this).data('id');
        $('#hapususerrole').attr('data-id', id);
    })
    $('#hapususerrole').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Userrole/hapus'); ?>/" + id,
            dataType: "JSON",
            success: function(data) {
                if (data) {
                    $('#hapus-<?= $title_slug; ?>').modal('hide');
                    info('disimpan', 'success', 'Data Berhasil Dihapus');
                    window.location.href = '<?= base_url('/Admin//' . $title) ?>';
                }
            }
        })
    })
</script>