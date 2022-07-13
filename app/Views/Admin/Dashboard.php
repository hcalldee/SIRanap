 <!-- Begin Page Content -->
 <div class="container">
     <div class="owl-carousel owl-theme mt-4 bg-transparent mulish">
         <?php foreach ($ruangan as $r) { ?>
             <?php $r['kapasitas'] = $r['kapasitas'] - $r['count']; ?>
             <div class="card mx-2 shadow-sm br-15 ruangan" data-id="<?= $r['id'] ?>" data-toggle="modal" data-target="#modal">
                 <div class="card-body text-center">
                     <h5 class="text-uppercase font-weight-bold"><small><?= $r['nama_ruangan'] ?></small></h5>
                     <?php if ($r['kapasitas'] > 0) { ?>
                         <h1 class="font-weight-bold"><?= $r['kapasitas']; ?></h1>
                         <h6 class="text-uppercase font-weight-light"><small>Tempat Tidur</small></h6>
                     <?php } else { ?>
                         <br>
                         <h6 class="text-uppercase font-weight-light"></h6>
                         <h1 class="font-weight-bold">Penuh</h1>
                         <br>
                     <?php } ?>
                     <br>
                     <h6 class="font-weight-light">Click untuk info detail</h6>
                 </div>
             </div>
         <?php } ?>
     </div>
     <div class="modal fade bd-example-modal-md" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-md">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="judul"><?= 'Info Ruangan' ?></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered dataLanding" id="dataLanding" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th scope="col">Kelas</th>
                                         <th scope="col">Bed Tersedia</th>
                                         <th scope="col">Total Bed</th>
                                         <th scope="col">Laki Laki</th>
                                         <th scope="col">Perempuan</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <!-- <button type="button" class="btn btn-primary" id="reportbulan">Report</button> -->
                     <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                 </div>
             </div>
         </div>
     </div>
     <!-- DataTales Example -->
     <h6 class="mt-5 mb-5 font-weight-bold text-center">Jumlah Petugas Jaga Harian <br> Tanggal <?= date('d-m-Y') ?></h6>
     <div class="owl-carousel owl-theme mt-4 bg-transparent mulish">
         <?php foreach ($ruangan as $r) { ?>
             <?php $r['kapasitas'] = $r['kapasitas'] - $r['count']; ?>
             <div class="card mx-2 shadow-sm br-15">
                 <div class="card-body text-center">
                     <h5 class="text-uppercase font-weight-bold"><small><?= $r['nama_ruangan'] ?></small></h5>
                     <?php
                        $i = 0;
                        $dat['pagi'] = null;
                        $dat['sore'] = null;
                        $dat['malam'] = null;
                        foreach ($shift as $s) {
                            if ($s->ruangan == $r['id']) {
                                if ($s->tanggal == date('Y-m-d')) {
                                    if ($s->keterangan == 'Pagi') {
                                        $dat['pagi'][] = $s;
                                    } else if ($s->keterangan == 'Sore') {
                                        $dat['sore'][] = $s;
                                    } else if ($s->keterangan == 'Malam') {
                                        $dat['malam'][] = $s;
                                    } ?>
                     <?php  }
                            }
                        } ?>
                     <h6 class="text-uppercase text-center font-weight-light"><small>Jaga Pagi : <?php if ($dat['pagi'] != null) {
                                                                                                        echo sizeof($dat['pagi']) ?> Petugas</small></h6><?php } else { ?> 0 Petugas</small></h6>
                 <?php } ?>
                 <h6 class="text-uppercase text-center font-weight-light"><small>Jaga Sore : <?php if ($dat['sore'] != null) {
                                                                                                    echo sizeof($dat['sore']) ?> Petugas</small></h6><?php } else { ?> 0 Petugas</small></h6>
             <?php } ?>
             <h6 class="text-uppercase text-center font-weight-light"><small>Jaga Malam : <?php if ($dat['malam'] != null) {
                                                                                                echo sizeof($dat['malam']) ?> Petugas</small></h6><?php } else { ?> 0 Petugas</small></h6>
         <?php } ?>
                 </div>
             </div>
         <?php } ?>
     </div>
     <!-- <div class="row justify-content-center">
         <?php foreach ($ruangan as $r) { ?>
             <div class="card shadow mb-4 mr-1 col-md-4 col-4">
                 <div class="card-header py-3 d-flex">
                     <div class="p-2">
                         <h6 class="m-0 font-weight-bold text-primary"><?= $r['nama_ruangan']; ?></h6>
                     </div>
                 </div>
                 <div class="card-body">
                     <?php
                        $i = 0;
                        $dat['pagi'] = null;
                        $dat['sore'] = null;
                        $dat['malam'] = null;
                        foreach ($shift as $s) {
                            if ($s->ruangan == $r['id']) {
                                if ($s->tanggal == date('Y-m-d')) {
                                    if ($s->keterangan == 'Pagi') {
                                        $dat['pagi'][] = $s;
                                    } else if ($s->keterangan == 'Sore') {
                                        $dat['sore'][] = $s;
                                    } else if ($s->keterangan == 'Malam') {
                                        $dat['malam'][] = $s;
                                    } ?>
                     <?php  }
                            }
                        } ?>
                     <h6 class="text-uppercase text-center font-weight-light"><small>Jaga Pagi : <?php if ($dat['pagi'] != null) {
                                                                                                        echo sizeof($dat['pagi']) ?> Petugas</small></h6><?php } else { ?> 0 Petugas</small></h6>
                 <?php } ?>
                 <h6 class="text-uppercase text-center font-weight-light"><small>Jaga Sore : <?php if ($dat['sore'] != null) {
                                                                                                    echo sizeof($dat['sore']) ?> Petugas</small></h6><?php } else { ?> 0 Petugas</small></h6>
             <?php } ?>
             <h6 class="text-uppercase text-center font-weight-light"><small>Jaga Malam : <?php if ($dat['malam'] != null) {
                                                                                                echo sizeof($dat['malam']) ?> Petugas</small></h6><?php } else { ?> 0 Petugas</small></h6>
         <?php } ?>
                 </div>
             </div>
         <?php } ?>
     </div> -->



 </div>