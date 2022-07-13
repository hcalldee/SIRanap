<script>
    $('.detail-Role').on('click', function() {
        id = $(this).data('send');
        $.ajax({
            url: "<?= base_url('Admin/Role/getAkun'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#milik').val(data.perawat);
            }
        });
    });

    $('.Tambah-Role').on('click', function() {
        $("#input-role-perawat").prop("disabled", true);
        $("#buatakun").prop("hidden", true);
        items = "<option>" + 'Pilih Perawat' + "</option>";
        $.ajax({
            url: "<?= base_url('Admin/Role/getAkun'); ?>/",
            dataType: 'json',
            success: function(data) {
                if (data != 0) {
                    $("#input-role-perawat").prop("disabled", false);
                    $("#buatakun").prop("hidden", false);
                    $.each(data, function(index, item) {
                        items += "<option value='" + item.no_registrasi + "'>" + item.nama + "</option>";
                    })
                    $('#input-role-perawat').html(items);
                } else {
                    $('#pilih-perawat').html('Semua Perawat Telah Memiliki Akun');
                }
            }
        });
    });
</script>