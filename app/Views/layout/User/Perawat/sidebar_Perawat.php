<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/admin'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISRANAP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query Menu -->

    <!-- Looping menu -->
    <div class="sidebar-heading text-white mb-1">
        Perawat
    </div>

    <!-- jadwal -->
    <?php //if ($judul == 'Dashboard') : 
    ?>
    <li class="nav-item active">
        <?php //else : 
        ?>
        <!-- <li class="nav-item">
        <?php //endif; 
        ?>
        <a class="nav-link py-2" href="<?= base_url('index.php/admin'); ?>">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Dashboard</span></a>
    </li> -->

        <!-- jadwal -->
        <?php //if ($judul == 'Kalender') : 
        ?>

    <li class="nav-item active">
        <?php //else : 
        ?>
        <!-- <li class="nav-item">
        <?php //endif; 
        ?>
        <a class="nav-link py-2" href="<?= base_url('index.php/admin/kalender'); ?>">
            <i class="far fa-fw fa-calendar-alt"></i>
            <span>Kalender</span></a>
    </li> -->

        <!-- jadwal -->
        <?php //if ($judul == 'Jadwal') : 
        ?>
    <li class="nav-item active">
        <?php //else : 
        ?>
    <li class="nav-item">
        <?php //endif; 
        ?>
         <a class="nav-link py-2" id="kalender_perawat" >
			<i class="fas fa-fw fa-clipboard"></i>
			<span>Jadwal Jaga</span>
		 </a> 
    </li>


    <!-- TINDAKAN -->
    <?php //if ($judul == 'Tindakan') : 
    ?>
    <li class="nav-item active">
        <?php //else : 
        ?>
    <li class="nav-item">
        <?php //endif; 
        ?>
        <a class="nav-link py-2" href="<?= base_url('/Perawat/Tindakan'); ?>">
            <i class="fas fa-fw fa-briefcase-medical"></i>
            <span>Tindakan</span></a>
    </li>

    <li class="nav-item active">
        <?php //else : 
        ?>
    <li class="nav-item">
        <?php //endif; 
        ?>
        <a class="nav-link py-2" href="<?= base_url('/Perawat/Pasien'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Pasien</span></a>
    </li>


    <?php //if ($judul == 'Manajemen Dokter' || $judul == 'Manajemen Perawat' || $judul == 'Manajemen Pasien' || $judul == 'Manajemen Akun') : 
    ?>
    <li class="nav-item">
        <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Data Tindakan(soon)</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <?php //endif; 
            ?>

            <div class="bg-white py-2 collapse-inner rounded mt-2">
                <h6 class="collapse-header">Sub menu</h6>

                <!-- sub menu dokter -->
                <?php //if ($judul == 'Manajemen Perawat') : 
                ?>
                <!-- <button data-toggle="modal" data-target="#harian-<?= $title_slug; ?>">Laporan Harian (soon)</button> -->
                <a class="collapse-item" href="<?= base_url('Perawat/Tindakan/All'); ?>">Seluruh Tindakan Saya</a>
                <a class="collapse-item" href="<?= base_url('Perawat/Tindakan/Ruangan'); ?>">Tindakan <?= $ruangan ?></a>

                <a class="collapse-item harian" data-toggle="modal" data-target="#harian-<?= $title_slug; ?>">Laporan Harian</a>
                <?php //endif; 
                ?>

                <!-- sub menu dokter -->
                <?php //if ($judul == 'Manajemen Pasien') : 
                ?>
                <a class="collapse-item bulan" data-toggle="modal" data-target="#bulan-<?= $title_slug; ?>">Laporan Bulanan</a>
                <?php //endif; 
                ?>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider mt-3">


    <div class="sidebar-heading text-white mb-1">
        User
    </div>
    <!-- HOME -->
    <?php //if ($judul == 'Profile') : 
    ?>
    <li class="nav-item active">
        <?php //else : 
        ?>
    <li class="nav-item">
        <?php //endif; 
        ?>
        <a class="nav-link py-2" data-toggle="modal" data-target="#user-<?= $title_slug; ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Nav Item - Dashboard -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link py-2" href="<?= base_url(); ?>/Logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<div class="modal fade bd-example-modal-sm" id="bulan-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul"><?= 'Tanggal ' . $title_slug ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formreportbulan">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <input type="month" class="form-control" id="bulanreport" name="bulan">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="reportbulan" disabled>Report</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
            </form>
        </div>
    </div>
</div>

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
                <form action="#" id="formreportharian">
                    <div class="form-group">
                        <label for="info">Hari</label>
                        <input type="date" class="form-control" id="tanggalreport" name="tanggal">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="reportharian" disabled>Report</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-sm" id="user-<?= $title_slug; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul"><?= 'Ganti Password' ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formgantipassword">
                    <div class="form-group">
                        <label for="info">Password Lama</label>
                        <input type="password" class="form-control" id="pwlam" name="password_lama">
                    </div>
                    <div class="form-group">
                        <label for="info">Password Baru</label>
                        <input type="password" class="form-control" id="pwbar" name="password_baru">
                    </div>
                    <div class="form-group">
                        <label for="info">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="conpwbar" name="confirm_baru">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="gantipassword">Ganti</button>
                <!-- <button type="button" class="btn btn-primary">Kembali</button> -->
            </div>
            </form>
        </div>
    </div>
</div>