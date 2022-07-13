  <div class="container">
      <!-- Grafik & Hotline -->
      <div class="row mt-5">
          <div class="row justify-content-center card-gh">

              <!-- Grafik -->
              <div class="col-lg-6 col-11 ">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner shadow-sm br-15">
                          <div class="carousel-item active ">
                              <div class="card ">
                                  <div class="card-header text-center bg-white" style="font-size: 24px; font-weight: 600; font-family: Mulish;">
                                      Perbandingan Jenis Kelamin
                                      <br>
                                      Terhadap Total Pasien
                                  </div>
                                  <div class="card-body col-lg-12 col-11"><canvas id="myChartJK" width="100%"></canvas>
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="card">
                                  <div class="card-header text-center bg-white " style="font-size: 24px; font-weight: 600; font-family: Mulish;">
                                      Perbandingan Pasien COVID Dan Non-Covid
                                      Terhadap Total Pasien
                                  </div>
                                  <div class="card-body col-lg-12 col-11 justify-content-center d-flex"><canvas id="myChartCovid" width="100%"></canvas></div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="card">
                                  <div class="card-header text-center bg-white" style="font-size: 24px; font-weight: 600; font-family: Mulish;">
                                      Perbandingan Reservasi Ruangan
                                      <br>
                                      Terhadap Total Pasien
                                  </div>
                                  <div class="card-body col-lg-12 col-11 justify-content-center d-flex"><canvas id="myChartRRuangan" width="100%"></canvas>
                                  </div>
                              </div>
                          </div>
                          <a class=" carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only bg-dark">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                          </a>
                      </div>
                  </div>
              </div>
              <!-- Grafik End -->

              <!-- Hotline -->
              <div class="col-lg-6 col-11 mt-lg-0 mt-5">
                  <div class="card shadow-sm br-15">
                      <div class="card-body pt-0 mt-1">
                          <div class="row justify-content-center">
                              <div class="col-12">
                                  <h3 class="text-center lato"><b>HOTLINE RSUD
                                          KOTABARU</b> </h3>
                              </div>
                              <div class="col-11 mt-6 py-2">
                                  <a href="tel:051822945">
                                      <button class="btn btn-block btn-hijau " type="submit">
                                          <i class="fas fa-phone-alt fa-2x align-middle float-left mt-1 mr-2"></i>
                                          <span class="float-left">Hotline 1 RSUD PJS</span>
                                          <span class="float-right mt-2">(0518) 22945</span>
                                          <br>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-11 mt-6 py-2">
                                  <a href="tel:051821118">
                                      <button class="btn btn-block btn-hijau " type="submit">
                                          <i class="fas fa-phone-alt fa-2x align-middle float-left mt-1 mr-2"></i>
                                          <span class="float-left">Hotline 2 IGD</span>
                                          <span class="float-right mt-2">(0518) 21118</span>
                                          <br>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-11 py-2">
                                  <a href=" tel:082250753061">
                                      <button class="btn btn-block btn-hijau " type="submit">
                                          <i class="fas fa-phone-alt fa-2x float-left mt-1 mr-2"></i>
                                          <span class=" float-left">Hotline 3 Humas</span>
                                          <span class=" float-right mt-2">082250753061</span>
                                          <br>
                                          <small class="float-left">Edi Hartono</small>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-11 mt-6 py-2">
                                  <a href="tel:081351977761">
                                      <button class="btn btn-block btn-hijau " type="submit">
                                          <i class="fas fa-phone-alt fa-2x align-middle float-left mt-1 mr-2"></i>
                                          <span class="float-left">Hotline 4 Ambulance</span>
                                          <span class="float-right mt-2">081351977761</span>
                                          <br>
                                          <small class="float-left">An. Lukmanul Hakim</small>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-11 mt-6 py-2">
                                  <a href="tel:081351756733">
                                      <button class="btn btn-block btn-hijau " type="submit">
                                          <i class="fas fa-phone-alt fa-2x align-middle float-left mt-1 mr-2"></i>
                                          <span class="float-left">Hotline 5 Ambulance</span>
                                          <span class="float-right mt-2">081351756733</span>
                                          <br>
                                          <small class="float-left">An. Dadang</small>
                                      </button>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Hotline End -->
          </div>
      </div>
      <!-- Grafik & Hotline End-->

      <!-- Kapasitas Ruangan -->
      <div class="mt-5 ">
          <div class="row justify-content-center">
              <h1 class=" judultext text-center mulish">
                  <b>Ketersediaan Ruangan Di Rumah Sakit</b>
              </h1>
          </div>
          <!-- <div class="row justify-content-center">
        <small class="align-center">*Update terakhir : Sabtu, 07 November 2020 | 12:20</small>
      </div> -->

          <div class="owl-carousel owl-theme mt-4 bg-transparent mulish">
              <?php foreach ($ruangan as $r) { ?>
                  <?php $r['kapasitas'] = $r['kapasitas'] - $r['count']; ?>
                  <div class="card mx-2 shadow-sm br-15 ruangan" data-id="<?= $r['id'] ?>" data-toggle="modal" data-target="#modal">
                      <div class="card-body text-center">
                          <h4 class="text-uppercase font-weight-bold"><small><?= $r['nama_ruangan'] ?></small></h4>
                          <?php if ($r['kapasitas'] > 0) { ?>
                              <h6 class="text-uppercase font-weight-light"><small>Tersedia</small></h6>
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

      </div>
      <!-- kapasitas Ruangan End -->

      <!-- Info -->
      <div class="mt-5 mb-5">
          <h2 class="text-center mulish font-weight-bolder">Apa yang Harus Dilakukan</h2>
          <div class="row align-content-center bg-white mx-2 shadow-sm mt-4 br-15">
              <div class="col-lg-3 ml-5 mt-3 mb-1 pl-5 d-none d-lg-block">
                  <img src="<?= base_url() ?>/public/lp/assets/img/doctor-man.svg" alt="" height="277">
              </div>
              <div class="col-lg-5 col-sm-7 mt-lg-4 mt-3 ml-1">
                  <h4 class="mb-lg-3">Deteksi Mandiri COVID-19</h4>
                  <p>Deteksi Mandiri Cepat COVID-19 adalah salah satu cara untuk mengetahui apakah Anda memiliki gejala
                      yang
                      memerlukan pemeriksaan dan pengujian lebih lanjut mengenai COVID-19 atau tidak.</p>
              </div>
              <div class="col-lg-3 col-sm-4 mt-lg-4 mt-sm-2 mb-4 pt-sm-4  ">
                  <a href="https://www.kemkes.go.id/article/view/20012900002/Kesiapsiagaan-menghadapi-Infeksi-Novel-Coronavirus.html" class="btn btn-outline-hijau mt-sm-5 ml-md-5 py-2 ">
                      Periksa Diri Saya
                  </a>
              </div>
          </div>
      </div>
      <!-- Info End -->
  </div>