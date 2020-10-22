<body class="bg-gradient-intro">
  <div class="container">
    

    <div class="card o-hidden border-0 shadow-lg my-3 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text">
                <div class="text-left">
                   <img src="<?= filter_var(base_url())?>assets/img/sirubah.png" alt="Kecamatan Banyumanik" style="width: 150px;">
                
                <h1 class="h4 text-center text-black mb-2">Daftar Akun</h1>
                <div class="col-lg-12 col-md-12 col-xs-12 m-3">
                      <marquee onmouseover="this.stop();" onmouseout="this.start();">
                        <a href="" target="_blank" class="red"><u>Silahkan melakukan daftar akun untuk masuk ke aplikasi SIRUBAH</u></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </marquee>
                </div>
                <hr>
              </div>

              <?= filter_var(form_open_multipart('Register')); ?>
                  <div class="form-group">
                    <input type="text" class="form-control" id="nama" name="name" placeholder="Nama Lengkap" value="<?= filter_var(set_value('name')); ?>">
                    <?= filter_var(form_error('name', '<small class="text-danger text-left pl-3">', '</small>')); ?> 
                  </div>
                 

                <div class="form-group">
                  <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="<?= filter_var(set_value('nik')); ?>">
                  <?= filter_var(form_error('nik', '<small class="text-danger pl-3">', '</small>')); ?>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Kata Sandi" value="<?= filter_var(set_value('password1')); ?>">
                    <?= filter_var(form_error('password1', '<small class="text-danger pl-3">', '</small>')); ?>
                  </div>
                  <div class="col">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Kata Sandi" value="<?= filter_var(set_value('password2')); ?>">
                    <?= filter_var(form_error('password2', '<small class="text-danger pl-3">', '</small>')); ?>
                  </div>
                </div>

                <div class="form-group">
                  <div class="value">
                    <select id="Kelurahan" class="form-control" name="kelurahan" required>    
                      <option value="">Pilih Kelurahan</option>
                      <?php foreach ($kelurahan as $kelurahan) : ?>
                        <?= filter_var('<option value="' . $kelurahan["id"] . '">' . $kelurahan["nama_pengurus"] . '</option> '; )?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">RT</div>
                      </div>
                      <input type="text" class="form-control" id="rt" name="rt" placeholder="Nomor RT (ex: 1)" value="<?= filter_var(set_value('rt'));?>">
                    </div>
                    <?= filter_var(form_error('rt', '<small class="text-danger pl-3 text-left">', '</small>')); ?>
                  </div>
                  <div class="col">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">RW</div>
                      </div>
                      <input type="text" class="form-control" id="rw" name="rw" placeholder="Nomor RW (ex: 3)" value="<?= filter_var(set_value('rw'));?>">
                    </div>
                    <?= filter_var(form_error('rw', '<small class="text-danger pl-3 text-left">', '</small>')); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= filter_var(set_value('email')); ?>">
                  <?= filter_var(form_error('email', '<small class="text-danger pl-3 text-left">', '</small>')); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="no_hp" name="nohp" placeholder="Nomor HP" value="<?= filter_var(set_value('nohp')); ?>">
                  <?= filter_var(form_error('nohp', '<small class="text-danger pl-3 text-left">', '</small>')); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= filter_var(set_value('alamat')); ?>">
                  <?= filter_var(form_error('alamat', '<small class="text-danger pl-3 text-left">', '</small>')); ?>
                </div>

                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" value="<?= filter_var(set_value('image'));?>">
                    <label class="custom-file-label text-left" for="customFile">Foto KTP</label>
                    <?= filter_var(form_error('image', '<small class="text-danger pl-3 text-left">', '</small>')); ?>
                  </div>
                </div>

                <div class="form-group"></div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Buat Akun</button>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= filter_var(base_url('Auth_Masyarakat')); ?>">Sudah Punya Akun? Silahkan Masuk!</a>
                </div>
              <?= filter_var(form_close()); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

