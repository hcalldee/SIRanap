<script>
    $(document).ready(function() {
        $('#dataLanding').DataTable({
            "length": false,
            "filter": false,
            "ordering": false,
            "info": false,
            "paging": false
        });
    });

    $('.ruangan').on('click', function() {
        id = $(this).data('id');
        var student = '';
        $.ajax({
            url: "<?= base_url('Home/getRuanganKategori'); ?>/" + id,
            dataType: 'json',
            success: function(data) {
                var i = 1;
                if (data['length'] > 0) {
                    $.each(data, function(index, item) {
                        bed = item.jml_bed - item.count
                        student += '<tr>';
                        student += '<td>' + item.kategori + '</td>';
                        student += '<td>' + bed + '</td>';
                        student += '<td>' + item.jml_bed + '</td>';
                        student += '<td>' + item.count_l + '</td>';
                        student += '<td>' + item.count_p + '</td>';
                        student += '</tr>';
                        i++;
                    });
                } else {
                    student += '<td colspan="3" class="dataTables_empty" valign="top">No data available in table</td>';
                }
                $('#dataLanding tbody').html(student);

            }
        });
    });

    <?php if ($title == 'Beranda') { ?>

        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Bar Chart Example
        var drwcvd = document.getElementById("myChartCovid");
        var cvd = new Chart(drwcvd, {
            type: 'bar',
            data: {
                labels: ["Pasien COVID-19", "Pasien Non-COVID-19"],
                datasets: [{
                    // label: "Revenue",
                    backgroundColor: ["#5AEED1", "#32A58F"],
                    borderColor: "rgba(2,117,216,1)",
                    data: [<?= $jml_positif ?>, <?= $jml_negatif ?>],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: <?= $total_pasien ?> + 3,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });

        var drwjk = document.getElementById("myChartJK");
        var jk = new Chart(drwjk, {
            type: 'bar',
            data: {
                labels: ["Laki-Laki", "Perempuan"],
                datasets: [{
                    backgroundColor: ["#5AEED1", "#32A58F"],
                    borderColor: "rgba(2,117,216,1)",
                    data: [<?= $jml_laki ?>, <?= $jml_perempuan ?>],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: <?= $total_pasien ?> + 3,
                            maxTicksLimit: 5,
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });

        var drwrug = document.getElementById("myChartRRuangan");
        var rug = new Chart(drwrug, {
            type: 'pie',
            data: {
                labels: <?php
                        echo "[";
                        foreach ($nama_ruangan as $n) {
                            echo "'" . $n['nama_ruangan'] . "',";
                        }
                        echo "]";
                        ?>,
                datasets: [{
                    data: <?php
                            echo "[";
                            foreach ($ruangan as $r) {
                                echo $r['count'] . ",";
                            }
                            echo "]";
                            ?>,
                    backgroundColor: ['#5AEED1', '#41D4B8', '#32A58F', '#32958F', '#32858F'],
                }],
            },
        });

        var drwusa = document.getElementById("myChartUsia");
        var usa = new Chart(drwusa, {
            type: 'pie',
            data: {
                labels: ["0-4 Tahun", "5-12 Tahun", "22-30 Tahun", "31-50 Tahun", "50 Tahun"],
                datasets: [{
                    data: [10, 30, 25, 50, 39],
                    backgroundColor: ['#7FF2DB', '#5AEED1', '#41D4B8', '#32A58F', '#247666'],
                }],
            },
        });
    <?php } ?>
</script>