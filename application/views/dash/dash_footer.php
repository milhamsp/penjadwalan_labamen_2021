        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; M Ilham S <?=date('Y');?></span><br><br>
            <span>
              <img src="<?=base_url('assets/img/logo/ug.png')?>" style="max-width: 80px;">
              <img src="<?=base_url('assets/img/logo/logo4.png')?>" style="max-width: 240px;">
            </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik "Logout" untuk mengakhiri sesi anda.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" type="button" href="<?=base_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="mod-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user" method="post" action='<?=base_url('table/add') ?>'>
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" maxlength="10" minlength="3" id="uname" name='uname' placeholder="Username, terdiri dari 3-10 karakter" value=<?=set_value('uname') ?>>
                    <?= form_error('uname', '<small class="text-danger">','</small>');  ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" maxlength="25" minlength="5" id="nama" name='nama' placeholder="Nama, terdiri dari 5-25 karakter" value=<?=set_value('nama') ?>>
                    <?= form_error('nama', '<small class="text-danger">','</small>');  ?>
            </div>
            <div class="form-group mx-1">Jabatan:  
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="lvl" id="lvl" value="Admin">
                <label class="form-check-label" for="lvl">Admin</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="lvl" id="lvl" value="Asisten">
                <label class="form-check-label" for="lvl">Asisten</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="lvl" id="lvl" value="Programmer">
                <label class="form-check-label" for="lvl">Programmer</label>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" maxlength="8" minlength="8" id="npm" name='npm' placeholder="NPM, terdiri dari 8 karakter" value=<?=set_value('npm') ?>>
                    <?= form_error('npm', '<small class="text-danger">','</small>');  ?>
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-sm" maxlength="32" minlength="4" id="pass" name='pass' placeholder="Password, terdiri dari min. 4 karakter">
                    <?= form_error('pass', '<small class="text-danger">','</small>');  ?>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-secondary" href="" data-dismiss="modal">Batal</a>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="mod-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Hapus Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user" method="post" action='<?=base_url('table/del') ?>'>
            <div class="form-group">
              <label>Masukkan Username: </label>
              <input type="text" class="form-control form-control-sm" maxlength="10" minlength="3" id="uname" name='uname' placeholder="Username, terdiri dari 3-10 karakter" value=<?=set_value('uname') ?>>
                    <?= form_error('uname', '<small class="text-danger">','</small>');  ?>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-secondary" href="" data-dismiss="modal">Batal</a>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="mod-reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reset Data?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">Yakin ingin menghapus semua data inputan pada Jadwal Kuliah & Praktikum?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" type="button" href="<?=base_url('penjadwalan/reset');?>">Konfirmasi</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>
  <script src="<?=base_url('assets/')?>js/demo/datatables-demo.js"></script>
  
  <script type="text/javascript">
    var tableToExcel = (function() {
          var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
          return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
          }
        })()
</script> 
</body>

</html>
