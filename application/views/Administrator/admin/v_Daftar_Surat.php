<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0">JENIS SURAT</h1>
  </div>
  <?= filter_var($this->session->flashdata('message')); ?>
    <div class="card shadow">
      <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 m-3">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col" style="font-size: 18px">No</th>
                <th scope="col" class="text-center" style="font-size: 18px">Jenis Surat</th>
                <th scope="col" class="text-center" style="font-size: 18px"></th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php foreach ($jenis_srt as $jenis_srt) : ?>
              <tr>
                <th scope="row"><?= filter_var($no); ?></th>
                <td><?= filter_var($jenis_srt['jenis']); ?></td>
                <td>
                  <a class="badge badge-info text-white" style="font-size: 13px" href="<?= filter_var(base_url('Surat/syarat/'.$jenis_srt['id_surat']));?>">Detail</a>
                  <a class="badge badge-primary text-white" style="font-size: 13px" href="<?= filter_var(base_url('Surat/edit/'.$jenis_srt['id_surat']));?>"> Edit</a>
                  <a class="badge badge-danger text-white" style="font-size: 13px" onClick="deleteConfirm('<?= filter_var(base_url('Surat/hapus/'.$jenis_srt['id_surat']));?>')" data-toggle="modal" data-target="#hapusModal"> Hapus</a>
                </td>
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