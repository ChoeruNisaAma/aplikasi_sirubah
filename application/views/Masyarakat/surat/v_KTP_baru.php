<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Persyaratan <?= filter_var($jenis_srt['jenis']);?></h6>
    </div>
    
      <div class="card shadow py-2 px-5">
        <div class="card mb-3" style="width: 720px;">
          <table class="table table-hover table-bordered table-striped my-auto">          
            <tr>
              <td><strong>Persyaratan</strong></td>
              <td><?= filter_var(nl2br(htmlspecialchars($jenis_srt['syarat']))); ?></td>
            </tr>
            
            <tr>
              <td><strong>Biaya</strong></td>
              <td><?= filter_var($jenis_srt['biaya']); ?></td>
            </tr>
            
            <tr>
              <td><strong>Waktu Penyelesaian</strong></td>
              <td><?= filter_var($jenis_srt['waktu']); ?></td>
            </tr>
            
            <tr>
              <td><strong>Produk Pelayanan</strong></td>
              <td><?= filter_var($jenis_srt['produk']); ?></td>
            </tr>
          </table> 
        </div>

         <form  role="form" class="kirim_surat">
          <h6 class="mb-3 font-weight-bold">Untuk mengajukan permohonan surat KTP baru, silahkan lengkapi berkas berikut!</h6>
          <div class="pesan_error"></div>

           <div class="form-group row">
              <label class="col-sm-2 col-form-label">Scan Kartu Keluarga</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="image1" name="image1">
                  <label class="custom-file-label" for="customFile" id="label_image1" style="width: 510px">Unggah Berkas</label>
                  <?= filter_var(form_error('image1', '<small class="text-danger pl-3">', '</small>')); ?> 
                </div>
            </div> 

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Scan SK Kehilangan</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="berkas" name="berkas1">
                  <label class="custom-file-label" for="customFile" id="label_berkas" style="width: 510px">Unggah Berkas</label>
                   <label class="label" style="width: 510px">*Hanya diisi ketika mengajukan permohonan KTP karena kehilangan</label> 
                </div>
            </div>   

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Keterangan</label>
                <div>
                  <textarea style="width: 510px" class="form-control" id="keterangan" name="keterangan" required oninvalid="this.setCustomValidity('Deskripsi tujuan harus diisi')" oninput="setCustomValidity('')"></textarea>
                  <label class="label">*Berisi Deskripsi tujuan permohonan</label>
                  <?= filter_var(form_error('keterangan', '<small class="text-danger pl-3">', '</small>')); ?> 
              </div>
            </div> 

          <input type="text" id="controller" hidden value="ktp_baru">
          <div>  
            <button type="submit" class="btn btn-success mb-3" id="lihat-syarat" name="syarat">Ajukan Permohonan</button>
            <a href="<?= filter_var(base_url('Pengajuan_surat/index'));?>" class="btn btn-secondary mb-3">Kembali</a>
          </div>
        </form>
        </div>
      </div>
    </div>
    </div>              
  </div>
</div>
<!-- End of Main Content --