    <div class="card o-hidden col-lg-4 mx-auto bg-gradient-link">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="col-lg-7 mx-auto my-3">
            <center><img class="card-img" src="<?=base_url('assets/img/logo/logo.png')?>" style="max-width: 240px;"></center>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-3">Selamat Datang!</h1>
            </div>
            <?=$this->session->flashdata('message')?>
            <form class="user" method="post" action='<?=base_url('auth'); ?>'>
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" id="uname" name='uname' placeholder="Username" value=<?=set_value('uname') ?>>
                <?= form_error('uname', '<small class="text-danger">','</small>');  ?>
              </div>
              <button type='submit' class="btn btn-primary btn-sm btn-block mb-3"> Berikutnya </button> 
              <!--<div class="text-center my-3">
                <a href="<?= base_url('auth/registration'); ?>">Register</a>
              </div>-->
            </form>                   
          </div>
        </div>
      </div>
    </div>
</div>