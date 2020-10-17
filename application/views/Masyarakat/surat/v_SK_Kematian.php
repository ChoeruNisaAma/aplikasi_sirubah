<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Persyaratan <?= $jenis_srt['jenis'];?></h6>
    </div>
    
      <div class="card shadow py-2 px-5">
        <div class="card mb-3" style="width: 720px;">
          <table class="table table-hover table-bordered table-striped my-auto">          
           <tr>
              <td><strong>Persyaratan</strong></td>
              <td><?= nl2br(htmlspecialchars($jenis_srt['syarat'])); ?></td>
            </tr>
            
            <tr>
              <td><strong>Biaya</strong></td>
              <td><?= $jenis_srt['biaya']; ?></td>
            </tr>
            
            <tr>
              <td><strong>Waktu Penyelesaian</strong></td>
              <td><?= $jenis_srt['waktu']; ?></td>
            </tr>
            
            <tr>
              <td><strong>Produk Pelayanan</strong></td>
              <td><?= $jenis_srt['produk']; ?></td>
            </tr>
          </table> 
        </div>

         <form  role="form" class="kirim_surat">
          <h6 class="mb-3 font-weight-bold">Untuk mengajukan permohonan surat keterangan Kematian, silahkan lengkapi berkas berikut!</h6>
          <div class="pesan_error"></div>

           <div class="form-group row">
              <label class="col-sm-2 col-form-label">Scan Kartu Keluarga</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="image1" name="image1">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_image1">Unggah Berkas</label>
                  <?= form_error('image1', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
            </div>   

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Scan KTP</label>
                <div class="col-5 px-1">
                  <input type="file" class="custom-file-input" id="berkas1" name="berkas1">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_berkas1">Unggah Berkas</label>
                  <label class="label">*Hanya diisi ketika orang yang meninggal sudah memiliki KTP</label> 
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Scan Surat Nikah</label>
                <div class="col-5 px-1">
                  <input type="file" class="custom-file-input" id="berkas2" name="berkas2">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_berkas2">Unggah Berkas</label>
                  <label class="label">*Hanya diisi ketika orang yang meninggal sudah menikah </label> 
                </div>
            </div> 

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Scan SK Kematian</label>
                <div class="col-5 px-1">
                  <input type="file" class="custom-file-input" id="berkas3" name="berkas3">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_berkas3">Unggah Berkas</label>
                  <label class="label">*Hanya diisi bilamana meninggal di Rumah Sakit</label> 
                </div>
            </div> 

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Keterangan</label>
                <div>
                  <textarea style="width: 510px" class="form-control" id="keterangan" name="keterangan" required oninvalid="this.setCustomValidity('Deskripsi tujuan harus diisi')" oninput="setCustomValidity('')"></textarea>
                  <label class="label">Berisi Deskripsi tujuan permohonan</label>
                  <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?> 
              </div>
            </div> 

          <input type="text" id="controller" hidden value="sk_kematian">
          <div>  
            <button type="submit" class="btn btn-success mb-3" id="lihat-syarat" name="syarat">Ajukan Permohonan</button>
            <a href="<?= base_url('Pengajuan_surat/index')?>" class="btn btn-secondary mb-3">Kembali</a>
          </div>
        </form>
        </div>
      </div>
    </div>
    </div>              
  </div>
</div>
<!-- End of Main Content --