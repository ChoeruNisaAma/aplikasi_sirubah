<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">EDIT SURAT</h1>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="form-group row">
            <div class="col-sm-10">

              <?= $this->session->flashdata('message'); ?>
              <?= form_open_multipart('Surat/edit/'.$surat['id_surat']); ?>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $surat['id_surat']; ?>">
                <div class="form-group row">
                  <strong for="jenis" class="col-sm-2 col-form-label">Jenis Surat</strong>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="jenis" name="jenis" value="<?= filter_var($surat['jenis']); ?>">
                      <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?> 
                  </div>
                </div>        

                <div class="form-group row">
                  <strong for="syarat" class="col-sm-2 col-form-label">Persyaratan</strong>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="syarat" name="syarat"><?= filter_var($surat['syarat']); ?></textarea>
                      <?= form_error('syarat', '<small class="text-danger pl-3">', '</small>'); ?> 
                  </div>
                </div>        

                <div class="form-group row">
                  <strong for="biaya" class="col-sm-2 col-form-label">Biaya</strong>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="biaya" name="biaya" value="<?= filter_var($surat['biaya']); ?>">
                      <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>'); ?> 
                  </div>
                </div> 

                <div class="form-group row">
                  <strong for="waktu" class="col-sm-2 col-form-label">Waktu Penyelesaian</strong>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="waktu" name="waktu" value="<?= filter_var($surat['waktu']); ?>">
                      <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?> 
                  </div>
                </div> 

                <div class="form-group row">
                  <strong for="produk" class="col-sm-2 col-form-label">Produk Pelayanan</strong>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="produk" name="produk"><?= filter_var($surat['produk']); ?></textarea>
                      <?= filter_var(form_error('produk', '<small class="text-danger pl-3">', '</small>')); ?> 
                  </div>
                </div>     
                <br>
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  
                </div>
                <div class="form-group row">
                  <div class="col">
                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-check mx-1"></i> Simpan</button>
                    <a href="<?= base_url('Surat')?>" class="btn btn-secondary">Batal</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

