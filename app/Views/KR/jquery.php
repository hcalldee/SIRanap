<script>
    $('.detail-tindakan').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Tindakan/getTindakan'); ?>/" + id,
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

    $('#tambahkategori').on('click', function() {
        $.ajax({
            url: "<?= base_url('KR/Kategori/create'); ?>",
            type: "POST",
            data: $("#formtambahkategori").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "max") {
                    info(data, 'warning', 'Melebihi Kapasitas Ruangan');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/KR//Kategori') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('.edit-kategori').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Kategori/getKategori'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#editkategori').attr('data-id', id);
                $('#e_id_ruangan').val(data.id_ruangan);
                $('#e_kategori').val(data.kategori);
                $('#e_jml_bed').val(data.jml_bed).change();
            }
        });
    });

    $('#editkategori').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/kategori/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditkategori").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "max") {
                    info(data, 'warning', 'Melebihi Kapasita Ruangan');
                } else {
                    $('#edit-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/KR//Kategori') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('.hapus-kategori').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Kategori/getKategori'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $("#hapuskategori").attr('data-id', id);
                $("#infokategori").html('Yakin Menghapus Kelas ' + data.kategori + ' diruangan Ini...?');
            }
        })
    });

    $('#hapuskategori').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Kategori/hapus'); ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data == "berhasil") {
                    $('#hapus-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/KR//Kategori') ?>';
                    info('disimpan', 'success', 'Data Berhasil Dihapus');
                } else {
                    info(data, 'warning', 'Data Gagal Dihapus');
                }
            }
        });
    });

    $('#tambahpasien').on('click', function() {
        $.ajax({
            url: "<?= base_url('KR/Pasien/create'); ?>",
            type: "POST",
            data: $("#formtambahpasien").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else if (data == "max") {
                    info(data, 'warning', 'Kapasitas Kelas Penuh');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/KR//Pasien') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('.detail-Pasien').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Pasien/getPasien'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#nama-pasien').val(data.nama);
                $('#no_mr').val(data.nomor_mr);
                $('#jk').val(data.jenis_kelamin);
                $('#umur').val(data.age);
                $('#tinggi').val(data.tinggi_badan);
                $('#berat').val(data.berat_badan);
                $('#diagnosa').val(data.diagnosa_medis);
                $('#kategori').val(data.id_kategori).change();
                $('#dokter').val(data.id_dokter).change();
                $('#alamat').val(data.alamat);
                $('#status').val(data.status);
                $('#tgl_masuk').val(data.tgl_masuk);
                $('#hari_rawat').val(data.hari_rawat += 1);
            }
        });
    });

    $('#editpasien').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Pasien/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditpasien").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else if (data == "max") {
                    info(data, 'warning', 'Kapasitas Kelas Penuh');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/KR//Pasien') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('.edit-Pasien').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Pasien/getPasien'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#editpasien').attr('data-id', id);
                $('#e_nama-pasien').val(data.nama);
                $('#e_tanggal_lahir').val(data.tanggal_lahir);
                $('#e_no_mr').val(data.nomor_mr);
                $('#e_jk').val(data.jenis_kelamin);
                $('#e_tinggi').val(data.tinggi_badan);
                $('#e_berat').val(data.berat_badan);
                $('#e_diagnosa').val(data.diagnosa_medis);
                $('#e_alamat').val(data.alamat);
                $('#e_status').val(data.status).change();
                $('#e_kategori').val(data.id_kategori).change();
                $('#e_dokter').val(data.id_dokter).change();
            }
        });
    });


    $('.hapus-Pasien').on('click', function() {
        $("#hapuspasien").attr('data-id', id = $(this).data('id'));
    });

    $('#hapuspasien').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Pasien/hapus'); ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data == "berhasil") {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/KR//Pasien') ?>';
                    info('disimpan', 'success', 'Data Berhasil Dihapus');
                } else {
                    info(data, 'warning', 'Data Gagal Dihapus');
                }
            }
        });
    });

    $('.edit-ketuatim').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/KetuaTim/getAkun'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#input-role-perawat').val(data.id).change();
                $('#editketua').attr('data-id', id);
                $('#usr').val(data.username);
            }
        });
    });

    $('#editketua').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/KetuaTim/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditrole").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/KR//KetuaTim') ?>';
                    info('disimpan', 'success', 'Data Diubah');
                }
            }
        });
    });


    $('.edit-shift').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Shift/getshift'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $("#editShift").attr('data-id', id);
                $("#e_tgl").val(data.tanggal);
                $("#e_perawat").val(data.id_perawat).change();
                $("#e_jaga").val(data.keterangan).change();
            }
        });
    });

    $('#editShift').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Shift/create'); ?>/" + id,
            type: "POST",
            data: $("#formeditshif").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'warning', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/KR//Shift') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });
    $('#tambahShift').on('click', function() {
        $.ajax({
            url: "<?= base_url('KR/Shift/create'); ?>",
            type: "POST",
            data: $("#formtambahshift").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong')
                } else if (data == "ada") {
                    info(data, 'success', 'Data Sudah Ada');
                } else {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/KR//Shift') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('.hapus-shift').on('click', function() {
        id = $(this).data('id');
		 $("#hapusshift").attr('data-id', id);
    })

    $('#hapusshift').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Shift/hapus'); ?>/" + id,
            dataType: "JSON",
            success: function(data) {
                window.location.href = '<?= base_url('/KR//Shift') ?>';
				info('disimpan', 'success', 'Data Berhasil Dihapus');
            }
        })
    });

    $('.detail-perawat').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('KR/Perawat/getPerawat'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#nama-perawat').val(data.nama);
                $('#no_regis').val(data.no_registrasi);
                $('#no_telp').val(data.no_telp);
                $('#alamat').val(data.alamat);
                $('#ruangan').val(data.ruangan);
                if (data.status == 1) {
                    $('#status').val('Anggota Tim Covid');
                } else {
                    $('#status').val('Perawat');
                }
            }
        });
    });

    function info(data, info, msg) {
        if (data == 'disimpan') {
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

    function info(data, info, msg) {
        if (data == 'disimpan') {
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