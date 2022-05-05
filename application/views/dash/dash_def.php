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
      <li class="nav-item <?=$state?>" <?=$hide2?>>
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">Admin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          $this->db->like('level', 'Admin');
                          $this->db->from('akun');
                          echo $this->db->count_all_results();
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">Asisten</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          $this->db->like('level', 'Asisten');
                          $this->db->from('akun');
                          echo $this->db->count_all_results();
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-graduate fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">Programmer</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          $this->db->like('level', 'Programmer');
                          $this->db->from('akun');
                          echo $this->db->count_all_results();
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-secret fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">Belum Penjadwalan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          echo $cek;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6 mb-4">
              <!--Benchmark-->
              <div class="card border-left-danger shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-dark">Data yang belum mengajukan Jadwal</h6>
                </div>
                <div class="card-body">
                  <p class='text-dark'>
                    <?='Selamat Datang '.$this->session->userdata('nama').', anda masuk sebagai Admin.<br>Berikut data yang belum melakukan penjadwalan:';?>
                    <table class="table table-xl shadow table-bordered table-hover" id="dataTable">
                      <thead>
                        <tr class="table-active">
                          <th scope="col" class="text-center">Nama</th>
                          <th scope="col" class="text-center">Login Terakhir</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($cek2->result_array() as $hsl):
                        ?>
                        <tr>
                          <td><?=$hsl['nama'];?></td>
                          <td><?=$hsl['login_terakhir'];?></td>
                        </tr>
                        <?php
                          endforeach;
                        ?>
                      </tbody>
                    </table>
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->