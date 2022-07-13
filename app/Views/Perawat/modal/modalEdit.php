 <div class="modal fade" id="edit-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="judul"><?= 'Isi ' . $title_slug ?></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="#" id="formtindakan">
                     <div id="ci" class="carousel slide" data-interval="false">
                         <ol class="carousel-indicators">
                             <li data-target="#ci" data-slide-to="0"></li>
                             <li data-target="#ci" data-slide-to="1"></li>
                             <li data-target="#ci" data-slide-to="3"></li>
                         </ol>
                         <div class="carousel-inner">
                             <div class="carousel-item active">
                                 <div class="card border-0 d-block w-100">
                                     <div class="row">
                                         <div class="form-group col-md-9 col-9">
                                             <label for="exampleInputEmail1">Pasien</label>
                                             <input type="text" class="form-control p_pasien" disabled>
                                         </div>
                                         <div class="form-group col-md-3 col-3">
                                             <label for="exampleInputEmail1">Umur</label>
                                             <input type="text" class="form-control" id="e_umur" disabled>
                                         </div>
                                     </div>
                                     <div class="row" style="margin-bottom:-4%;">
                                         <div class="form-group col-md-4 col-4">
                                             <label for="exampleInputEmail1">Tekanan Darah(TD)</label>
                                             <div class="form-group">
                                                 <input type="number" class="form-control " id="e_sistolik" name="sistolik" placeholder="Sistolik">
                                             </div>
                                             <div class="form-group">
                                                 <input type="number" class="form-control" id="e_diastolik" name="diastolik" placeholder="Diastolik">
                                             </div>
                                         </div>
                                         <div class="form-group col-md-8 col-8">
                                             <label for="exampleInputEmail1">Temperatur</label>
                                             <div class="row">
                                                 <div class="form-group col-md-4 col-4">
                                                     <input type="number" class="form-control " id="e_temp" name="temp" placeholder="°C">
                                                 </div>
                                                 <div class="form-group col-md-8 col-8">
                                                     <input type="text" class="form-control " id="e_deskriptemp" name="deskriptemp" placeholder="Ket. temperatur">
                                                 </div>
                                             </div>
                                             <label for="exampleInputEmail1">Nadi</label>
                                             <div class="row">
                                                 <div class="form-group col-md-4 col-4">
                                                     <input type="number" class="form-control " id="e_pulse" name="pulse" placeholder="BPM">
                                                 </div>
                                                 <div class="form-group col-md-8 col-8">
                                                     <input type="text" class="form-control " id="e_deskrippulse" name="deskrippulse" placeholder="Ket. Nadi">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <label for="exampleInputEmail1">Respirasi</label>
                                     <div class="row">
                                         <div class="form-group col-md-3 col-3">
                                             <input type="number" class="form-control " id="e_nafas" name="jml_nafas" placeholder="Nafas">
                                         </div>
                                         <div class="form-group col-md-9 col-9">
                                             <input type="text" class="form-control " id="e_deskripnafas" name="deskripjml_nafas" placeholder="Ket. Respirasi">
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="form-group col-md-4 col-4">
                                             <label for="exampleInputEmail1">Dokter</label>
                                             <select class="custom-select" id="e_dokter" name="dokter">
                                                 <option value="">Pilih Dokter</option>
                                                 <?php foreach ($dokter as $d) { ?>
                                                     <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                         <div class="form-group col-md-8 col-8">
                                             <label for="exampleInputEmail1">GCS</label>
                                             <div class="row">
                                                 <div class="col-md-4 col-4">
                                                     <input type="number" class="form-control" id="e_eye" name="eye" min="0" max="4" placeholder="Eye">
                                                 </div>
                                                 <div class="col-md-4 col-4">
                                                     <input type="number" class="form-control" id="e_verba" name="verba" min="0" max="5" placeholder="Verba">
                                                 </div>
                                                 <div class="col-md-4 col-4">
                                                     <input type="number" class="form-control" id="e_motorik" name="motorik" min="0" max="6" placeholder="Motorik">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="carousel-item">
                                 <div class="form-group">
                                     <label for="exampleFormControlTextarea1">Keadaan Umum</label>
                                     <textarea class="form-control " id="e_ku" name="keadaan_umum" rows="4"></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleFormControlTextarea1">Deskripsi</label>
                                     <textarea class="form-control " id="e_deskripsi" name="deskripsi" rows="4"></textarea>
                                 </div>
                             </div>
                             <div class="carousel-item">
                                 <div class="card border-0 d-block w-100">
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Subyektif</label>
                                         <textarea class="form-control " id="e_subyektif" name="subjektif" rows="2"></textarea>
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Obyektif</label>
                                         <textarea class="form-control " id="e_obyektif" name="objektif" rows="2"></textarea>
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Assessment</label>
                                         <select class="custom-select" id="e_assessment" name="assessment">
                                             <option value="">Pilih</option>
                                             <?php foreach ($assessment as $a) { ?>
                                                 <option value="<?= $a['id'] ?>"><?= $a['assessment'] ?></option>
                                             <?php } ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Planning</label>
                                         <select class="custom-select" id="e_planning" name="planning">
                                             <option value="">Pilih</option>
                                             <?php foreach ($plan as $p) { ?>
                                                 <option value="<?= $p['id'] ?>"><?= $p['planning'] ?></option>
                                             <?php } ?>
                                         </select>
                                         <input type="text" class="id" name="id" hidden>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="d-flex">
                             <div class="mr-auto">
                                 <a class="fas fa-arrow-circle-left pr-5" href="#ci" role="button" data-slide="prev"></a>
                                 <br><small>sebelumya</small>
                             </div>
                             <div class="ml-auto">
                                 <a class="fas fa-arrow-circle-right pl-5" href="#ci" role="button" data-slide="next"></a>
                                 <br><small>selanjutnya</small>
                             </div>
                         </div>
                     </div>
             </div>
             </form>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" id="isiTindakan">Isi Tindakan</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                 <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
             </div>
         </div>
     </div>
 </div>