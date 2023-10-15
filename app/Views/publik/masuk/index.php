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
    <?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
</head>
<body>
<div id="page-container" class="main-content-boxed">
    
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('<?= base_url('login-sd.jpg') ?>');">
            <div class="row mx-0 bg-black-25">
                <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                    <div class="p-4 bg-black-50">
                        <p class="fs-3 fw-semibold text-white">
                            Mari bergabung bersama kami<br>
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
                            <a class="link-fx fw-bold" href="javascript:void(0)">
                                <span class="fs-4 text-primary">Siatama</span> <span class="fs-4 text-dual">Privat</span>
                            </a>
                            <h1 class="h3 fw-bold mt-4 mb-2">Selamat Datang</h1>
                            <h2 class="h5 fw-medium text-muted mb-0">Silakan masuk terlebih dahulu</h2>
                        </div>
                        <!-- END Header -->
                        
                        <form class="form-masuk px-4" action="<?= route_to('publik.masuk.index') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= old('username') ?>">
                                <label class="form-label" for="username">Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password" name="password" placeholder="" value="<?= old('password') ?>">
                                <label class="form-label" for="password">Password</label>
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
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>

<!-- Page JS Code -->
<script type="text/javascript">
    ! function() {
        class e {
            static initValidationSignIn() {
                Codebase.helpers("jq-validation"), jQuery(".form-masuk").validate({
                    rules: {
                        "username": {
                            required: !0,
                        },
                        "password": {
                            required: !0,
                        }
                    },
                    messages: {
                        "username": {
                            required: "Username wajib diisi!",
                        },
                        "password": {
                            required: "Password wajib diisi!",
                        }
                    }
                })
            }
            static sweetAlert2() {
                let e = Swal.mixin({
                    buttonsStyling: !1,
                    target: "#page-container",
                    customClass: {
                        confirmButton: "btn btn-alt-primary m-1",
                        cancelButton: "btn btn-alt-danger m-1",
                        input: "form-control"
                    }
                });
                <?php if (session()->getFlashdata('error')): ?>
                e.fire({
                    title: "Kesalahan Pengguna!",
                    html: "<?= session()->getFlashdata('error') ?>",
                    icon: "error"
                });
                <?php endif; ?>
            }
            static init() {
                this.initValidationSignIn()
                this.sweetAlert2()
            }
        }
        Codebase.onLoad((() => e.init()))
    }();
</script>
</body>
</html>