<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center bg-light" href="<?= base_url('user'); ?>">
        <div class="sidebar-brand-icon">
          <img src="<?=base_url('assets/img/logo/logo.png')?>" style="max-width: 80px;"></img>
        </div>
        <div class="sidebar-brand-text mx-3">
          <img src="<?=base_url('assets/img/logo/logo1.png')?>" style="max-width: 80px;"></img>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" <?=$hide2?>>
        Home
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item" <?=$hide2?>>
        <a class="nav-link" href="<?=base_url('user');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" <?=$hide2?>>

      <!-- Heading -->
      <div class="sidebar-heading">
        Halaman
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#penjadwalan" aria-expanded="true" aria-controls="penjadwalan">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Penjadwalan</span>
        </a>
        <div id="penjadwalan" class="collapse" data-parent="#accordionSidebar">
          <div class="bg-light py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=base_url('penjadwalan/jadwal_praktik')?>"<?=$hide2?>>
              <i class="fa fa-fw fa-calendar-alt"></i> Buat Jadwal Praktikum</a>
            <a class="collapse-item" href="<?=base_url('penjadwalan')?>">
              <i class="fa fa-fw fa-calendar-plus"></i> Ajukan Jadwal</a>
            <a class="collapse-item" href="<?= base_url('penjadwalan/lihat_jaga')?>">
              <i class="fa fa-fw fa-calendar-check"></i> Hasil</a>
          </div>
        </div>
      </li>

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('user/table');?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Akun</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-gradient-<?=$color?> topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-light d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white small"><?=$this->session->userdata('nama')?></span>
                <img class="img-profile rounded-circle" src="<?=base_url('assets/img/profil/'.$this->session->userdata('npm').'.jpg')?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=base_url('user/profile');?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <div class="card shadow mb-3 mx-auto" style="max-width: 720px;">
            <div class="row no-gutters">
              <div class="col-md-4 mx-4 my-4">
                <img src="<?=base_url('assets/img/profil/'.$this->session->userdata('npm').'.jpg')?>" class="card-img" alt="...">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <form class="user" method="post" action='<?=base_url('auth/edit') ?>'>
                    <h7 class="card-title"><b>Username</b></h7>
                    <p class="card-text"><?=$this->session->userdata('uname')?></p>
                    <h7 class="card-title"><b>NPM</b></h7>
                    <p class="card-text"><?=$this->session->userdata('npm')?></p>
                    <h7 class="card-title"><b>Nama</b></h7>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" maxlength="25" minlength="5" id="nama" name='nama' placeholder="<?=$this->session->userdata('nama')?>" value=<?=set_value('nama') ?>>
                      <?= form_error('nama', '<small class="text-danger">','</small>');  ?>
                    </div>
                    <h7 class="card-title"><b>Jabatan</b></h7>
                    <p class="card-text"><?=$this->session->userdata('lvl')?></p>
                    <div class="modal-footer">
                      <a class="btn btn-secondary" type="button" href="<?=base_url('user/profile')?>">Batal</a>
                      <button type='submit' class="btn btn-primary">Submit</button>  
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->