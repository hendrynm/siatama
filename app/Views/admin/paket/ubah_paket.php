<?= $this->extend('admin/_layout/master') ?>

<?php helper(['form', 'ubah_harga']) ?>

<?= $this->section('menu') ?>
Harga Paket
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Ubah Paket
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="col-12">
        <div class="block block-bordered">
            <div class="block-header bg-primary px-4 d-flex">
                <a href="<?= route_to('admin.paket.daftar_paket') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
                <span class="ms-3 me-auto text-white fs-5 fw-semibold">Ubah Paket</span>
            </div>
            <div class="block-content">
                <form action="<?= route_to('admin.paket.ubah_paket.post') ?>" method="post" class="form-paket">
                    <?= csrf_field() ?>
                    <?= form_hidden('id_paket', $paket->id_paket) ?>
                    <div class="row mb-lg-4">
                        <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                            <div class="form-floating">
                                <input type="text" class="form-control fw-semibold" id="nama_paket" name="nama_paket" placeholder="" value="<?= old('nama_paket') ?? $paket->nama_paket ?>">
                                <label class="form-label" for="nama_paket">Nama Paket</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                            <div class="form-floating">
                                <input type="text" class="form-control fw-semibold" id="harga_paket" name="harga_paket" placeholder="" value="<?= old('harga_paket') ?? $paket->harga_paket ?>">
                                <label class="form-label" for="harga_paket">Harga Paket</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-lg-4">
                        <div class="col-12 col-lg-3">
                            <div class="form-floating">
                                <select class="form-select fw-semibold" id="id_jenjang" name="id_jenjang" size="1" required>
                                    <option value="" selected disabled>-- pilih salah satu --</option>
                                    <?php foreach ($jenjang as $key => $value): ?>
                                        <option value="<?= $value->id_jenjang ?>"><?= $value->nama_jenjang ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label class="form-label" for="id_jenjang">Jenjang</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 mt-4 mt-md-0">
                            <div class="form-floating">
                                <select class="form-select fw-semibold" id="id_tingkat" name="id_tingkat" size="1" required>
                                    <option value="" selected disabled>-- pilih salah satu --</option>
                                </select>
                                <label class="form-label" for="id_tingkat">Kelas</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 mt-4 mt-md-0">
                            <div class="form-floating">
                                <select class="form-select fw-semibold" id="jenis" name="jenis" size="1" required>
                                    <option value="" selected disabled>-- pilih salah satu --</option>
                                    <option value="0" <?= $paket->jenis === '0' ? 'selected' : '' ?>>Reguler</option>
                                    <option value="1" <?= $paket->jenis === '1' ? 'selected' : '' ?>>Privat</option>
                                </select>
                                <label class="form-label" for="jenis">Jenis Paket</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 mt-lg-0 mb-4">
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
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>
    
<!-- Page JS Code -->
<script type="text/javascript">
    ! function() {
        class e {
            static initValidationSignIn() {
                Codebase.helpers('jq-validation'), jQuery('.form-paket').validate({
                    rules: {
                        nama_paket: { required: !0 },
                        harga_paket: { required: !0 },
                        id_jenjang: { required: !0 },
                        id_tingkat: { required: !0 },
                        jenis: { required: !0 }
                    },
                    messages: {
                        nama_paket: { required: 'Silahkan masukkan nama paket.' },
                        harga_paket: { required: 'Silahkan masukkan harga paket.' },
                        id_jenjang: { required: 'Silahkan pilih jenjang.' },
                        id_tingkat: { required: 'Silahkan pilih tingkat.' },
                        jenis: { required: 'Silahkan pilih jenis paket.' }
                    },
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
                    title: 'Kesalahan!',
                    html: '<?= session()->getFlashdata("error") ?>',
                    icon: 'error'
                });
                <?php endif; ?>
            }
            static init() {
                this.initValidationSignIn();
                this.sweetAlert2();
            }
        }
        Codebase.onLoad((() => e.init()))
    }();
    
    $(document).ready(function() {
        let data = [
            <?php foreach ($jenjang as $k1=>$v1): ?>
            <?php foreach ($v1->tingkat as $k2=>$v2): ?>
            {
                id_jenjang: <?= $v1->id_jenjang ?>,
                id_tingkat: <?= $v2->id_tingkat ?>,
                nama_tingkat: '<?= $v2->nama_tingkat ?>'
            },
            <?php endforeach; ?>
            <?php endforeach; ?>
        ];
        let tingkat_select = $('#id_tingkat');
        let jenjang_select = $('#id_jenjang');
        
        // masukkan data dropdown, kemudian set id_jenjang dan id_tingkatnya
        jenjang_select.val(<?= $paket->id_jenjang ?>);
        jenjang_select.change();
        
        tingkat_select.empty();
        tingkat_select.append('<option value="" selected disabled>-- pilih salah satu --</option>');
        $.each(data, function (key, value) {
            if (parseInt(value.id_jenjang) === parseInt(<?= $paket->id_jenjang ?>)) {
                tingkat_select.append('<option value="' + value.id_tingkat + '" ' + (parseInt(value.id_tingkat) === parseInt(<?= $paket->id_tingkat ?>) ? 'selected' : '') + '>' + value.nama_tingkat + '</option>');
            }
        });
        tingkat_select.change();
        
        jenjang_select.change(function() {
            let id_jenjang = $(this).val();
            
            let tingkat = data.filter(function (item) {
                return parseInt(item.id_jenjang) === parseInt(id_jenjang);
            });
            
            tingkat_select.empty();
            tingkat_select.append('<option value="" selected disabled>-- pilih salah satu --</option>');
            $.each(tingkat, function (key, value) {
                tingkat_select.append('<option value="' + value.id_tingkat + '">' + value.nama_tingkat + '</option>');
            });
            tingkat_select.change();
        });
    });
</script>
<?= $this->endSection() ?>