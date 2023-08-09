<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title><?= $this->renderSection('menu') ?> | <?= $this->renderSection('submenu') ?> | Siatama Privat</title>

    <meta name="description" content="Sistem Manajemen Bimbingan Belajar oleh Siatama Privat">
    <meta name="author" content="Siatama Privat">
    <meta name="robots" content="noindex, nofollow">

    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>">

    <link rel="stylesheet" id="css-main" href="<?= base_url('src/assets/css/codebase.min.css') ?>">
    <link rel="stylesheet" id="css-theme" href="<?= base_url('src/assets/css/themes/flat.min.css') ?>">
</head>

<body>
<!-- Page Container -->
<!--
  Available classes for #page-container:

  GENERIC

    'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                - Theme helper buttons [data-toggle="theme"],
                                                - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                - ..and/or Codebase.layout('dark_mode_[on/off/toggle]')

  SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-dark'                              Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

  HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header

  HEADER STYLE

    ''                                          Classic Header style if no class is added
    'page-header-modern'                        Modern Header style
    'page-header-dark'                          Dark themed Header (works only with classic Header style)
    'page-header-glass'                         Light themed Header with transparency by default
                                                (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
    'page-header-glass page-header-dark'        Dark themed Header with transparency by default
                                                (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

  MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

  DARK MODE

    'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
-->
<div id="page-container" class="sidebar-o side-scroll main-content-boxed page-header-fixed">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header">
            <!-- User Avatar -->
            <a class="img-link me-2" href="be_pages_generic_profile.html">
                <img class="img-avatar img-avatar32" src="<?= base_url('src/assets/media/avatars/avatar15.jpg') ?>"
                     alt="">
            </a>
            <!-- END User Avatar -->

            <!-- User Info -->
            <a class="link-fx text-body-color-dark fw-semibold fs-sm" href="be_pages_generic_profile.html">
                John Smith
            </a>
            <!-- END User Info -->

            <!-- Close Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-danger ms-auto" data-toggle="layout"
                    data-action="side_overlay_close">
                <i class="fa fa-fw fa-times"></i>
            </button>
            <!-- END Close Side Overlay -->
        </div>
        <!-- END Side Header -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
      Helper classes

      Adding .smini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
      Adding .smini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition, just add the .no-transition along with one of the previous 2 classes

      Adding .smini-hidden to an element will hide it when the sidebar is in mini mode
      Adding .smini-visible to an element will show it only when the sidebar is in mini mode
      Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
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
                    <a class="link-fx fw-bold tracking-wide mx-auto" href="<?= base_url() ?>">
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
                                <span href="#" class="fs-base fw-bold text-uppercase text-black" style="line-height: 0 !important;">
                                    Hendry Naufal Marbella</span>
                                <i class="btn btn-sm fa fa-pen-to-square text-primary"></i>
                                <br>
                                <span class="fs-sm">Hak akses: <span class="fw-semibold">Mentor</span></span>
                            </div>
                        </div>
                    </div>
                    <!-- END Visible only in normal mode -->
                </div>
                <!-- END Side User -->
                
                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="<?= base_url() ?>">
                                <i class="nav-main-link-icon fa fa-house-chimney"></i>
                                <span class="nav-main-link-name">Beranda</span>
                            </a>
                        </li>
                        
                        <li class="nav-main-heading">Manajemen Bimbel</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= base_url() ?>">
                                <i class="nav-main-link-icon fa fa-list-check"></i>
                                <span class="nav-main-link-name">Isi Presensi</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= base_url() ?>">
                                <i class="nav-main-link-icon fa fa-book-open-reader"></i>
                                <span class="nav-main-link-name">Laporan Siswa</span>
                            </a>
                        </li>
                        
                        <li class="nav-main-heading">Manajemen Data</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= base_url() ?>">
                                <i class="nav-main-link-icon fa fa-user-graduate"></i>
                                <span class="nav-main-link-name">Data Siswa</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= base_url() ?>">
                                <i class="nav-main-link-icon fa fa-chalkboard-user"></i>
                                <span class="nav-main-link-name">Data Mentor</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= base_url() ?>">
                                <i class="nav-main-link-icon fa fa-calendar-day"></i>
                                <span class="nav-main-link-name">Jadwal Les</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Pengaturan</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= base_url() ?>">
                                <i class="nav-main-link-icon fa fa-marker"></i>
                                <span class="nav-main-link-name">Komponen Penilaian</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= base_url() ?>">
                                <i class="nav-main-link-icon fa fa-arrow-down-short-wide"></i>
                                <span class="nav-main-link-name">Jenjang / Tingkat</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= base_url() ?>">
                                <i class="nav-main-link-icon fa fa-arrow-up-right-dots"></i>
                                <span class="nav-main-link-name">Semester</span>
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
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
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
                        <div class="d-none d-sm-block fs-sm">
                            <a href="#" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-sign-out-alt"></i>
                                <span class="ms-1">Keluar</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="far fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
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
                    <a class="fw-medium" href="#" target="_blank">Siatama Privat</a> &copy;
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
<script src="<?= base_url('src/assets/js/codebase.app.min.js') ?>"></script>
</body>
</html>