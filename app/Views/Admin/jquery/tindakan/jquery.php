<script>
    $('.edit-tindakan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Tindakan/getTindakan'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#e_id_gcs').val(data.id_gcs);
                $('#e_id_jadwal').val(data.id_jadwal);
                $('#e_id').val(data.id_perawat);
                $('#edittindakan').attr('data-id', id);
                $('#edit-perawat').val(data.id_shif).change();
                $('#edit-pasien').val(data.id_pasien).change();
            }
        });
    });

    $('#edittindakan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/tindakan/create'); ?>/" + id,
            type: "POST",
            data: $("#formedittindakan").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Tindakan') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('.edit-shift').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Shift/getshift'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $("#e_id").val(id);
                $("#e_tgl").val(data.tanggal);
                $("#e_perawat").val(data.id_perawat).change();
                $("#e_jaga").val(data.keterangan).change();
            }
        });
    });

    $('#input-perawat').on('change', function() {
        id = $(this).children("option:selected").data('id');
        if (id != null) {
            $('#id').val(id);
        } else {
            $('#id').val('');
        }
    })

    $('.detail-tindakan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Tindakan/getTindakan'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                // hal1
                $('#p_nomr').val(data.nomor_mr);
                $('#p_pasien').val(data.pasien);
                $('#p_tanggallahir').val(data.tanggal_lahir);
                $('#p_shift').val(data.shif);
                $('#p_umur').val(data.age);
                check(data.temp, '#p_temp', "Belum Diisi");
                check(data.keadaan_umum, '#p_KU', "Belum Diisi");
                check(data.jml_nafas, '#p_jumlahnafas', "Belum Diisi");
                check(data.tekanan_darah, '#p_tekanandarah', "Belum Diisi");
                check(data.denyut_jantung, '#p_denyutjantung', "Belum Diisi");
                check(data.eye, '#p_eye', "Eye");
                check(data.verba, '#p_verba', "Verba");
                check(data.motorik, '#p_motorik', "Motorik");
                var deskrip = '';
                if (data.deskripjml_nafas != null && data.deskriptemp != null && data.deskrippulse != null && data.deskripsi != null) {
                    deskrip = "Respirasi(" + data.deskripjml_nafas + ")\nTemperatur(" + data.deskriptemp + ")\nDenyut Nadi(" + data.deskrippulse + ")\n";
                    deskrip += data.deskripsi;
                } else {
                    deskrip = null;
                }
                check(deskrip, '#p_deskripsi', "Belum Diisi");
                // hal2
                check(data.subjektif, '#p_subyektif', "Belum Diisi");
                check(data.objektif, '#p_obyektif', "Belum Diisi");
                check(data.assessment, '#p_assessment', "Belum Diisi");
                check(data.planning, '#p_plan', "Belum Diisi");
                //hal3
                $('#p_ruangan').val(data.ruangan);
                $('#p_kategori').val(data.kategori);
                $('#p_jeniskelamin').val(data.jenis_kelamin);
                $('#p_tinggibadan').val(data.tinggi_badan);
                $('#p_beratbadan').val(data.berat_badan);
                $('#p_dokter').val(data.pasien_dokter).change();
                $('#p_status').val(data.status);
                $('#p_diagnosamedis').val(data.diagnosa_medis);
            }
        });
    });

    $('#buattindakan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Tindakan/create'); ?>",
            type: "POST",
            data: $("#formtindakan").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Tindakan') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });
	
	$('.hapus-tindakan').on('click', function() {
        $("#hapustindakan").attr('data-id', id = $(this).data('id'));
    });

    $('#hapustindakan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Tindakan/hapus'); ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data == "berhasil") {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Tindakan') ?>';
                    info('disimpan', 'success', 'Data Berhasil Dihapus');
                } else {
                    info(data, 'warning', 'Data Gagal Dihapus');
                }
            }
        });
    });

    function check(data, selector, info) {
        if (selector == "#p_eye") {
            if (data == null) {
                $(selector).html(info);
            } else {
                $(selector).html("E " + data);
            }
        } else if (selector == "#p_motorik") {
            if (data == null) {
                $(selector).html(info);
            } else {
                $(selector).html("M " + data);
            }
        } else if (selector == "#e_ku") {
            if (data == null) {
                $(selector).attr('placeholder', info);
            } else {
                $(selector).html(data);
            }
        } else if (selector == "#e_deskripsi") {
            if (data == null) {
                $(selector).attr('placeholder', info);
            } else {
                $(selector).html(data);
            }
        } else if (selector == "#e_subyektif") {
            if (data == null) {
                $(selector).attr('placeholder', info);
            } else {
                $(selector).html(data);
            }
        } else if (selector == "#e_obyektif") {
            if (data == null) {
                $(selector).attr('placeholder', info);
            } else {
                $(selector).html(data);
            }
        } else if (selector == "#p_verba") {
            if (data == null) {
                $(selector).html(info);
            } else {
                $(selector).html("V " + data);
            }
        } else if (selector == "#e_verba" || selector == "#e_eye" || selector == "#e_motorik") {
            if (data == null) {
                $(selector).attr('placeholder', info);
            } else {
                $(selector).val(data);
            }
        } else if (selector == "#e_verba") {
            if (data == null) {
                $(selector).attr('placeholder', info);
            } else {
                $(selector).val(data);
            }
        } else {
            if (data == null) {
                $(selector).val(info);
            } else {
                $(selector).val(data);
            }
        }
    }
</script>