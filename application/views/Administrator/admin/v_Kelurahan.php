<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">DAFTAR KELURAHAN</h1>
  </div>
  
  <?= filter_var($this->session->flashdata('message')); ?>
  <div class="card shadow">
    <div class="container-fluid">
      <div class="row">
        <div class="col m-3">
          <div>
            <a href="" class="btn btn-primary my-3" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus-square"></i> Tambah Kelurahan</a>
          </div>
            
          <table class="table table-hover my-3" style="font-size: 18px">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kelurahan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kontak</th>
                <th scope="col">Username</th>
                <!-- <th scope="col">Profil</th> -->
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
                <?php foreach ($instansi as $instansi) : ?>
                <tr>
                  <th scope="row"><?= filter_var($no); ?></th>
                  <td><?= filter_var($instansi['nama_pengurus']); ?></td>
                  <td><?= filter_var($instansi['lokasi']); ?></td>
                  <td><?= filter_var(nl2br(htmlspecialchars($instansi['kontak']))); ?></td>
                  <td><?= filter_var($instansi['username']); ?></td>
                  <!-- <td><img style="width: 150px" src="data:image/jpeg;base64,<?=base64_encode($instansi['foto']);?>"></td> -->
                  <td><a class="fas fa-trash-alt" style="color:red" onClick="deleteConfirm('<?= filter_var(base_url('Kelurahan/hapus/'.$instansi['id_kelurahan']));?>')" data-toggle="modal" data-target="#hapusModal"></a></td>
                </tr>
                <?php $no++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">DATA KELURAHAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Kelurahan'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="instansi" class="form-control" id="instansi" placeholder="Nama Kelurahan" required oninvalid="this.setCustomValidity('Nama Kelurahan harus diisi')" oninput="setCustomValidity('')"><br>
            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat Kelurahan harus diisi')" oninput="setCustomValidity('')"><br>
            <input type="kontak" name="kontak" class="form-control" id="kontak" placeholder="Kontak" required oninvalid="this.setCustomValidity('Kontak Kelurahan harus diisi')" oninput="setCustomValidity('')"><br>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email Kelurahan harus diisi')" oninput="setCustomValidity('')"><br>
            <input type="text" name="username" class="form-control" id="username" placeholder="Nama Akun" required oninvalid="this.setCustomValidity('Username harus diisi')" oninput="setCustomValidity('')"><br>
            <input type="password" name="password" class="form-control" id="password" placeholder="Kata Sandi" required oninvalid="this.setCustomValidity('Password harus diisi')" oninput="setCustomValidity('')"><br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

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
          <a id="btn-delete"class="btn btn-primary" href="#">Oke</a>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url)
    }
  </script> 
 