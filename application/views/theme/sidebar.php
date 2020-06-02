<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('Dashboard');?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text-dark mx-3">Perpustakaan HAN1F1N</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <div class="sidebar-heading">
    Fitur
  </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('perpustakaan');?>">
      <i class="fas fa-fw fa-book"></i>
      <span>Daftar Buku</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('petugas');?>">
      <i class="fas fa-fw fa-address-card"></i>
      <span>Petugas</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('anggota');?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Anggota</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('peminjaman');?>">
      <i class="fas fa-fw fa-book-reader"></i>
      <span>Peminjaman</span></a>
  </li>

    <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('pengembalian2');?>">
      <i class="fas fa-fw fa-book-open"></i>
      <span>Pengembalian</span></a>
  </li>

  <!-- Heading -->
  <div class="sidebar-heading">
    Daftar Grafik
  </div>
  
  <li class="nav-item">
   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span>
      </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chart List</h6>
            <a class="collapse-item" href="<?php echo site_url('chart/pie');?>">Pie Chart</a>
            <a class="collapse-item" href="<?php echo site_url('chart/column');?>">Column Chart</a>
          </div>
        </div>
  </li>

</ul>