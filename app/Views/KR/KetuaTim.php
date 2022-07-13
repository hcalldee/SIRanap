 <!-- Begin Page Content -->
 <div class="container">

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3 d-flex">
             <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered dataTable" id="dataTable" cellspacing="0">
                     <thead>
                         <tr>
                             <th scope="col">No</th>
                             <th scope="col">Perawat</th>
                             <th scope="col">Role</th>
                             <th scope="col">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1;
                            foreach ($userrole as $r) {
                            ?>
                             <tr>
                                 <td><?= $i++ ?></td>
                                 <td><?= $r->perawat ?></td>
                                 <td><?= $r->role ?></td>
                                 <td class="text-center">
                                     <button class="btn btn-success edit-<?= $title_slug ?>" data-toggle="modal" data-target="#edit-<?= $title_slug ?>" data-id="<?= $r->id ?>"><i class="fas fa-edit"></i></button>
                                 </td>
                             </tr>
                         <?php }
                            ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>

 <?= $this->include('KR/modal/editKetua'); ?>