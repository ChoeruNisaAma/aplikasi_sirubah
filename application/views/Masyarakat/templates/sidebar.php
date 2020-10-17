<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url()?>assets/img/logo.jpg" width="50" height="60"><br>  
        </div>
        <div class="sidebar-brand-text mx-3" font-size="100 px">SIRUBAH</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Page_Masyarakat')?>">
          <i class="fas fa-home"></i>
          <span>Halaman Utama</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">Permohonan Surat</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Pengajuan_surat')?>">
          <i class="fas fa-folder-open"></i>
          <span>Ajukan Permohonan</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Cek_Status')?>">
          <i class="fas fa-tasks"></i>
          <span>Cek Status</span>
        </a>
      </li>

      <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
      <div class="sidebar-heading">Pengaturan Akun</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Profil_Masyarakat/myprofil');?>">
          <i class="fas fa-user-circle"></i>
          <span>Profil</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Password_Masyarakat');?>">
          <i class="fas fa-cogs"></i>
          <span>Ganti Kata Sandi</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Keluar</span>
        </a>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">pilih "Keluar" jika Anda telah selesai menggunakan sesi ini!</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?= base_url('Auth_Masyarakat/logout')?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>
