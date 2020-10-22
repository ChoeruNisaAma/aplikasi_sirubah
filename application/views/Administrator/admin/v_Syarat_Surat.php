<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Persyaratan <?= filter_var($surat['jenis']);?></h6>
    </div>
    
      <div class="card shadow py-2 px-5">
        <div class="card mb-3" style="max-width: 720px;">
          <table class="table table-hover table-bordered table-striped my-auto">          
            <tr>
              <td><strong>Persyaratan</strong></td>
              <td><?= filter_var(nl2br(htmlspecialchars($surat['syarat'])));?></td>
            </tr>
            
            <tr>
              <td><strong>Biaya</strong></td>
              <td><?= filter_var($surat['biaya']); ?></td>
            </tr>
            
            <tr>
              <td><strong>Waktu Penyelesaian</strong></td>
              <td><?= filter_var($surat['waktu']); ?></td>
            </tr>
            
            <tr>
              <td><strong>Produk Pelayanan</strong></td>
              <td><?= filter_var($surat['produk']); ?></td>
            </tr>
          </table>
        </div>    
        <div>
          <a href="<?= filter_var(base_url('Surat/index'));?>" class="btn btn-secondary" >Kembali</a>
        </div>
      </div>
    </div>              
  </div>
<!-- End of Main Content -->