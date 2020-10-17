<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">EDIT PROFIL</h1>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="form-group row">
            <div class="col-sm-10">
              
              <?= form_open_multipart('Profil_Masyarakat/edit');?>
                <div class="form-group row">
                  <strong for="nik" class="col-sm-2 col-form-label">NIK</strong>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['nik']; ?>" readonly>
                    </div>        
                </div>

                <div class="form-group row">
                  <strong for="nama" class="col-sm-2 col-form-label">Nama Lengkap</strong>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>        
                </div>   

                <div class="form-group row">
                  <strong for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</strong>
                  <div class="col-sm-8">
                    <div class="value">
                      <select id="kelurahan" class="form-control" id="kelurahan" name="kelurahan">    
                        <?php foreach ($kelurahan as $kelurahan) : ?>
                          <option value="<?= $kelurahan['id'] ?>"<?php if($user['kelurahan'] == $kelurahan['id']){echo "selected";}?>><?= $kelurahan['nama_pengurus']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <strong for="rt" class="col-sm-2 col-form-label">Nama RT</strong>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="rt" name="rt" value="<?= $user['nama_rt']; ?>">
                    <?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>        
                </div> 
                
                <div class="form-group row">
                  <strong for="rw" class="col-sm-2 col-form-label">Nama RW</strong>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="rw" name="rw" value="<?= $user['nama_rw']; ?>">
                    <?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>        
                </div>

                <div class="form-group row">
                  <strong for="email" class="col-sm-2 col-form-label">Email</strong>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email_msy']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>        
                </div>

                <div class="form-group row">
                  <strong for="nohp" class="col-sm-2 col-form-label">No Hp</strong>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $user['no_hp']; ?>">
                    <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>        
                </div>

                <div class="form-group row">
                  <strong for="nohp" class="col-sm-2 col-form-label">Alamat</strong>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>        
                </div>

                <div class="form-group row">
                  <strong for="file1" class="col-sm-2 col-form-label">Foto Profil</strong>
                  <div class="col-sm-8">
                    <div class="row">
                      <div class="col-sm-4">
                        <img src="<?= base_url('assets/img/profil/'). $user['profil']?>" class="img-thumbnail">
                      </div>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="image" name="image">
                          <label class="custom-file-label" for="image">Upload Foto</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <br><br>
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  
                </div>
                <div class="form-group row">
                  <div class="col">
                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-check mx-1"></i>Simpan</button>
                    <a href="<?= base_url('Profil_Masyarakat/myprofil')?>" class="btn btn-secondary">Batal</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

