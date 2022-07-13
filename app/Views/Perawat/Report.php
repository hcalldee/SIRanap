 <!-- Begin Page Content -->
 <div class="container">

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered dataTable" id="_Tindakan" cellspacing="0">
                     <thead>
                         <tr>
                             <th scope="col" style="text-align: center;">No</th>
                             <th scope="col" style="text-align: center;">Data Pasien</th>
                             <th scope="col" style="text-align: center;">Shift</th>
                             <th scope="col" style="text-align: center;">Subjektif</th>
                             <th scope="col" style="text-align: center;">Objektif</th>
                             <th scope="col" style="text-align: center;">Assessment</th>
                             <th scope="col" style="text-align: center;">Planning</th>
                             <th scope="col" style="text-align: center;">Deskripsi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            $i = 1;
                            if ($tindakan != null) {
                                foreach ($tindakan as $t) {
                            ?>
                                 <tr>
                                     <td>
                                         <div><?= $i++ ?></div>
                                     </td>
                                     <td style="text-align: left;">
                                         Nama <?= ' : ' . $t['pasien'] ?><br>
                                         No.MR <?= ' : ' . $t['nomor_mr'] ?><br>
                                         Tanggal Lahir <?= ' : ' . $t['tanggal_lahir'] ?><br>
                                         Diagnosa Medis <?= ' : ' . $t['diagnosa_medis'] ?><br>
                                     </td>
                                     <td style="text-align: center; vertical-align:middle;"><?= $t['shif'] ?></td>
                                     <td class="text-justify"><small><?= $t['subjektif'] ?></small></td>
                                     <td class="text-justify"><small><?= $t['objektif'] ?></small></td>
                                     <td class="text-justify"><small><?= $t['assessment'] ?></small></td>
                                     <td class="text-justify"><small><?= $t['planning'] ?></small></td>
                                     <td class="text-justify"><small>info lebih lanjut</small></td>
                                 </tr>
                         <?php }
                            } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>