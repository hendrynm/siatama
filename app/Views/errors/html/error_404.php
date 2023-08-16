<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Error 404 | Halaman tidak ditemukan | Siatama Privat</title>

    <meta name="description" content="Sistem Manajemen Bimbingan Belajar oleh Siatama Privat">
    <meta name="author" content="Siatama Privat">
    <meta name="robots" content="noindex, nofollow">

    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('siatama-sementara.png') ?>">

    <link rel="stylesheet" id="css-main" href="<?= base_url('src/assets/css/codebase.min.css') ?>">
</head>
<body>
<div id="page-container" class="main-content-boxed">
    <main id="main-container">
        <div class="hero bg-body-extra-light">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="py-4 text-center">
                        <div class="display-1 fw-bold text-danger">
                            <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> 404
                        </div>
                        <h1 class="fw-bold mt-5 mb-2">Halaman Tidak Ditemukan</h1>
                        <h2 class="fs-4 fw-medium text-muted mb-5 mt-3">Maaf, halaman yang kamu cari tidak ditemukan</h2>
                        <a class="btn btn-lg btn-alt-secondary" href="<?= previous_url() ?>">
                            <i class="fa fa-arrow-left me-2"></i> Kembali ke halaman sebelumnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="<?= base_url('src/assets/js/codebase.app.min.js') ?>"></script>
</body>
</html>