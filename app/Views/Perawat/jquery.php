<script>
    $("#e_motorik").on('keyup', function() {
        cek(-1, 6, this.value, this);
    })
    $("#e_eye").on('keyup', function() {
        cek(-1, 4, this.value, this);
    })
    $("#e_verba").on('keyup', function() {
        cek(-1, 5, this.value, this);
    })

    function cek(min, max, value, dat) {
        if (dat.value <= max && dat.value > min) {
            $(dat).val(value)
        } else {
            $(dat).val(null)
        }
    }

    $('.detail-Pasien').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Perawat/Pasien/getPasien'); ?>/" + id,
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

    $('.edit-tindakan').on('click', function() {
        nama = $(this).data('name');
        id = $(this).data('id');
        $(".p_pasien").val(nama);
        $(".id").val(id);
        $.ajax({
            url: "<?= base_url('Perawat/Tindakan/getTindakan'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                // hal1
                $('#e_umur').val(data.age);
                check(data.sistolik, '#e_sistolik', "Belum Diisi");
                check(data.diastolik, '#e_diastolik', "Belum Diisi");
                check(data.jml_nafas, '#e_nafas', "Belum Diisi");
                check(data.temp, '#e_temp', "Belum Diisi");
                check(data.denyut_jantung, '#e_pulse', "Belum Diisi");
                check(data.deskripjml_nafas, '#e_deskripnafas', "Belum Diisi");
                check(data.deskriptemp, '#e_deskriptemp', "Belum Diisi");
                check(data.deskrippulse, '#e_deskrippulse', "Belum Diisi");
                check(data.keadaan_umum, '#e_ku', "Belum Diisi");
                check(data.eye, '#e_eye', 'Eye');
                check(data.verba, '#e_verba', 'Verba');
                check(data.motorik, '#e_motorik', 'Motorik');
                check(data.deskripsi, '#e_deskripsi', "Belum Diisi");
                // hal2
                check(data.subjektif, '#e_subyektif', "Belum Diisi");
                check(data.objektif, '#e_obyektif', "Belum Diisi");
                $("#e_dokter").val(data.pasien_dokter).change();
                $("#e_assessment").val(data.no_assessment).change();
                $("#e_planning").val(data.no_plan).change();
            }
        });

    });

    $('#isiTindakan').on('click', function() {
        $.ajax({
            url: "<?= base_url('Perawat/Tindakan/isiTindakan'); ?>/" + id,
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
                    window.location.href = '<?= base_url('/Perawat//Tindakan') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        })
    })


    $('.detail-tindakan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Perawat/Tindakan/getTindakan'); ?>/" + id,
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
                $('#p_dokter').val(data.tindakan_dokter).change();
                $('#p_status').val(data.status);
                $('#p_diagnosamedis').val(data.diagnosa_medis);
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
        } else if (selector == "#e_deskripnafas" ||selector == "#e_deskrippulse"||selector == "#e_deskriptemp") {
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