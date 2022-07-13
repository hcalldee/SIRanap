 <div class="modal fade" id="Tambah-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="judul"><?= 'Buat ' . $title_slug ?></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="#" id="formtambahshift">
                     <div class="row">
                         <div class="form-group col-md-4">
                             <label for="exampleInputEmail1">Tanggal</label>
                             <input type="date" class="form-control" name="tgl">
                         </div>
                         <div class="form-group col-md-5">
                             <label for="example">Perawat</label>
                             <select class="custom-select" name="perawat">
                                 <option id="pilih-perawat">Pilih Perawat</option>
                                 <?php foreach ($perawat as $p) { ?>
                                     <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                                 <?php } ?>
                             </select>
                         </div>
                         <div class="form-group col-md-3">
                             <label for="example">Jadwa Jaga</label>
                             <select class="custom-select" name="jaga">
                                 <option id="pilih-perawat">Pilih Jadwal</option>
                                 <option id="Pagi">Pagi</option>
                                 <option value="Sore">Sore</option>
                                 <option value="Malam">Malam</option>
                             </select>
                         </div>
                     </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" id="tambahShift">Buat Shift</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                 <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
             </div>
         </div>
         </form>
     </div>
 </div>