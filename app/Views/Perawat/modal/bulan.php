  <!-- Begin Page Content -->
  <div class="container">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered dataTable" id="_Tindakan" cellspacing="0">
                      <thead>
                          <tr>
                              <th scope="col">No</th>
                              <th scope="col">Ruangan</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Pasien</th>
                              <th scope="col">Perawat</th>
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
                                      <td><?= $t['ruangan'] ?></td>
                                      <td><?= $t['tanggal'] ?></td>
                                      <td><?= $t['pasien'] ?></td>
                                      <td><?= $t['perawat'] ?></td>
                                  </tr>
                          <?php }
                            } ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>