<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <?= $user['nama']; ?>!</h1>
  </div>

    <!-- Illustrations -->
  <?php foreach ($page as $page) : ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $page['nama_konten']; ?></h6>
      </div>

      <div class="card-body">
        <div class="container-fluid">
        <p align="justify"><?= nl2br(htmlspecialchars($page['isi_konten'])); ?></p>
      </div>
      </div>
    </div>   
  <?php endforeach; ?>     
</div>
<!-- End of Main Content -->