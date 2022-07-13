<?php
// ob_start();

// echo $this->extend('layout/User/Perawat/Perawat');

// echo $this->section('content');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Keperawatan</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse:
                collapse;
        }
    </style>
</head>

<body onload="window.print()">
    <center>
        <h1>LAPORAN KEPERAWATAN</h1>
        <h3>RUANG <?= $ruangan ?></h3>
        <h4>RSUD Pangeran Jaya Sumitra Kotabaru</h4>
        <hr>
    </center><br>
    <table style="border: 1px solid white;">
        <tr>
            <td style="border: 1px solid white;">Bulan</td>
            <td style="border: 1px solid white;">:</td>
            <td style="border: 1px solid white;"><?= $tanggal ?></td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">Jenis Laporan</td>
            <td style="border: 1px solid white;">:</td>
            <td style="border: 1px solid white;">Bulanan</td>
        </tr>
    </table>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">No</th>
                        <th scope="col" style="text-align: center;" width="30%">Data Pasien</th>
                        <th scope="col" style="text-align: center;" width="5%">Shift</th>
                        <th scope="col" style="text-align: center;">Tanggal</th>
                        <th scope="col" style="text-align: center;">Perawat</th>
                        <th scope="col" style="text-align: center;">Diagnosa Keperawatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    if ($tindakan != null) {
                        foreach ($tindakan as $t) {
                    ?>
                            <tr>
                                <td style="text-align: center;"><?= $i++ ?></td>
                                <td style="text-align: left;">
                                    <table style="border: 1px solid white;">
                                        <tr>
                                            <td style="border: 1px solid white;">Nama</td>
                                            <td style="border: 1px solid white;">:</td>
                                            <td style="border: 1px solid white;"> <?= $t['pasien'] ?></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid white;">No.MR</td>
                                            <td style="border: 1px solid white;">:</td>
                                            <td style="border: 1px solid white;"><?= $t['nomor_mr'] ?></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid white;">Tanggal Lahir</td>
                                            <td style="border: 1px solid white;">:</td>
                                            <td style="border: 1px solid white;"><?= $t['tanggal_lahir'] ?></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid white;">Diagnosa Medis</td>
                                            <td style="border: 1px solid white;">:</td>
                                            <td style="border: 1px solid white;"><?= $t['diagnosa_medis'] ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="text-align: center;"><?= $t['shif'] ?></td>
                                <td class="text-justify"><small><?= $t['tanggal'] ?></small></td>
                                <td class="text-justify"><small><?= $t['perawat'] ?></small></td>
                                <td class="text-justify"><small><?= $t['assessment'] ?></small></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>



<?php
// echo $this->endSection();

// $html = ob_get_clean();

// include "lib/dompdf/vendor/autoload.php";

// use Dompdf\Dompdf;

// $dompdf = new Dompdf();
// $dompdf->loadHtml($html);
// $dompdf->setPaper('A4', 'landscape');
// $dompdf->render();

// $pdf_gen = $dompdf->output();

// $dompdf->stream(session()->get('nama') . '_' . $tanggal . '_' . "Laporan.pdf", array('Attachment' => 0));
?>