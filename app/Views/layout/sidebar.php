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
        Admin
    </div>

    <!-- jadwal -->
    <?php //if ($judul == 'Dashboard') : 
    ?>
    <li class="nav-item active">
        <?php //else : 
        ?>
    <li class="nav-item">
        <?php //endif; 
        ?>
        <a class="nav-link py-2" href="<?= base_url('index.php/admin'); ?>">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- jadwal -->
    <?php //if ($judul == 'Kalender') : 
    ?>
    <li class="nav-item active">
        <?php //else : 
        ?>
    <li class="nav-item">
        <?php //endif; 
        ?>
        <a class="nav-link py-2" href="<?= base_url('index.php/admin/kalender'); ?>">
            <i class="far fa-fw fa-calendar-alt"></i>
            <span>Kalender</span></a>
    </li>

    <!-- jadwal -->
    <?php //if ($judul == 'Jadwal') : 
    ?>
    <li class="nav-item active">
        <?php //else : 
        ?>
    <li class="nav-item">
        <?php //endif; 
        ?>
        <a class="nav-link py-2" href="<?= base_url('index.php/admin/jadwal'); ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Jadwal Jaga</span></a>
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
        <a class="nav-link py-2" href="<?= base_url('/Admin//Tindakan'); ?>">
            <i class="fas fa-fw fa-briefcase-medical"></i>
            <span>Tindakan</span></a>
    </li>


    <?php //if ($judul == 'Manajemen Dokter' || $judul == 'Manajemen Perawat' || $judul == 'Manajemen Pasien' || $judul == 'Manajemen Akun') : 
    ?>
    <li class="nav-item">
        <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Manajemen Datamaster</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <?php //endif; 
            ?>

            <div class="bg-white py-2 collapse-inner rounded mt-2">
                <h6 class="collapse-header">Sub menu</h6>

                <!-- sub menu Akun -->
                <?php //if ($judul == 'Manajemen Akun') : 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//User') ?>">Akun</a>
                <?php //endif; 
                ?>


                <!-- sub menu dokter -->
                <?php //if ($judul == 'Manajemen Perawat') : 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Perawat') ?>">Perawat</a>
                <?php //endif; 
                ?>

                <!-- sub menu dokter -->
                <?php //if ($judul == 'Manajemen Pasien') : 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Pasien') ?>">Pasien</a>
                <?php //endif; 
                ?>
                <?php //if ($judul == 'Manajemen Pasien') : 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Ruangan') ?>">Ruangan</a>
                <?php //endif; 
                ?>
                <!-- sub menu dokter -->
                <?php //if ($judul == 'Manajemen Pasien') : 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Assessment') ?>">Assessment</a>
                <?php //endif; 
                ?>
                <?php //if ($judul == 'Manajemen Pasien') : 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Plan') ?>">Planning</a>
                <?php //endif; 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Kategori') ?>">Kategori</a>
                <?php //endif; 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Dokter') ?>">Dokter</a>
                <?php //endif; 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Spesialis') ?>">Spesialis</a>
                <?php //endif; 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Usermenu') ?>">User Menu</a>
                <?php //endif; 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Useraccessmenu') ?>">User Access Menu</a>
                <?php //endif; 
                ?>
                <a class="collapse-item" href="<?= base_url('/Admin//Role') ?>">Role</a>
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
        <a class="nav-link py-2" href="<?= base_url('index.php/profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Nav Item - Dashboard -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link py-2" href="<?= base_url(); ?>/Auth/Login">
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