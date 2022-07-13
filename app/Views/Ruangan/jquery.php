<script>
    $('.detail-Ruangan').on('click', function() {
        id = $(this).data('id');
        var student = '';
        $.ajax({
            url: "<?= base_url('Admin/Ruangan/getRuanganKategori'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                console.log();
                var i = 1;
                if (data['length'] > 0) {
                    $.each(data, function(index, item) {
                        student += '<tr>';
                        student += '<td class="sorting_1">' + i + '</td>';
                        student += '<td>' + item.kategori + '</td>';
                        student += '<td>' + item.jml_bed + '</td>';
                        student += '</tr>';
                        i++;
                    });
                } else {
                    student += '<td colspan="3" class="dataTables_empty" valign="top">No data available in table</td>';
                }
                $('#dataModal tbody').html(student);

            }
        });
    });
</script>