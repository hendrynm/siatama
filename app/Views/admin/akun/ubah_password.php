<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Ubah Akun
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Kata Sandi
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="col-12">
        <div class="block block-bordered">
            <div class="block-header bg-primary px-4 d-flex">
                <a href="<?= url_to('admin.akun.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
                <span class="ms-3 me-auto text-white fs-5 fw-semibold">Ubah Kata Sandi</span>
            </div>
            <div class="block-content">
                <form action="<?= url_to('admin.akun.ubah_password.post') ?>" method="post" class="form-password">
                    <?= csrf_field() ?>
                    <div class="row mb-lg-4">
                        <div class="col-12 col-lg-4 mb-4">
                            <div class="form-floating">
                                <input type="password" class="form-control fw-semibold" id="password_lama" name="password_lama" placeholder="">
                                <label class="form-label" for="password_lama">Password Lama</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-4 js-pw-strength-container">
                            <div class="form-floating">
                                <input type="password" class="form-control fw-semibold js-pw-strength" id="password_baru" name="password_baru" placeholder="">
                                <label class="form-label" for="password_baru">Password Baru</label>
                                <div class="js-pw-strength-progress pw-strength-progress mt-2"></div>
                            </div>
                            <div class="col-auto">
                                <p class="js-pw-strength-feedback text-muted"></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-4">
                            <div class="form-floating">
                                <input type="password" class="form-control fw-semibold" id="password_ulangi" name="password_ulangi" placeholder="">
                                <label class="form-label" for="password_ulangi">Ulangi Password Baru</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 col-md-6 col-lg-2 ms-auto">
                            <button type="submit" class="btn btn-info w-100">
                                <i class="fa fa-save me-2"></i> Simpan Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/jquery-validation/jquery.validate.min.js') ?>
<?= script_tag('src/assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') ?>
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>

<!-- Page JS Code -->
<script type="text/javascript">
    ! function() {
        class e {
            static initValidationSignIn() {
                Codebase.helpers('jq-validation'), jQuery('.form-password').validate({
                    rules: {
                        'password_lama': { required: !0 },
                        'password_baru': { required: !0 },
                        'password_ulangi': { required: !0, equalTo: "#password_baru" }
                    },
                    messages: {
                        'password_lama': { required: "Password lama harus dimasukkan!" },
                        'password_baru': { required: "Password baru harus dimasukkan!" },
                        'password_ulangi': {
                            required: "Password ulang harus dimasukkan!",
                            equalTo: "Password ulang dan password baru harus sama!"
                        }
                    }
                });
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
                    title: 'Kesalahan!',
                    html: '<?= session()->getFlashdata("error") ?>',
                    icon: 'error'
                });
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('success')): ?>
                e.fire({
                    title: 'Berhasil!',
                    html: '<?= session()->getFlashdata("success") ?>',
                    icon: 'success'
                });
                <?php endif; ?>
            }
            static init() {
                this.initValidationSignIn();
                this.sweetAlert2();
            }
        }
        Codebase.onLoad((() => e.init()));
        Codebase.helpersOnLoad(['jq-pw-strength']);
    }();
</script>
<?= $this->endSection() ?>