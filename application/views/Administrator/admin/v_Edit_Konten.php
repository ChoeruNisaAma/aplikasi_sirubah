<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">EDIT KONTEN</h1>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="form-group row">
            <div class="col-sm-10">

              <?= filter_var($this->session->flashdata('message')); ?>
              <?= filter_var(form_open_multipart('Konten/edit/'.$konten['id_konten'])); ?>
                <input type="hidden" class="form-control" id="id" name="id_konten" value="<?= filter_var($konten['id_konten']); ?>">
                <div class="form-group row">
                  <strong for="konten" class="mb-1">Konten Informasi</strong>
                  <input type="text" class="form-control" id="konten" name="konten" value="<?= filter_var($konten['nama_konten']); ?>">
                  <?= filter_var(form_error('nama_konten', '<small class="text-danger pl-3">', '</small>')); ?> 
                </div>        

                <div class="form-group row">
                  <strong for="konten" class="mb-1">Isi Konten</strong>
                  <textarea class="form-control" id="isi" name="isi"><?= filter_var($konten['isi_konten']); ?></textarea>
                  <?= filter_var(form_error('isi', '<small class="text-danger pl-3">', '</small>')); ?> 
                </div>    

                <br>
                <div class="form-group row">
                  <div>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-check"></i> Simpan</button>
                    <a href="<?= filter_var(base_url('Konten/index'));?>" class="btn btn-secondary">Batal</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

