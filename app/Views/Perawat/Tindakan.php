 <!-- Begin Page Content -->
 <div class="container">
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered dataTable" id="dataTable" cellspacing="0">
                     <thead>
                         <tr>
                             <th scope="col">No</th>
                             <th scope="col">Tanggal</th>
                             <th scope="col">Pasien</th>
                             <th scope="col">Perawat</th>
                             <th scope="col" class="text-center">Diagnosa Keperawatan</th>
                             <th scope="col" class="text-center">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            $i = 1;
                            if ($tindakan != null) {
                                foreach ($tindakan as $t) {
                            ?>
                                 <tr>
                                     <td><?= $i++ ?></td>
                                     <td><?= $t['tanggal'] ?></td>
                                     <td><?= $t['pasien'] ?></td>
                                     <td><?= $t['perawat'] ?></td>
                                     <td class="text-justify"><small>
                                             <?php if ($t['assessment'] != null) {
                                                    echo $t['assessment'];
                                                } else {
                                                    echo  'Laporan Belum Dikerjakan';
                                                } ?>
                                         </small>
                                     </td>
                                     <td class="text-center">
                                         <button class="btn btn-info detail-<?= $title_slug ?>" data-toggle="modal" data-target="#detail-<?= $title_slug; ?>" data-id="<?= $t['id']; ?>"><i class="fas fa-info-circle"></i></button>
                                         <?php if ($edit) { ?>
                                             <button class="btn btn-success edit-<?= $title_slug ?>" data-toggle="modal" data-target="#edit-<?= $title_slug; ?>" data-id="<?= $t['id']; ?>" data-name="<?= $t['pasien'] ?>"><i class="fas fa-edit"></i></button>
                                         <?php } ?>
                                     </td>
                                 </tr>
                         <?php }
                            } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>

 <?= $this->include('Perawat/modal/modalEdit'); ?>
 <?= $this->include('Perawat/modal/modalDetail'); ?>