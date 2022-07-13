<script>
    $('#login').on('click', function() {
        var loading = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        loading += ' Memuat...';
        $('#login').html(loading);
        $.ajax({
            url: "<?= base_url('Admin/User/cekLog'); ?>",
            type: "POST",
            data: $("#form-login").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "success") {
                    info('success', 'success', 'Login Berhasil');
                    window.location.href = '<?= base_url('Login') ?>';
                } else if (data == "kosong") {
                    info('gagal', 'warning', 'Tidak Boleh Kosong');
                    $('#login').html('Login');
                } else {
                    info('gagal', 'warning', 'Data Tidak Terdaftar');
                    $('#login').html('Login');
                    $("#username").val('');
                    $("#password").val('');
                }
            }
        })
    })

    function info(data, info, msg) {
        if (data == 'success') {
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