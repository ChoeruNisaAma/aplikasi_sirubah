<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">KONTEN INFORMASI</h1>
  </div>

  <?php echo $this->session->flashdata('message'); ?>
    <!-- Illustrations -->
    <div>
      <a href="<?= base_url('Konten/add');?>" class="btn btn-primary"><i class="fas fa-plus-square"></i> Tambah Konten</a>
    </div>
    <br>

    <?php foreach ($konten as $konten) : ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= $konten['nama_konten']; ?></h6>
        </div>

        <div class="card-body">
          <p align="justify"><?= nl2br(htmlspecialchars($konten['isi_konten'])); ?></p>
        </div>


        <div class="card-footer">
          <a href="<?= base_url('Konten/edit/'.$konten['id_konten']);?>"><button type="button" class="btn btn-primary" id="edit" name="edit"> <i class="fas fa-edit"></i> Edit</button></a>
          <a data-toggle="modal" data-target="#hapusModal"><button type="button" class="btn btn-danger" id="hapus" name="hapus"> <i class="fas fa-trash-alt"></i> Hapus</button></a>
        </div>
      </div>   
    <?php endforeach; ?>     
</div>
<!-- End of Main Content -->

<!-- hapus Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Yakin Ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Menghapus data mungkin menyebabkan perubahan sistem, pilih "Oke" untuk melanjutkan </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?= base_url('Konten/hapus/'.$konten['id_konten'])?>">Oke</a>
      </div>
    </div>
  </div>
</div>