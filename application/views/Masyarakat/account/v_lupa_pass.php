<body class="bg-gradient-custom">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center h-100">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <div class="text-left">
                      <img src="<?= base_url()?>assets/img/sirubah.png" alt="Kecamatan Banyumanik" style="width: 150px;">
                      <h4 class="text-center text-black">Reset Kata Sandi</h4>
                    </div>
                    <h5><?= $this->session->userdata('email'); ?></h5>
                  </div>
                  <hr>

                  <?= $this->session->flashdata('message'); ?>
                  <form class="form-signin" action="<?= base_url('Auth_masyarakat/changePassword'); ?>" method="post">
                  
                  <?= form_error('password1', '<small class="alert alert-warning" pl-10>', '</small>'); ?>
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Kata Sandi" name="password1" id="password1">
                  </div>

                  <?= form_error('password2', '<small class="alert alert-warning" pl-10>', '</small>'); ?>
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" name="password2" id="password2">
                  </div>
                    <hr>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Ganti Kata Sandi
                    </button>                    
      
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
