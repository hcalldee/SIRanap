<script>
    $('.detail-Tindakan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Tindakan/getTindakan'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                // hal1
                $('#t_nomr').val(data.nomor_mr);
                $('#t_pasien').val(data.pasien);
                $('#t_tanggallahir').val(data.tanggal_lahir);
                $('#t_shift').val(data.shif);
                $('#t_umur').val(data.age);
                $('#t_temp').val(data.temp);
                $('#t_tekanandarah').val(data.tekanan_darah);
                $('#t_denyutjantung').val(data.denyut_jantung);
                $('#t_eye').html('E ' + data.eye);
                $('#t_verba').html('V ' + data.verba);
                $('#t_motorik').html('M ' + data.motorik);
                $('#t_deskripsi').val(data.deskripsi);
                // hal2
                $('#t_subyektif').val(data.subjektif);
                $('#t_obyektif').val(data.objektif);
                $('#t_assessment').val(data.assessment);
                $('#t_plan').val(data.planning);
                //hal3
                $('#t_ruangan').val(data.ruangan);
                $('#t_kategori').val(data.kategori);
                $('#t_jeniskelamin').val(data.jenis_kelamin);
                $('#t_tinggibadan').val(data.tinggi_badan);
                $('#t_beratbadan').val(data.berat_badan);
                $('#t_dokter').val(data.dokter);
                $('#t_status').val(data.status);
                $('#t_diagnosamedis').val(data.diagnosa_medis);
            }
        });
    });
</script>