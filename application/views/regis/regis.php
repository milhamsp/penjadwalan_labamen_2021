    <div class="card o-hidden border-left-info col-lg-4 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-4">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Daftar</h1>
              </div>
              <form class="user" method="post" action='<?=base_url('auth/registration') ?>'>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" maxlength="10" minlength="3" id="uname" name='uname' placeholder="Username, terdiri dari 3-10 karakter" value=<?=set_value('uname') ?>>
                  <?= form_error('uname', '<small class="text-danger">','</small>');  ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" maxlength="25" minlength="5" id="nama" name='nama' placeholder="Nama, terdiri dari 5-25 karakter" value=<?=set_value('nama') ?>>
                  <?= form_error('nama', '<small class="text-danger">','</small>');  ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" maxlength="10" minlength="5" id="lvl" name='lvl' placeholder="Jabatan: 'Admin', 'Asisten', 'Programmer'" value=<?=set_value('lvl') ?>>
                  <?= form_error('lvl', '<small class="text-danger">','</small>');  ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" maxlength="8" minlength="8" id="npm" name='npm' placeholder="NPM, terdiri dari 8 karakter" value=<?=set_value('npm') ?>>
                  <?= form_error('npm', '<small class="text-danger">','</small>');  ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" maxlength="32" minlength="4" id="pass" name='pass' placeholder="Password, terdiri dari min. 4 karakter">
                  <?= form_error('pass', '<small class="text-danger">','</small>');  ?>
                </div>
                <button type='submit' class="btn btn-primary btn-user btn-block"> Submit </button> 
                <div class="text-center my-3">
                  <a href="<?= base_url('auth'); ?>">Login</a>
                </div>
              </form>                   
            </div>
          </div>
        </div>
      </div>
    </div>
</div>