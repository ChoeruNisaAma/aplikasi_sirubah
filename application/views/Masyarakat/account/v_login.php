<body class="bg-gradient-intro">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center h-100">
      <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-4">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                <div class="text-left">
                    <img src="<?= base_url()?>assets/img/sirubah.png" alt="Kecamatan Banyumanik" style="width: 150px;">
                    <h4 class="text-center text-black">Silahkan Masuk</h4>
                  <div class="col-lg-12 col-md-12 col-xs-12 mb-1">
                      <marquee onmouseover="this.stop();" onmouseout="this.start();">
                        <a href="" target="_blank" class="red"><u>Selamat datang di aplikasi SIRUBAH Kecamatan Banyumanik, Semarang</u></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </marquee>
                </div>
                <hr>
              </div>
            </div>

            <?php echo $this->session->flashdata('message'); ?>
            <form class="form-horizontal" action="<?= base_url('Auth_Masyarakat/index'); ?>" method="post">
            
            <?= form_error('nik', '<small class="alert alert-danger">', '</small>'); ?>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" id="username" placeholder="NIK" required oninvalid="this.setCustomValidity('NIK harus diisi')" oninput="setCustomValidity('')" name="nik" value="<?= set_value('nik') ?>">
            </div>
            
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Kata Sandi" required oninvalid="this.setCustomValidity('Kata sandi harus diisi')" oninput="setCustomValidity('')" name="password" id="password">
            </div>
                
              <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-sign-in-alt"></i> Masuk </button>
              <hr>
              
              <div class="text-center">
                <a class="small" href="<?= base_url('Auth_Masyarakat/lupa_password'); ?>">Lupa Kata Sandi?</a>
              </div>
              
              <div class="text-center">
                <a class="small" href="<?= base_url('Register'); ?>">Buat Akun</a>
              </div>
            </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
