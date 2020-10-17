<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">PROFIL</h1>
    </div>
    
    <div class="row">
        <div class="col">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    </div>
    
	<div class="card shadow mb-4 py-4">				
		<div class="row">
	    	<div class="col-4" style="text-align: center;">
	    		<div style="margin-bottom: 15px;">
	        		<img class="img-profile rounded-circle" src="<?= base_url('assets/img/profil/').$user['profil']?>" alt="Foto" style="height: 250px; width: 250px;">
	    		</div>
				
				<strong style="font-size: 30px"><?= $user['nama'];?></strong>		
				<div style="font-size: 20px">NIK. <?= $user['nik']; ?></div>
	    	</div>

	    	<div class="col-7 mb-2">
				<div class="web_detailset">
					<div class="row web_rowdetail mb-1">
						<div class="col-sm-2" style="font-size: 18px">
							<b>Kelurahan</b>
						</div>
						<div class="col-sm-9" style="font-size: 18px"><?= $user['nama_pengurus']; ?></div>
					</div>
				
					<div class="row web_rowdetail mb-1">
						<div class="col-sm-2" style="font-size: 18px ">
							<b>Nama RT</b>
						</div>
						<div class="col-sm-9" style="font-size: 18px">RT <?= $user['nama_rt']; ?></div>
					</div>

					<div class="row web_rowdetail mb-1">
						<div class="col-sm-2" style="font-size: 18px">
							<b>Nama RW</b>
						</div>
						<div class="col-sm-9" style="font-size: 18px">RW <?= $user['nama_rw']; ?></div>
					</div>

					<div class="row web_rowdetail mb-1">
						<div class="col-sm-2" style="font-size: 18px">
							<b>Email</b>
						</div>
						<div class="col-sm-9" style="font-size: 18px"><?= $user['email_msy']; ?></div>
					</div>

					<div class="row web_rowdetail mb-1">
						<div class="col-sm-2" style="font-size: 18px">
							<b>No HP</b>
						</div>
						<div class="col-sm-9" style="font-size: 18px"><?= $user['no_hp']; ?></div>
					</div>

					<div class="row web_rowdetail mb-1">
						<div class="col-sm-2" style="font-size: 18px">
							<b>Alamat</b>
						</div>
						<div class="col-sm-9" style="font-size: 18px"><?= $user['alamat']; ?></div>
					</div>
				</div>

				<div class="my-3">
					<img class="m-auto" src="<?= base_url('assets/img/profil/').$user['foto_ktp']?>" style="width: 450px"><br>
				</div>

				<div>
		        	<a href="<?= base_url('profil_masyarakat/edit')?>" class="btn btn-primary"><i class="fas fa-edit mx-1"></i>Edit</a>
		        	<a class="btn btn-danger text-white" onClick="deleteConfirm('<?= base_url('profil_masyarakat/hapus_akun/'.$user['nik'])?>')" data-toggle="modal" data-target="#hapusModal"><i class="fas fa-trash-alt mx-1"></i>Hapus Akun</a>
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

