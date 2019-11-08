<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/overview') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Manage admin</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/survey/add') ?>">Input Admin baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/survey') ?>">Daftar Admin</a>
        </div>
    </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Manage Kategori</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/angkatan/add') ?>">Input Angkatan Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/angkatan') ?>">Daftar Angkatan</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Manage Angkatan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/angkatan/add') ?>">Input Angkatan Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/angkatan') ?>">Daftar Angkatan</a>
        </div>
    </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Manage Mentor</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/mentor/add') ?>">Input Mentor Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/mentor') ?>">Daftar Mentor</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Manage Survey</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/survey/add') ?>">Input Survey Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/survey') ?>">Daftar Survey</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Manage Pertanyaan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/pertanyaan/add') ?>">Input Pertanyaan Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/pertanyaan') ?>">Daftar Pertanyaan</a>
        </div>
    </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Laporan Hasil Survey</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/survey/add') ?>">Laporan All</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/survey') ?>">Laporan Detail</a>
             <a class="dropdown-item" href="<?php echo site_url('admin/survey/add') ?>">Laporan Individu</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/survey') ?>">Laporan Other Detail</a>
        </div>
    </li>
</ul>