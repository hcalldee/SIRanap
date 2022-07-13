 <div class="modal fade bd-example-modal-sm" id="harian-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="judul"><?= 'Tanggal ' . $title_slug ?></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="form-group">
                     <label for="info">Hari</label>
                     <input type="date" class="form-control" id="info">
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" id="try">Report</button>
                 <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
             </div>
         </div>
     </div>
 </div>