<?= $this->extend('admin/_layout/master') ?>

<?php helper('form') ?>

<?= $this->section('menu') ?>
Jenjang & Tingkat
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Beranda
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/nestable2/jquery.nestable.min.css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="row mb-4">
        <div class="col-12 col-lg-auto">
            <div class="fs-1 fw-semibold">
                Jenjang dan Tingkat
            </div>
            <div class="fs-5">
                Silakan memilih menu di bawah ini
            </div>
        </div>
        <div class="col-12 col-lg-auto ms-auto">
            <a href="javascript:void(0)" class="btn btn-alt-primary py-2 px-3 py-lg-3 px-lg-4 mt-3 tombol-tambah-jenjang">
                <i class="fa fa-plus me-2"></i> Tambah Jenjang
            </a>
            <a href="javascript:void(0)" class="btn btn-alt-info py-2 px-3 py-lg-3 px-lg-4 mt-3 tombol-tambah-tingkat">
                <i class="fa fa-plus me-2"></i> Tambah Tingkat
            </a>
        </div>
    </div>
    
    <div class="row">
        <?php foreach($jenjang as $k1=>$v1): ?>
        <div class="col-12 col-xl-3">
            <div class="row">
                <div class="col-12">
                    <div class="block my-0">
                        <div class="block-content block-content-full bg-<?= $v1->warna ?> text-white fw-semibold py-2 ps-3 pe-2 fs-5 d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                <?= $v1->nama_jenjang ?>
                            </div>
                            <div class="text-end">
                                <a href="javascript:void(0)" class="btn btn-sm btn-light tombol-ubah-jenjang" data-jenjang-id="<?= $v1->id_jenjang ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-light tombol-hapus-jenjang" data-jenjang-id="<?= $v1->id_jenjang ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-2"></div>
                <div class="col-10">
                    <div class="block">
                        <?php foreach($v1->tingkat as $k2=>$v2): ?>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                <?= $v2->nama_tingkat ?>
                            </div>
                            <div class="text-end">
                                <a href="javascript:void(0)" class="btn btn-sm btn-light tombol-ubah-tingkat" data-tingkat-id="<?= $v2->id_tingkat ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-light tombol-hapus-tingkat" data-tingkat-id="<?= $v2->id_tingkat ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modal-tambah-jenjang" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-jenjang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Jenjang Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="nama_jenjang" name="nama_jenjang" placeholder="">
                        <label class="form-label" for="nama_jenjang">Nama Jenjang</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-select" id="warna" name="warna">
                            <option value="" selected disabled>-- pilih salah satu--</option>
                            <option value="primary" class="bg-primary">Primary</option>
                            <option value="secondary" class="bg-secondary">Secondary</option>
                            <option value="success" class="bg-success">Success</option>
                            <option value="warning" class="bg-warning">Warning</option>
                            <option value="danger" class="bg-danger">Danger</option>
                            <option value="info" class="bg-info">Info</option>
                            <option value="corporate" class="bg-corporate">Corporate</option>
                            <option value="flat" class="bg-flat">Flat</option>
                            <option value="elegance" class="bg-elegance">Elegance</option>
                            <option value="earth" class="bg-earth">Earth</option>
                            <option value="pulse" class="bg-pulse">Pulse</option>
                            <option value="black" class="bg-black text-white">Black</option>
                        </select>
                        <label class="form-label" for="warna">Warna Label</label>
                    </div>
                    <input type="hidden" name="id_jenjang" id="id_jenjang" value="">
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-danger btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-alt-primary btn-sm tombol-simpan-jenjang" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah-tingkat" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-tingkat" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Tingkat Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm mb-4">
                    <div class="form-floating mb-4">
                        <select class="form-select" id="id_jenjang" name="id_jenjang">
                            <option value="" selected disabled>-- pilih salah satu--</option>
                            <?php foreach ($jenjang as $k1=>$v1): ?>
                            <option value="<?= $v1->id_jenjang ?>"><?= $v1->nama_jenjang ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label class="form-label" for="id_jenjang">Jenjang</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nama_tingkat" name="nama_tingkat" placeholder="">
                        <label class="form-label" for="nama_tingkat">Nama Tingkat</label>
                    </div>
                    <input type="hidden" name="id_tingkat" id="id_tingkat" value="">
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-danger btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-alt-primary btn-sm tombol-simpan-tingkat" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/nestable2/jquery.nestable.min.js') ?>
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>

