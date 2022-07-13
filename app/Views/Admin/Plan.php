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
                             <th scope="col">Planing</th>
                             <th scope="col" class="text-centr">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1;
                            foreach ($plan as $p) { ?>
                             <tr>
                                 <td><?= $i++ ?></td>
                                 <td><?= $p['planning'] ?></td>
                                 <td class="text-center">
                                     <button class="btn btn-success edit-<?= $title_slug ?>" data-toggle="modal" data-target="#edit-<?= $title_slug ?>" data-id="<?= $p['id']; ?>"><i class="fas fa-edit"></i></button>
                                     <button class="btn btn-danger hapus-<?= $title_slug ?>" data-toggle="modal" data-target="#hapus-<?= $title_slug ?>" data-id="<?= $p['id']; ?>"><i class="fas fa-trash"></i></button>
                                 </td>
                             </tr>
                         <?php } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>

 <?= $this->include('Admin/modal/plan/editPlan'); ?>
 <?= $this->include('Admin/modal/plan/tambahPlan'); ?>
 <?= $this->include('Admin/modal/plan/hapusPlan'); ?>