<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
    <title>Masuk | Siatama Privat</title>
    
    <meta name="description" content="Sistem Manajemen Bimbingan Belajar oleh Siatama Privat">
    <meta name="author" content="Siatama Privat">
    <meta name="robots" content="noindex, nofollow">
    
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('siatama-sementara.png') ?>">
    
    <?= link_tag('src/assets/css/codebase.min.css') ?>
    <?= link_tag('src/assets/css/themes/flat.min.css') ?>
</head>
<body>
<div id="page-container" class="main-content-boxed">
    
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('https://priba.id/wp-content/uploads/2020/06/Les-Privat-Calistung-Membaca-Menulis-dan-Berhitung.jpg');">
            <div class="row mx-0 bg-black-50">
                <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                    <div class="p-4">
                        <p class="fs-3 fw-semibold text-white">
                            Bergabung bersama kami<br>
                            Bimbingan Belajar Privat TERBAIK di Surabaya
                        </p>
                        <p class="text-white-75 fw-medium">
                            Siatama Privat &copy; <span data-toggle="year-copy"></span>
                        </p>
                    </div>
                </div>
                <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-body-extra-light">
                    <div class="content content-full">
                        <!-- Header -->
                        <div class="px-4 py-2 mb-4">
                            <a class="link-fx fw-bold" href="#">
                                <span class="fs-4 text-primary">Siatama</span> <span class="fs-4 text-dual">Privat</span>
                            </a>
                            <h1 class="h3 fw-bold mt-4 mb-2">Selamat Datang</h1>
                            <h2 class="h5 fw-medium text-muted mb-0">Silakan masuk terlebih dahulu</h2>
                        </div>
                        <!-- END Header -->
                        
                        <form class="js-validation-signin px-4" action="<?= route_to('admin.beranda.index') ?>" method="get">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="login-username" name="login-username" placeholder="">
                                <label class="form-label" for="login-username">Username (diisi ngawur aja)</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="login-password" name="login-password" placeholder="">
                                <label class="form-label" for="login-password">Password (diisi ngawur aja)</label>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                                    Masuk
                                </button>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<?= script_tag('src/assets/js/codebase.app.min.js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/jquery-validation/jquery.validate.min.js') ?>

<!-- Page JS Code -->
<script type="text/javascript">
    ! function() {
        class e {
            static initValidationSignIn() {
                Codebase.helpers("jq-validation"), jQuery(".js-validation-signin").validate({
                    rules: {
                        "login-username": {
                            required: !0,
                        },
                        "login-password": {
                            required: !0,
                        }
                    },
                    messages: {
                        "login-username": {
                            required: "Mohon masukkan username Anda (ngawur aja kak)",
                        },
                        "login-password": {
                            required: "Mohon masukkan password Anda (ngawur aja kak)",
                        }
                    }
                })
            }
            static init() {
                this.initValidationSignIn()
            }
        }
        Codebase.onLoad((() => e.init()))
    }();
</script>
</body>
</html>