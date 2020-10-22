<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Persyaratan <?= filter_var($jenis_srt['jenis']);?></h6>
    </div>
    
      <div class="card shadow py-2 px-5">
        <div class="card mb-3" style="max-width: 830px;">
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
          <h6 class="mb-3 font-weight-bold">Untuk mengajukan permohonan surat Keterangan Menikah, silahkan lengkapi berkas berikut!</h6>
          <div class="pesan_error"></div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan Surat Pernyataan</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="image1" name="image1">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_image1">Unggah Berkas</label>
                  <label class="label">*Surat Pernyataan dari Kelurahan dapat diunduh <a href="<?= filter_var(base_url().'Pengajuan_surat/download_sp_nikah'); ?>">disini</a></label> 
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan KK Mempelai Pria</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="image2" name="image2">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_image12">Unggah Berkas</label>
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan KK Mempelai Wanita</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="image3" name="image3">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_image3">Unggah Berkas</label>
                </div>
            </div>

           <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan KTP Mempelai Pria</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="image4" name="image4">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_image1">Unggah Berkas</label>
                </div>
            </div>  

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan KTP Mempelai Wanita</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="image5" name="image5">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_image1">Unggah Berkas</label>
                </div>
            </div>   

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan Akta Kematian/Akta Cerai</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="berkas1" name="berkas1">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_berkas1">Unggah Berkas</label>
                  <label class="label">*Berkas hanya diisi ketika mempelai duda </label> 
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan Akta Kematian/Akta Cerai</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="berkas2" name="berkas2">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_berkas2">Unggah Berkas</label>
                  <label class="label">*Berkas hanya diisi ketika mempelai janda </label> 
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan Foto Mempelai Pria</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="berkas3" name="berkas3">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_berkas3">Unggah Berkas</label>
                  <label class="label">*untuk mempelai pria yang beragama Islam</label> 
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan Foto Mempelai Wanita</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="berkas4" name="berkas4">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_berkas4">Unggah Berkas</label>
                  <label class="label">*Untuk mempelai wanita yang beragama Islam</label> 
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Scan Foto Mempelai</label>
                <div class="col-5">
                  <input type="file" class="custom-file-input" id="berkas5" name="berkas5">
                  <label style="width: 510px" class="custom-file-label" for="customFile" id="label_berkas5">Unggah Berkas</label>
                  <label class="label">*Diisi Untuk Mempelai Non Muslim </label> 
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Keterangan</label>
                <div>
                  <textarea style="width: 510px" class="form-control" id="keterangan" name="keterangan" required oninvalid="this.setCustomValidity('Deskripsi tujuan harus diisi')" oninput="setCustomValidity('')"></textarea>
                  <label class="label">Berisi Deskripsi tujuan permohonan</label>> 
              </div>
            </div> 

          <input type="text" id="controller" hidden value="sk_nikah">
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