<script type="text/javascript">
    let sa;
    ! function() {
        class e {
            static sweetAlert2() {
                sa = Swal.mixin({
                    buttonsStyling: !1,
                    target: "#page-container",
                    customClass: {
                        confirmButton: "btn btn-alt-primary m-1",
                        cancelButton: "btn btn-alt-danger m-1",
                        input: "form-control"
                    }
                });
            }
            static init() {
                this.sweetAlert2()
            }
        }
        Codebase.onLoad((() => e.init()))
    }();
    
    $(document).ready(function() {
        $('.tombol-tambah-jenjang').on('click', function () {
            let modal = $('#modal-tambah-jenjang');
            modal.find('.block-title').text('Tambah Jenjang Baru');
            modal.find('#nama_jenjang').val('');
            modal.find('#warna').val('');
            modal.find('#id_jenjang').val('');
            modal.modal('show');
        });
        
        $('.tombol-ubah-jenjang').on('click', function () {
            let id_jenjang = $(this).data('jenjang-id');
            let modal = $('#modal-tambah-jenjang');
            
            $.ajax({
                url: '<?= url_to('admin.jenjang.ambil_jenjang') ?>',
                method: 'post',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_jenjang: id_jenjang
                },
                dataType: 'json',
                success: function (data) {
                    modal.find('.block-title').text('Ubah Jenjang');
                    modal.find('#id_jenjang').val(data.id_jenjang);
                    modal.find('#nama_jenjang').val(data.nama_jenjang);
                    modal.find('#warna').val(data.warna);
                    modal.modal('show');
                }
            });
        });
        
        $('.tombol-simpan-jenjang').on('click', function () {
            let modal = $('#modal-tambah-jenjang');
            let id_jenjang = modal.find('#id_jenjang').val();
            let nama_jenjang = modal.find('#nama_jenjang').val();
            let warna = modal.find('#warna').children('option').filter(':selected').val();
            
            $.ajax({
                url: '<?= url_to('admin.jenjang.simpan_jenjang') ?>',
                method: 'post',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_jenjang: id_jenjang,
                    nama_jenjang: nama_jenjang,
                    warna: warna
                },
                dataType: 'json',
                success: function () {
                    sa.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data jenjang berhasil disimpan!',
                    }).then(function (){
                        window.location.reload();
                    });
                },
                error: function () {
                    sa.fire({
                        icon: 'error',
                        title: 'Kesalahan Server!',
                        text: 'Data jenjang gagal disimpan. Mohon dicoba ulang.',
                    });
                }
            });
        });
        
        $('.tombol-hapus-jenjang').on('click', function () {
            let id_jenjang = $(this).data('jenjang-id');
            
            $.ajax({
                url: '<?= url_to('admin.jenjang.cek_tingkat') ?>',
                method: 'post',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_jenjang: id_jenjang
                },
                dataType: 'json',
                success: function (data) {
                    if(data === 0) {
                        sa.fire({
                            icon: 'question',
                            title: 'Konfirmasi',
                            text: 'Apakah Anda yakin ingin menghapus data jenjang ini?',
                            showCancelButton: true,
                            reverseButtons: true,
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Batal',
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '<?= url_to('admin.jenjang.hapus_jenjang') ?>',
                                    method: 'post',
                                    data: {
                                        <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                                        id_jenjang: id_jenjang
                                    },
                                    dataType: 'json',
                                    success: function () {
                                        sa.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Data jenjang berhasil dihapus!',
                                        }).then(function (){
                                            window.location.reload();
                                        });
                                    },
                                    error: function () {
                                        sa.fire({
                                            icon: 'error',
                                            title: 'Kesalahan Server!',
                                            text: 'Data jenjang gagal dihapus. Mohon dicoba ulang.',
                                        });
                                    }
                                });
                            }
                        });
                    }
                    else {
                        sa.fire({
                            icon: 'error',
                            title: 'Kesalahan Pengguna!',
                            text: 'Hapus dulu data tingkat, baru data jenjang!',
                        });
                    }
                }
            });
        });
        
        $('.tombol-tambah-tingkat').on('click', function () {
            let modal = $('#modal-tambah-tingkat');
            modal.find('.block-title').text('Tambah Tingkat Baru');
            modal.find('#id_jenjang').val('');
            modal.find('#nama_tingkat').val('');
            modal.modal('show');
        });
        
        $('.tombol-ubah-tingkat').on('click', function () {
            let id_tingkat = $(this).data('tingkat-id');
            let modal = $('#modal-tambah-tingkat');
            
            $.ajax({
                url: '<?= url_to('admin.jenjang.ambil_tingkat') ?>',
                method: 'post',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_tingkat: id_tingkat
                },
                dataType: 'json',
                success: function (data) {
                    modal.find('.block-title').text('Ubah Tingkat');
                    modal.find('#id_tingkat').val(data.id_tingkat);
                    modal.find('#id_jenjang').val(data.id_jenjang);
                    modal.find('#nama_tingkat').val(data.nama_tingkat);
                    modal.modal('show');
                }
            });
        });
        
        $('.tombol-simpan-tingkat').on('click', function () {
            let modal = $('#modal-tambah-tingkat');
            let id_tingkat = modal.find('#id_tingkat').val();
            let id_jenjang = modal.find('#id_jenjang').children('option').filter(':selected').val();
            let nama_tingkat = modal.find('#nama_tingkat').val();
            
            $.ajax({
                url: '<?= url_to('admin.jenjang.simpan_tingkat') ?>',
                method: 'post',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_tingkat: id_tingkat,
                    id_jenjang: id_jenjang,
                    nama_tingkat: nama_tingkat
                },
                dataType: 'json',
                success: function () {
                    sa.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data tingkat berhasil disimpan!',
                    }).then(function (){
                        window.location.reload();
                    });
                },
                error: function () {
                    sa.fire({
                        icon: 'error',
                        title: 'Kesalahan Server!',
                        text: 'Data tingkat gagal disimpan. Mohon dicoba ulang.',
                    });
                }
            });
        });
        
        $('.tombol-hapus-tingkat').on('click', function () {
            let id_tingkat = $(this).data('tingkat-id');
            
            sa.fire({
                icon: 'question',
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data tingkat ini?',
                showCancelButton: true,
                reverseButtons: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= url_to('admin.jenjang.hapus_tingkat') ?>',
                        method: 'post',
                        data: {
                            <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                            id_tingkat: id_tingkat
                        },
                        dataType: 'json',
                        success: function () {
                            sa.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data tingkat berhasil dihapus!',
                            }).then(function (){
                                window.location.reload();
                            });
                        },
                        error: function () {
                            sa.fire({
                                icon: 'error',
                                title: 'Kesalahan Server!',
                                text: 'Data tingkat gagal dihapus. Mohon dicoba ulang.',
                            });
                        }
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>
