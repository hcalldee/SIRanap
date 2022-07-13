 <div class="modal fade" id="edit-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="judul"><?= 'Buat ' . $title_slug ?></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="#" id="formeditshif">
                     <div class="row">
                         <input type="date" class="form-control" id="e_tgl" name="tgl" hidden>
                         <div class="form-group col-md-8">
                             <label for="example">Perawat</label>
                             <select class="custom-select" id="e_perawat" name="perawat">
                                 <option id="pilih-perawat">Pilih Perawat</option>
                                 <?php foreach ($perawat as $p) { ?>
                                     <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                                 <?php } ?>
                             </select>
                         </div>
                         <div class="form-group col-md-4">
                             <label for="example">Jadwa Jaga</label>
                             <select class="custom-select" id="e_jaga" name="jaga">
                                 <option id="pilih-perawat">Pilih Jadwal</option>
                                 <option value="Pagi">Pagi</option>
                                 <option value="Sore">Sore</option>
                                 <option value="Malam">Malam</option>
                             </select>
                         </div>
                         <input type="text" id="e_id" name="id" value="" hidden>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" id="editShift">Ubah Shift</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                 <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
             </div>
         </div>
     </div>
 </div>