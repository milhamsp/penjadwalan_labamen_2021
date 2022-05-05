      <footer class="sticky-footer bg-white my-5">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a data-toggle="modal" data-target="#mod-about">M Ilham S</a> <?=date('Y');?></span><br><br>
            <span>
              <img src="<?=base_url('assets/img/logo/ug.png')?>" style="max-width: 80px;">
              <img src="<?=base_url('assets/img/logo/logo4.png')?>" style="max-width: 240px;">
            </span>
          </div>
        </div>
      </footer>
      <div class="modal fade" id="mod-about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tentang</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <img src="<?=base_url('assets/img/logo/ug.png')?>" style="max-width: 80px;"><hr>
              Aplikasi Penjadwalan untuk Asisten dan Programmer Laboratorium Akuntansi Menengah Universitas Gunadarma Berbasis Website merupakan aplikasi yang dibangun dengan tujuan untuk memudahkan Admin Laboratorium dalam membuat dan mengatur jadwal dari setiap Asisten dan Programmer agar tidak saling bertabrakan atau berhalangan hadir pada saat Praktikum<hr>Dibuat oleh: Muhammad Ilham Syahputra</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

 <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/')?>js/sb-admin-2.min.js"></script>

</body>

</html>
