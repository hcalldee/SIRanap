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
                             <th scope="col">Menu</th>
                             <th scope="col">Tipe</th>
                             <th scope="col">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1;
                            foreach ($usermenu as $um) { ?>
                             <tr>
                                 <td><?= $i++ ?></td>
                                 <td><?= $um['menu'] ?></td>
                                 <td><?= $um['type'] ?></td>
                                 <td>
                                     <button class="btn btn-info detail-pasien" data-toggle="modal" data-target="#detail-<?= $title_slug; ?>" data-id="<?= $um['id']; ?>"><i class="fas fa-info-circle"></i></button>
                                     <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                     <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                 </td>
                             </tr>
                         <?php } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="detail-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"><?= 'Detail ' . $title_slug; ?></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 ...
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                 <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
             </div>
         </div>
     </div>
 </div>