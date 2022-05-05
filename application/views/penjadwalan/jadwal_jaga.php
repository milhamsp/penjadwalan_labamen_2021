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
      <li class="nav-item <?=$state?>">
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
      <li class="nav-item" <?=$hide1?>>
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
                <nav class="navbar navbar-expand navbar-light bg-gradient-<?= $color ?> topbar mb-4 static-top shadow">

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
                                <span class="mr-2 d-none d-lg-inline text-white small"><?= $this->session->userdata('nama') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profil/' . $this->session->userdata('npm') . '.jpg') ?>">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user/profile'); ?>">
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
                        <h1 class="h3 mb-0 text-gray-800">Atur Jadwal</h1>
                    </div>
                    <div class="card shadow mb-4 mx-auto" style="max-width: 896px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-<?= $color ?>">Jadwal Jaga</h6>
                        </div>
                        <div class="row">
                            <div class="mx-4">
                                <div class="card-body">
                                  <?php
                                    if($this->session->userdata('lvl')=='Admin'):
                                      echo $this->session->flashdata('jaga');?>
                                      <a class="btn btn-info mb-3 float-right" type="button" id="btnExport" onclick="tableToExcel('tbl_jaga')">
                                        <span class="text-light"><i class="fa fa-fw fa-download"></i> Export</span></a>
                                      </a>
                                      <a class="btn btn-danger mb-3 mx-3 float-right" type="button" data-toggle="modal" data-target="#mod-reset">
                                        <span class="text-light"><i class="fa fa-fw fa-ban"></i> Reset</span></a>
                                      </a>;
                                  <?php endif ?>
                                    <form class="user" method="post" action='<?= base_url('penjadwalan/submit_praktik') ?>'>
                                        <table class="table table-xl table-responsive table-bordered table-dark" id="tbl_jaga">
                                            <thead>
                                                <tr class="table-active">
                                                    <th scope="col" class="text-center">Shift</th>
                                                    <th scope="col" class="text-center">Senin</th>
                                                    <th scope="col" class="text-center">Selasa</th>
                                                    <th scope="col" class="text-center">Rabu</th>
                                                    <th scope="col" class="text-center">Kamis</th>
                                                    <th scope="col" class="text-center">Jumat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach (array(1, 2, 3, 4) as $shift) : ?>
                                                    <tr>
                                                        <th scope="row" class="table-dark">Shift <?= $shift ?></th>
                                                        <?php foreach (array('senin', 'selasa', 'rabu', 'kamis', 'jumat') as $day) :
                                                            $qcall = 'select nama from akun where npm in(select jadwal_kuliah.npm from jadwal_praktik inner join jadwal_kuliah on jadwal_kuliah.'.$day.'_s'.$shift.'=jadwal_praktik.'.$day.'_s'.$shift.')order by level';
                                                            $call=$this->db->query($qcall);
                                                        ?>
                                                            <td class="table-active">
                                                                <?php 
                                                                $tab_col= array('primary','secondary','danger','warning','success','info');
                                                                shuffle($tab_col);
                                                                $done=0;
                                                                foreach($tab_col as $row_col):
                                                                    $done=1;
                                                                ?>
                                                                <div class="table table-<?=$row_col?>">
                                                                <?php if($done==1){
                                                                    break;
                                                                    }endforeach;?>
                                                                    <div class="text-center">
                                                                        <?php foreach($call->result_array() as $isian) :
                                                                            $panggil = $isian['nama'];
                                                                            if($panggil==$this->session->userdata('nama')){
                                                                                echo '<strong>'.$panggil.'</strong><br>';
                                                                            }else{
                                                                                echo $panggil.'<br>';
                                                                            }
                                                                        endforeach;?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->