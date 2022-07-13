<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ],
        });
    });

	$("#kalender_perawat").on('click', function() {
        $.ajax({
            url: "<?= base_url('Perawat/Kalender/check'); ?>",
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Belum Ada Jadwal Jaga');
                } else if(data == "ada") {
                    window.location.href = '<?= base_url('Perawat/Kalender') ?>';
                }
            }
        });
    });
	
	$("#kalender_KR").on('click', function() {
        $.ajax({
            url: "<?= base_url('KR/Kalender/check'); ?>",
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Belum Ada Jadwal Jaga');
                } else if(data == "ada") {
                    window.location.href = '<?= base_url('KR/Kalender') ?>';
                }
            }
        });
    });
	
	$("#kalender_KT").on('click', function() {
        $.ajax({
            url: "<?= base_url('KT/Kalender/check'); ?>",
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Belum Ada Jadwal Jaga');
                } else if(data == "ada") {
                    window.location.href = '<?= base_url('KT/Kalender') ?>';
                }
            }
        });
    });
	
	
    $("#gantipassword").on('click', function() {
        $.ajax({
            url: "<?= base_url('Admin/User/change'); ?>",
            type: "POST",
            data: $("#formgantipassword").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Data Tidak Boleh Kosong');
                } else if (data == 'fail') {
                    $('#user-<?= $title_slug; ?>').modal('hide');
                    $('#pwlam').val('');
                    $('#pwbar').val('');
                    $('#conpwbar').val('');
                    info(data, 'warning', 'Gagal Mengganti Password');
                } else {
                    $('#user-<?= $title_slug; ?>').modal('hide');
                    window.location.href = '<?= base_url('Login') ?>';
                    info('disimpan', 'success', 'Password Berhasil Diganti');
                }
            }
        });
    })

    $("#tanggalreport").on('change', function() {
        if ($(this).val() != "") {
            $("#reportharian").prop('disabled', false);
        } else {
            $("#reportharian").prop('disabled', true);
        }
    });

    $("#bulanreport").on('change', function() {
        if ($(this).val() != "") {
            $("#reportbulan").prop('disabled', false);
        } else {
            $("#reportbulan").prop('disabled', true);
        }
    });

    $("#tanggalreportKR").on('change', function() {
        if ($(this).val() != "") {
            $("#reportharianKR").prop('disabled', false);
        } else {
            $("#reportharianKR").prop('disabled', true);
        }
    });

    $("#bulanreportKR").on('change', function() {
        if ($(this).val() != "") {
            $("#reportbulanKR").prop('disabled', false);
        } else {
            $("#reportbulanKR").prop('disabled', true);
        }
    });

    $("#reportharian").on('click', function() {
        $.ajax({
            url: "<?= base_url('Perawat/Tindakan/ReportHarian'); ?>",
            type: "POST",
            data: $("#formreportharian").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Tidak Ada Laporan');
                } else {
                    $("#tanggalreport").val('');
                    window.location.href = '<?= base_url('Perawat/Tindakan/Printharian') ?>/' + data;
                }
            }
        });
    })

    $("#reportharianKR").on('click', function() {
        $.ajax({
            url: "<?= base_url('KR/Tindakan/ReportHarian'); ?>",
            type: "POST",
            data: $("#formreportharianKR").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Tidak Ada Laporan');
                } else {
                    $("#tanggalreportKR").val('');
                    window.location.href = '<?= base_url('KR/Tindakan/Printharian') ?>/' + data;
                }
            }
        });
    })

    $("#reportbulan").on('click', function() {
        $.ajax({
            url: "<?= base_url('Perawat/Tindakan/ReportBulanan'); ?>",
            type: "POST",
            data: $("#formreportbulan").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Tidak Ada Laporan');
                } else {
                    $("#bulanreport").val('');
                    window.location.href = '<?= base_url('Perawat/Tindakan/Printbulanan') ?>/' + data;
                }
            }
        });
    })

    $("#reportbulanKR").on('click', function() {
        $.ajax({
            url: "<?= base_url('KR/Tindakan/ReportBulanan'); ?>",
            type: "POST",
            data: $("#formreportbulanKR").serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data == "kosong") {
                    info(data, 'warning', 'Tidak Ada Laporan');
                } else {
                    $("#bulanreportKR").val('');
                    window.location.href = '<?= base_url('KR/Tindakan/Printbulanan') ?>/' + data;
                }
            }
        });
    })

    $(".close").on('click', function() {
        $("#tanggalreport").val('');
        $("#bulanreport").val('');
        $("#reportharian").prop('disabled', true);
        $("#reportbulanan").prop('disabled', true);
    });

    $(document).ready(function() {
        $('.dataModal').DataTable({
            "length": false,
            "filter": false,
            "ordering": false,
            "info": false,
            "paging": false
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