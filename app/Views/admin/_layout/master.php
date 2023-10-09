<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title><?= $this->renderSection('menu') ?> - <?= $this->renderSection('submenu') ?> | Siatama Privat</title>

    <meta name="description" content="Sistem Manajemen Bimbingan Belajar oleh Siatama Privat">
    <meta name="author" content="Siatama Privat">
    <meta name="robots" content="noindex, nofollow">

    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('siatama-sementara.png') ?>">
    
    <?= link_tag('src/assets/css/codebase.min.css') ?>
    <?= link_tag('src/assets/css/themes/flat.min.css') ?>
    
    <?= $this->renderSection('css') ?>
</head>

<body>
<div id="page-container" class="sidebar-o side-scroll main-content-boxed page-header-fixed">
    <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header justify-content-lg-center">
                <!-- Logo -->
                <div>
                    <span class="smini-visible fw-bold tracking-wide fs-lg">
                        <span class="text-primary">S</span><span class="">P</span>
                    </span>
                    <a class="link-fx fw-bold tracking-wide mx-auto" href="<?= route_to('admin.beranda.index') ?>">
                        <span class="smini-hidden">
                            <span class="fs-4 text-primary">Siatama</span> <span class="fs-4 text-dual">Privat</span>
                        </span>
                    </a>
                </div>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                            data-action="sidebar_close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side User -->
                <div class="content-side px-2 py-3 bg-black-10">
                    <!-- Visible only in normal mode -->
                    <div class="smini-hidden ps-2">
                        <div class="row align-items-center align-content-center">
                            <div class="col-3">
                                <img class="img-avatar img-avatar48" src="<?= base_url('src/assets/media/avatars/avatar15.jpg') ?>" alt="">
                            </div>
                            <div class="col-9">
                                <span href="javascript:void(0)" class="fs-base fw-bold text-uppercase text-black" style="line-height: 0 !important;">
                                    <?= view_cell('NamaAkunCell') ?>
                                </span>
                                <br>
                                <span class="fs-sm">Hak akses: <span class="fw-semibold"><?= view_cell('LevelAkunCell') ?></span></span>
                            </div>
                        </div>
                    </div>
                    <!-- END Visible only in normal mode -->
                </div>
                <!-- END Side User -->
                
                <?php
                function cek_aktif(string $route_url): string|null
                {
                    $url_sekarang = current_url(true)->getSegments();
                    $url_menu = $url_sekarang[1];
                    
                    $url_route = explode('/', $route_url);
                    $url_route_menu = $url_route[2];

                    if ($url_menu == $url_route_menu) {
                        return 'active';
                    }
                    return null;
                }
                ?>
                
                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.beranda.index')) ?>" href="<?= route_to('admin.beranda.index') ?>">
                                <i class="nav-main-link-icon fa fa-house-chimney"></i>
                                <span class="nav-main-link-name">Beranda</span>
                            </a>
                        </li>
                       
                        <li class="nav-main-heading">Manajemen Bimbel</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.presensi.index')) ?>" href="<?= route_to('admin.presensi.index') ?>">
                                <i class="nav-main-link-icon fa fa-list-check"></i>
                                <span class="nav-main-link-name">Presensi</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.laporan.index')) ?>" href="<?= route_to('admin.laporan.index') ?>">
                                <i class="nav-main-link-icon fa fa-book-open-reader"></i>
                                <span class="nav-main-link-name">Laporan</span>
                            </a>
                        </li>
                        <?php if(session()->get('hak_akses') == 'Admin'): ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.pembayaran.index')) ?>" href="<?= route_to('admin.pembayaran.index') ?>">
                                <i class="nav-main-link-icon fa fa-wallet"></i>
                                <span class="nav-main-link-name">Pembayaran</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <li class="nav-main-heading">Manajemen Data</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.siswa.index')) ?>" href="<?= route_to('admin.siswa.index') ?>">
                                <i class="nav-main-link-icon fa fa-user-graduate"></i>
                                <span class="nav-main-link-name">Data Siswa</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.tentor.index')) ?>" href="<?= route_to('admin.tentor.index') ?>">
                                <i class="nav-main-link-icon fa fa-chalkboard-user"></i>
                                <span class="nav-main-link-name">Data Tentor</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.jadwal.index')) ?>" href="<?= route_to('admin.jadwal.index') ?>">
                                <i class="nav-main-link-icon fa fa-calendar-day"></i>
                                <span class="nav-main-link-name">Jadwal Les</span>
                            </a>
                        </li>
                        <?php if(session()->get('hak_akses') == 'Admin'): ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.penilaian.index')) ?>" href="<?= route_to('admin.penilaian.index') ?>">
                                <i class="nav-main-link-icon fa fa-marker"></i>
                                <span class="nav-main-link-name">Komponen Nilai</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.paket.index')) ?>" href="<?= route_to('admin.paket.index') ?>">
                                <i class="nav-main-link-icon fa fa-rupiah-sign"></i>
                                <span class="nav-main-link-name">Harga Paket</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(session()->get('hak_akses') == 'Admin'): ?>
                        <li class="nav-main-heading">Pengaturan</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.jenjang.index')) ?>" href="<?= route_to('admin.jenjang.index') ?>">
                                <i class="nav-main-link-icon fa fa-arrow-up-short-wide"></i>
                                <span class="nav-main-link-name">Jenjang & Tingkat</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= cek_aktif(route_to('admin.semester.index')) ?>" href="<?= route_to('admin.semester.index') ?>">
                                <i class="nav-main-link-icon fa fa-person-arrow-up-from-line"></i>
                                <span class="nav-main-link-name">Semester</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= route_to('admin.akun.index') ?>">
                                <i class="nav-main-link-icon fa fa-user-pen"></i>
                                <span class="nav-main-link-name">Ubah Akun</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= route_to('admin.beranda.keluar') ?>">
                                <i class="nav-main-link-icon fa fa-sign-out-alt"></i>
                                <span class="nav-main-link-name">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </div>
        <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="space-x-1">
                <!-- Toggle Sidebar -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-none d-lg-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <button type="button" class="btn btn-sm btn-alt-secondary d-block d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="space-x-1">
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <div class="px-2">
                        <div class="d-none d-xl-block fs-sm">
                            <a href="<?= route_to('admin.beranda.keluar') ?>" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-sign-out-alt"></i>
                                <span class="ms-1">Keluar</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->

                <span class="d-inline-block d-xl-none fs-4 text-primary fw-bold">
                    Siatama <span class="fs-4 text-dual">Privat</span>
                </span>
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <?= $this->renderSection('content') ?>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer">
        <div class="content py-3">
            <div class="row fs-xs">
                <div class="col-12 py-1 text-center">
                    Dibuat dengan <i class="fa fa-heart text-danger"></i> oleh
                    <a class="fw-medium" href="javascript:void(0)">Siatama Privat</a> &copy;
                    <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!--
    Codebase JS

    Core libraries and functionality
    webpack is putting everything together at assets/_js/main/app.js
-->
<?= script_tag('src/assets/js/codebase.app.min.js') ?>

<?= $this->renderSection('js') ?>
</body>
</html>