<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #3E88EF;" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="esign.php">
        <div class="sidebar-brand-icon">
            <img class="d-inline-block align-center" src="<?= base_url('assets/'); ?>img/bmkg-logo.png" width="66" height="66">
        </div>

        <h1 class="h1 mt-2 font-weight-bold text-light text-center small text-uppercase "><?php echo $topbar; ?></h1>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php
    $role = $this->session->userdata('role_id');
    if ($role == '1') {
        $dashboard = 'admin';
    } elseif ($role == '2' ) {
        $dashboard = 'user';
    } elseif ($role == '3' ) {
        $dashboard = 'user';
    } elseif ($role == '4' ) {
        $dashboard = 'user';
    } else {
        $dashboard = 'balai';
    } ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url($dashboard)  ?>">
            <i class="fas fa-2x fa-fw  fa-home"></i>
            <span style="font-size: 15px;">Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Up database kontrol menu dan submenu berdasarkan role_id -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $menu = $this->db->query("SELECT menu_id FROM bo_access_menu WHERE role_id = '$role_id'")->result(); ?>

    <?php
    $stampil = '';
    $stampil1 = '';
    $stampil2 = '';
    $stampil3 = '';
    $tampil  = '';
    $tampil1 = '';
    $tampil2  = '';
    ?>
    <!-- Tampilin berdasarkan role id-->


    <?php foreach ($menu as $m) {
        if ($m->menu_id == '1') {
            $tampil = "
            <li class='nav-item'>
            
            <a class='nav-link collapsed' href='dokumen_inskal'>
            <i class='fas fa-5x fa-fw fa-book'aria-hidden='true'  style='color: white;'></i>
            <span>Pengajuan E-Sign</span>
            </a>
        </li>";
        }
        if ($m->menu_id == '2') {
            $tampil1 = "  <li class='nav-item'>
            <a class='nav-link collapsed' href='dokumen_kasubid_inskal'>
            <i class='fas  fa-fw fa-book'aria-hidden='true'  style='color: white;'></i>
            <span>QC1</span>
            </a>
        </li>";
        }
        if ($m->menu_id == '3') {
            $tampil2 = "
            <li class='nav-item'>
           
            <a class='nav-link collapsed' href='bo_kabid_inskal'>
            <i class='fas fa-fw fa-fax'aria-hidden='true'  style='color: white;'></i>
                <span>QC2</span>
            </a>
        </li>";
        }
    }
    ?>

    <?php echo $tampil; ?>
    <?php echo $tampil1; ?>
    <?php echo $tampil2; ?>


    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->