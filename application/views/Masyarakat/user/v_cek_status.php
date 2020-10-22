
<div class="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
      <h1 class="h3 text-black-800">STATUS PERMOHONAN</h1>
    </div>

    <?= filter_var($this->session->flashdata('message')); ?>
    <!-- Tabs -->
    <div class="card">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"> 
          <a class="nav-link active" data-toggle="tab" href="#permohonan_diajukan" role="tab">
          <span class="hidden-sm-up"></span> 
          <span class="hidden-xs-down">Permohonan Diajukan</span></a> 
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#permohonan_ditolak" role="tab">
          <span class="hidden-sm-up"></span>
          <span class="hidden-xs-down">Permohonan Ditolak</span></a> 
        </li>
        
        <li class="nav-item"> 
          <a class="nav-link" data-toggle="tab" href="#permohonan_selesai" role="tab">
          <span class="hidden-sm-up"></span>
          <span class="hidden-xs-down">Permohonan Selesai</span></a> 
        </li>
      </ul>


      <!-- Tab panes -->
      <div class="tab-content tabcontent-border">
       
        <div class="tab-pane active" id="permohonan_diajukan" role="tabpanel">
          <div class="card-body">
            <div class="page-wrapper">
              <thead class="thead-light">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Jenis Surat</th>
                      <th scope="col">Tujuan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>

                  <tbody> 
                    <?php $no=1; ?>
                      <?php foreach ($surat_masuk as $surat_masuk) : ?>
                        <tr>
                          <th scope="row"><?= filter_var($no); ?></th>
                          <td><?= filter_var($surat_masuk['tanggal']); ?></td>
                          <td><?= filter_var($surat_masuk['jenis']); ?></td>
                          <td><?= filter_var($surat_masuk['keterangan']);?></td>
                          <td><?= filter_var($surat_masuk['status']); ?></td>
                          <td><?= filter_var($surat_masuk['komentar']); ?></td>
                          <td> 
                            <a class="fas fa-trash-alt" style="color:red" onClick="deleteConfirm('<?= filter_var(base_url('pengajuan_surat/hapus_pengajuan/'.$surat_masuk['id_surat_masuk']));?>')" data-toggle="modal" data-target="#hapusModal"></a>
                          </td>  
                        </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </thead>
            </div>
          </div>
        </div>


        <!-- Tab panes -->
        <div class="tab-pane" id="permohonan_ditolak" role="tabpanel">
          <div class="card-body">
            <div class="page-wrapper">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis Surat</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $noo=1; ?>
                    <?php foreach ($surat_ditolak as $surat_ditolak) : ?>
                      <tr>
                        <th scope="row"><?= filter_var($noo); ?></th>
                        <td><?= filter_var($surat_ditolak['tanggal']); ?></td>
                        <td><?= filter_var($surat_ditolak['jenis']); ?></td>
                        <td><?= filter_var($surat_ditolak['keterangan']);?></td>
                        <td><?= filter_var($surat_ditolak['status']); ?></td>
                        <td><?= filter_var($surat_ditolak['komentar']); ?></td>
                        <td> 
                          <a class="fas fa-trash-alt" style="color:red" onClick="deleteConfirm('<?= filter_var(base_url('pengajuan_surat/hapus_pengajuan/'.$surat_ditolak['id_surat_masuk']));?>')" data-toggle="modal" data-target="#hapusModal"></a>
                        </td>
                      </tr>
                    <?php $noo++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <!-- Tab panes -->
        <div class="tab-pane  p-20" id="permohonan_selesai" role="tabpanel">
          <div class="p-20">
            <div class="card-body">
              <div class="page-wrapper">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Jenis Surat</th>
                      <th scope="col">Tujuan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Keterangan</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $nooo=1; ?>
                      <?php foreach ($surat_selesai as $surat_selesai) : ?>
                        <tr>
                          <th scope="row"><?= filter_var($nooo); ?></th>
                          <td><?= filter_var($surat_selesai['tanggal']); ?></td>
                          <td><?= filter_var($surat_selesai['jenis']); ?></td>
                          <td><?= filter_var($surat_selesai['keterangan']); ?></td>
                          <td><?= filter_var($surat_selesai['status']); ?></td>
                          <td><?= filter_var($surat_selesai['komentar']); ?></td>
                        </tr>
                      <?php $nooo++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
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
