 <!-- Begin Page Content -->
 <div class="container">

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3 d-flex">
             <div class="p-2">
                 <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
             </div>
             <div class="ml-auto">
                 <button class="btn btn-primary Tambah-<?= $title_slug ?>" data-toggle="modal" data-target="#Tambah-<?= $title_slug; ?>">Tambah Data</button>
             </div>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered dataTable" id="dataTable" cellspacing="0">
                     <thead>
                         <tr>
                             <th scope="col">No</th>
                             <th scope="col">Ruangan</th>
                             <th scope="col">Tanggal</th>
                             <th scope="col">Pasien</th>
                             <th scope="col">Perawat</th>
                             <th scope="col">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            $i = 1;
                            foreach ($tindakan as $t) { ?>
                             <tr>
                                 <td><?= $i++ ?></td>
                                 <td><?= $t['ruangan'] ?></td>
                                 <td><?= $t['tanggal'] ?></td>
                                 <td><?= $t['pasien'] ?></td>
                                 <td><?= $t['perawat'] ?></td>
                                 <td class="text-center">
                                     <button class="btn btn-info detail-<?= $title_slug ?>" data-toggle="modal" data-target="#detail-<?= $title_slug; ?>" data-id="<?= $t['id']; ?>"><i class="fas fa-info-circle"></i></button>
                                     <button class="btn btn-success edit-<?= $title_slug ?>" data-toggle="modal" data-target="#edit-<?= $title_slug; ?>" data-id="<?= $t['id']; ?>" data-name="<?= $t['pasien'] ?>"><i class="fas fa-edit"></i></button>
                                     <button class="btn btn-danger hapus-<?= $title_slug ?>" data-toggle="modal" data-target="#hapus-<?= $title_slug; ?>" data-id="<?= $t['id']; ?>"><i class="fas fa-trash-alt"></i></button>
                                 </td>
                             </tr>
                         <?php } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>

 <?= $this->include('Admin/modal/tindakan/tambahTindakan'); ?>
 <?= $this->include('Admin/modal/tindakan/detailTindakan'); ?>
 <?= $this->include('Admin/modal/tindakan/editTindakan'); ?>
 <?= $this->include('Admin/modal/tindakan/hapusTindakan'); ?>