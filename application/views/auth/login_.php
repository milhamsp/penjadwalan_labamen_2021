    <div class="card o-hidden col-lg-4 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="col-lg-7 mx-auto my-3">
            <center><img class="card-img rounded-circle" src="<?=base_url('assets/img/profil/'.$this->session->userdata('npm').'.jpg')?>" style="max-width: 240px"></center>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center">
              <h4 class="text-gray-900 mb-3"><?=$this->session->userdata('nama')?></h4>
            </div>
            <?=$this->session->flashdata('message')?>
            <form class="user" method="post" action='<?=base_url('auth/login'); ?>'>
              <div class="form-group">
                <input type="password" class="form-control form-control-sm" id="pass" name='pass' placeholder="Password">
                <?= form_error('pass', '<small class="text-danger">','</small>');  ?>
              </div>
              <button type='submit' class="btn btn-primary btn-sm btn-block"> Login </button> 
              <div class="text-center my-3">
                <a class="btn btn-danger btn-sm btn-block" href="<?= base_url('auth/logout'); ?>">Batal</a>
              </div>
            </form>                   
          </div>
        </div>
      </div>
    </div>
</div>