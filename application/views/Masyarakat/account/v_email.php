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
                      <img src="<?= filter_var(base_url())?>assets/img/sirubah.png" alt="Kecamatan Banyumanik" style="width: 150px;">
                      <h4 class="text-center text-black">Reset Kata Sandi</h4>
                      <hr>
                    </div>
                  </div>


                  <?= filter_var($this->session->flashdata('message')); ?>
                  <form class="form-signin" action="<?= filter_var(base_url('Auth_Masyarakat/lupa_password'));?>" method="post">
                  <?= filter_var(form_error('email', '<small class="text-danger">', '</small>')); ?>
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-user" id="email" placeholder="Alamat Email" name="email" value="<?= filter_var(set_value('email'));?>">
                  </div>
                   

                    <button type="submit" class="btn btn-primary btn-user btn-block">Kirim</button>
                    <hr>

                    <div class="text-center">
                      <a class="small" href="<?= filter_var(base_url('Auth_Masyarakat/index'));?>">Kembali ke Halaman Masuk</a>
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
