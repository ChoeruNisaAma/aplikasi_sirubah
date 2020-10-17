<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DAFTAR SURAT</h1>
  </div>

  <div class="container-fluid">
    <div class="row">
      <?php foreach ($jenis_srt as $jenis_srt) : ?>
        <div class="col-md-4 mb-4">
          <div class="card h-auto">
            <div class="card-body">
              <h6 class="card-title"><?= $jenis_srt['jenis']; ?></h6>
            </div>
            <div class="card-footer">
              <a href="<?= base_url('Pengajuan_Surat/syarat/'.$jenis_srt['id_surat']);?>"><button type="button" class="btn btn-info" id="lihat-syarat" name="syarat"> <i class="fas fa-search"></i> Lihat Persyaratan</button></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- End of Main Content -->



