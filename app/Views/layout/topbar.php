<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?= session()->get('nama') ?>
                </span>
                <img class="img-profile rounded-circle" src="<?= base_url('public/img/profile/' . session()->get('image')) ?>">

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php
                $menu = session()->get('role');
                if ($menu != null) {
                    foreach ($menu as $m) {
                        if ($m == 'Kepala Ruangan') {
                            $url = 'KR';
                        } else if ($m == 'Perawat') {
                            $url = 'Perawat';
                        } else if ($m == 'Admin') {
                            $url = 'Admin';
                        } else if ($m == 'Ketua Tim') {
                            $url = 'KT';
                        }
                ?>
                        <a class="dropdown-item" href="<?= base_url($url); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?= $m ?>
                        </a>
                <?php   }
                }
                ?>
                <a class="dropdown-item" href="<?= base_url('Logout'); ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->