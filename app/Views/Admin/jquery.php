<script>
    //ruangan selector
    $('#pilih_ruangan').on('change', function() {
        id = $(this).children("option:selected").data('id');
        $.ajax({
            url: "<?= base_url('Admin/User/setRuangan'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('/Admin//' . $title) ?>';
            }
        });
    });
</script>