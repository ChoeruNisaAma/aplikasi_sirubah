<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">TAMBAH KONTEN INFORMASI</h1>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="form-group row">
            <div class="col-sm-8">
              
              <?= filter_var(form_open_multipart('Konten/add'));?>
                <div class="form-group row">
                  <strong for="konten" class="mb-1">Konten Informasi</strong>
                  <input type="text" class="form-control" id="konten" name="konten" placeholder="Judul konten" required oninvalid="this.setCustomValidity('Judul konten harus diisi')" oninput="setCustomValidity('')" value="<?= filter_var(set_value('konten')); ?>">
                </div>        

                <div class="form-group row">
                  <strong for="konten" class="mb-1">Isi Konten</strong>
                  <textarea class="form-control" id="isi" name="isi" placeholder="Berisi deskripsi konten" required oninvalid="this.setCustomValidity('Deskripsi konten harus diisi')" oninput="setCustomValidity('')" value="<?= filter_var(set_value('isi')); ?>"></textarea>
                </div>        

              <div class="form-group row">
                <button type="submit" name="submit" class="btn btn-success" style="margin: 3px"><i class="fas fa-check"></i> Simpan</button>
                <a href="<?= filter_var(base_url('Konten/index'));?>" style="margin: 3px" class="btn btn-secondary">Batal</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

