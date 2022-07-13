<script>
    $('#e_kategori').on('change', function() {
        id = $(this).children("option:selected").data('id');
        $.ajax({
            url: "<?= base_url('Admin/kategori/getkategori'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#e_ruang').val(data.id_ruangan);
            }
        });
    });
    $('.Tambah-Pasien').on('click', function() {
        if ($('#i_pilih-ruang').val() != "") {
            var items = "<option value=''>Pilih Kelas</option>";
            id = $('#i_pilih-ruang').children("option:selected").data('id');
            if (id != "") {
                $.ajax({
                    url: "<?= base_url('Admin/ruangan/getRuanganKategori'); ?>/" + id,
                    dataType: 'json',
                    success: function(data) {
                        $('.kategori').attr('disabled', false);
                        $.each(data, function(index, item) {
                            items += "<option value='" + item.id + "'>" + item.kategori + "</option>";
                        });
                        $('.kategori').html(items);
                    }
                });
            }
        } else {
            $('.kategori').attr('disabled', true);
        }
    })

    $('.edit-Pasien').on('click', function() {
        $('.kategori').attr('disabled', true);
    })

    $('#i_pilih-ruang').on('change', function() {
        var items = "<option value=''>Pilih Kelas</option>";
        id = $(this).children("option:selected").data('id');
        if (id != "") {
            $.ajax({
                url: "<?= base_url('Admin/ruangan/getRuanganKategori'); ?>/" + id,
                dataType: 'json',
                success: function(data) {
                    $('.kategori').attr('disabled', false);
                    $.each(data, function(index, item) {
                        items += "<option value='" + item.id + "'>" + item.kategori + "</option>";
                    });
                    $('.kategori').html(items);
                }
            });
        } else {
            $('.kategori').attr('disabled', true);
        }
    })

    $('#e_ruang').on('change', function() {
        var items = "<option value=''>Pilih Kelas</option>";
        id = $(this).children("option:selected").data('id');
        if (id != "") {
            $.ajax({
                url: "<?= base_url('Admin/ruangan/getRuanganKategori'); ?>/" + id,
                dataType: 'json',
                success: function(data) {
                    $('.kategori').attr('disabled', false);
                    $.each(data, function(index, item) {
                        items += "<option value='" + item.id + "'>" + item.kategori + "</option>";
                    });
                    $('.kategori').html(items);
                }
            });
        } else {
            $('.kategori').attr('disabled', true);
        }
    })


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
                $('#tinggi').val(data.tinggi_badan);
                $('#berat').val(data.berat_badan);
                $('#diagnosa').val(data.diagnosa_medis);
                $('#d_kategori').val(data.id_kategori).change();
                $('#d_ruang').val(data.id_ruangan).change();
                $('#dokter').val(data.id_dokter).change();
                $('#alamat').val(data.alamat);
                $('#status').val(data.status);
                $('#tgl_masuk').val(data.tgl_masuk);
                $('#hari_rawat').val(data.hari_rawat = +1);
            }
        });
    });

    $('#tambahpasien').on('click', function() {
        $.ajax({
            url: "<?= base_url('Admin/Pasien/create'); ?>",
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
                    window.location.href = '<?= base_url('/Admin//Pasien') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('#editpasien').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Pasien/create'); ?>/" + id,
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
                    window.location.href = '<?= base_url('/Admin//Pasien') ?>';
                    info('disimpan', 'success', 'Data Disimpan');
                }
            }
        });
    });

    $('.edit-Pasien').on('click', function() {
        id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Admin/Pasien/getPasien'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                $('#editpasien').attr('data-id', id);
                $('#e_nama-pasien').val(data.nama);
                $('#e_tanggal_lahir').val(data.tanggal_lahir);
                $('#e_no_mr').val(data.nomor_mr);
                $('#e_jk').val(data.jenis_kelamin);
                if (data.id_ruangan) {
                    $('.kategori').attr('disabled', false);
                } else {
                    $('.kategori').attr('disabled', true);
                }
                $('#e_ruang').val(data.id_ruangan);
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
            url: "<?= base_url('Admin/Pasien/hapus'); ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data == "berhasil") {
                    $('#Tambah-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('/Admin//Pasien') ?>';
                    info('disimpan', 'success', 'Data Berhasil Dihapus');
                } else {
                    info(data, 'warning', 'Data Gagal Dihapus');
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
</script>