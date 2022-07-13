<script>
    $('.detail-Pasien').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Pasien/getPasien'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#nama-pasien').val(data.nama);
                $('#no_mr').val(data.nomor_mr);
                $('#jk').val(data.jenis_kelamin);
                $('#umur').val(data.age);
                $('#tinggi').val(data.tinggi_badan + ' Cm');
                $('#berat').val(data.berat_badan + ' Kg');
                $('#diagnosa').val(data.diagnosa_medis);
                $('#alamat').val(data.alamat);
                if (data.id_ruangan) {
                    $('#ruangan').val(data.ruangan);
                } else {
                    $('#ruangan').val("Tidak Ada Ruangan");
                }

                if (data.status == 'Negatif' || data.status == 'negatif') {
                    $('#status').val('Bukan Pasien Covid');
                } else {
                    $('#status').val('Pasien Covid');
                }
            }
        });
    });
</script>