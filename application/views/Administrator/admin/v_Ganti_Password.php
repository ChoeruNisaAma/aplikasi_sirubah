<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="form-group row">
            <div class="col-sm-10">

              <div class="row">
                <div class="col-lg-6">
                  <?= filter_var($this->session->flashdata('message')); ?>
                  <form action="<?= filter_var(base_url('Password_admin')); ?>" method="post">
                    <div class="form-group">
                      <strong for="password" class="mb-1">Kata Sandi lama</strong>
                      <input type="password" name="password" class="form-control" id="password">
                      <?= filter_var(form_error('password', '<small class="text-danger pl-3">', '</small>')); ?>
                    </div>
                    <div class="form-group">
                      <strong for="password" class="mb-1">Kata Sandi Baru</strong>
                      <input type="password" name="password1" class="form-control" id="password">
                      <?= filter_var(form_error('password1', '<small class="text-danger pl-3">', '</small>')); ?>
                    </div>
                    <div class="form-group">
                      <strong for="password" class="mb-1">Ulangi Kata Sandi</strong>
                      <input type="password" name="password2" class="form-control" id="password">
                      <?= filter_var(form_error('password2', '<small class="text-danger pl-3">', '</small>')); ?>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success"><i class="fas fa-check mx-1"></i>Simpan</button>
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
</div>

      <!-- End of Main Content -->
