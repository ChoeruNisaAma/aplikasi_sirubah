<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">DAFTAR ADMINISTRATOR</h1>
  </div>
  <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow">
      <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7 m-3">
          <div>
              <a href="" class="btn btn-primary my-3" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus-square"></i> Tambah Akun</a>
          </div>
          <table class="table table-hover" style="width: 300px">
            <thead class="thead-light" style="font-size: 18px">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php foreach ($admin as $admin) : ?>
              <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $admin['username']; ?></td>
                <td><a class="fas fa-trash-alt" style="color:red" onClick="deleteConfirm('<?php echo base_url('Administrator/hapus/'.$admin['username'])?>')" data-toggle="modal" data-target="#hapusModal"></a></td>
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
        <h5 class="modal-title" id="tambahModalLabel">BUAT AKUN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Administrator'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="username" class="form-control" id="username" placeholder="Username" required oninvalid="this.setCustomValidity('Username harus diisi')" oninput="setCustomValidity('')"><br>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password harus diisi')" oninput="setCustomValidity('')"><br>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email harus diisi')" oninput="setCustomValidity('')"><br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah Akun</button>
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
          <a id="btn-delete" class="btn btn-primary" href="#">Oke</a>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url)
  }
</script> 