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

    $('.Tambah-userrole').on('click', function() {
        items = "<option>" + 'Pilih Perawat' + "</option>";
        roles = "<option>" + 'Pilih Jabatan' + "</option>";
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
                if (data != "data sudah ada") {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    location.reload();
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    Swal.fire({
                        title: 'Data Sudah Ada',
                        icon: 'warning',
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonColor: '#e74a3b',
                        cancelButtonText: 'Batal'
                    })
                }
            }
        })
    })

    $('.hapus-userrole').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Userrole/hapus'); ?>/" + id,
            dataType: "JSON",
            success: function(data) {
                location.reload();
            }
        })
    })
</script>