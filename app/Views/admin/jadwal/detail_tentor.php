<?= $this->extend('admin/_layout/master') ?>

<?php helper(['form','ubah_tanggal','ubah_jam']) ?>

<?= $this->section('menu') ?>
Jadwal Les
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Detail Tentor
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-info px-4 d-flex">
            <a href="<?= url_to('admin.jadwal.daftar_tentor') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Detail Jadwal Tentor</span>
        </div>
        <div class="block-content block-content-full d-flex justify-content-between align-items-center">
            <div class="text-start">
                <div class="fs-3 fw-semibold"><?= $tentor->nama_pengajar ?></div>
                <div class="fs-6 fw-medium text-muted"><?= $tentor->email_bimbel ?></div>
            </div>
            <div class="text-end">
                <button class="btn btn-alt-info text-center px-lg-4 py-lg-3 tombol-tambah-jadwal">
                    <i class="fa fa-plus"></i>
                    <span class="fw-medium ms-2" style="line-height: 1.25">Tambah Jadwal</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row">
        <?php foreach ($jadwal as $v): ?>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="block block-themed">
                <div class="block-header">
                    <h3 class="block-title fw-semibold text-white"><?= ubah_tanggal($v[0]['mulai']) ?></h3>
                </div>
                <div class="block-content pb-3">
                    <?php foreach ($v as $v2): ?>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="fw-medium fs-5">
                                <?= $v2['nama_kelas'] ?>
                            </div>
                            <div class="fs-6">
                                <?= ubah_jam($v2['mulai']) ?>-<?= ubah_jam($v2['selesai']) ?>
                                <?php if(session()->get('hak_akses') == 'Admin'): ?>
                                    <button class="btn btn-sm btn-alt-warning ms-2 tombol-ubah-jadwal" data-id-jadwal="<?= $v2['id_jadwal'] ?>" data-bs-toggle="tooltip" title="Ubah"><i class="fa fa-edit fa-sm"></i></button>
                                    <button class="btn btn-sm btn-alt-danger tombol-hapus-jadwal" data-id-jadwal="<?= $v2['id_jadwal'] ?>" data-bs-toggle="tooltip" title="Hapus"><i class="fa fa-trash fa-sm"></i></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modal-ubah-jadwal" tabindex="-1" role="dialog" aria-labelledby="modal-ubah-jadwal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title judul-modal">Ubah Jadwal Tentor</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content mb-4">
                    <div class="form-floating mb-4">
                        <select class="form-select" id="id_kelas" name="id_kelas" required>
                            <option value="" selected disabled>-- pilih salah satu--</option>
                            <option value="0">Tidak Mengajar / Tersedia</option>
                            <?php foreach ($kelas as $v): ?>
                                <option value="<?= $v->id_kelas ?>">Kelas <?= $v->nama_kelas ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label class="form-label" for="id_kelas">Nama Kelas</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-4">
                                <input type="time" class="form-control" id="mulai" name="mulai" required>
                                <label class="form-label" for="mulai">Waktu Mulai</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-4">
                                <input type="time" class="form-control" id="selesai" name="selesai" required>
                                <label class="form-label" for="selesai">Waktu Selesai</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Pilihan Hari</label>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hari_senin" name="hari_senin" value="1">
                                    <label class="form-check-label" for="hari_senin">Senin</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hari_selasa" name="hari_selasa" value="2">
                                    <label class="form-check-label" for="hari_selasa">Selasa</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hari_rabu" name="hari_rabu" value="3">
                                    <label class="form-check-label" for="hari_rabu">Rabu</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hari_kamis" name="hari_kamis" value="4">
                                    <label class="form-check-label" for="hari_kamis">Kamis</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hari_jumat" name="hari_jumat" value="5">
                                    <label class="form-check-label" for="hari_jumat">Jumat</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hari_sabtu" name="hari_sabtu" value="6">
                                    <label class="form-check-label" for="hari_sabtu">Sabtu</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hari_minggu" name="hari_minggu" value="7">
                                    <label class="form-check-label" for="hari_minggu">Minggu</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hari_sekarang" name="hari_sekarang" value="0">
                                    <label class="form-check-label" for="hari_sekarang">Default</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Pilihan Pengulangan</label>
                        <div class="space-y-1">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="ulang_0" name="ulang" value="0" checked>
                                <label class="form-check-label" for="ulang_0">Ubah untuk hari ini saja</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="ulang_1" name="ulang" value="1" checked>
                                <label class="form-check-label" for="ulang_1">Buat untuk 7 hari kedepan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="ulang_2" name="ulang" value="2">
                                <label class="form-check-label" for="ulang_2">Buat untuk 14 hari kedepan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="ulang_3" name="ulang" value="3">
                                <label class="form-check-label" for="ulang_3">Buat untuk 30 hari kedepan</label>
                            </div>
                        </div>
                    </div>
                    <?= form_hidden('id_jadwal', 0) ?>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-danger btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-alt-primary btn-sm tombol-simpan-jadwal" data-bs-dismiss="modal">
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
        Codebase.onLoad((() => e.init()));
    }();
    
    $(document).ready(function () {
        $('.tombol-tambah-jadwal').on('click', function () {
            $('.judul-modal').html('Tambah Jadwal Tentor');
            $('#id_kelas').val('');
            $('#mulai').val('');
            $('#selesai').val('');
            $('input[name="id_jadwal"]').val(0);
            
            $('#hari_senin').prop('checked', false).prop('disabled', false);
            $('#hari_selasa').prop('checked', false).prop('disabled', false);
            $('#hari_rabu').prop('checked', false).prop('disabled', false);
            $('#hari_kamis').prop('checked', false).prop('disabled', false);
            $('#hari_jumat').prop('checked', false).prop('disabled', false);
            $('#hari_sabtu').prop('checked', false).prop('disabled', false);
            $('#hari_minggu').prop('checked', false).prop('disabled', false);
            $('#hari_sekarang').prop('checked', false).prop('disabled', true);
            $('input[name="hari_sekarang"]').val('');
            
            $('#ulang_0').prop('checked', false).prop('disabled', true);
            $('#ulang_1').prop('checked', true).prop('disabled', false);
            $('#ulang_2').prop('checked', false).prop('disabled', false);
            $('#ulang_3').prop('checked', false).prop('disabled', false);
            $('#ulang_4').prop('checked', false).prop('disabled', false);
            
            $('#modal-ubah-jadwal').modal('show');
        });
        
        $('.tombol-ubah-jadwal').on('click', function () {
            let id_jadwal = $(this).data('id-jadwal');
            $.ajax({
                url: '<?= url_to('admin.jadwal.detail_jadwal') ?>',
                method: 'post',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_jadwal: id_jadwal
                },
                success: function (response) {
                    let data = JSON.parse(response);
                    let mulai = data.tanggal.split(' ');
                    let selesai = data.selesai.split(' ');
                    
                    $('.judul-modal').html('Ubah Jadwal Tentor');
                    $('#id_kelas').val(data.id_kelas);
                    $('#mulai').val(mulai[1]);
                    $('#selesai').val(selesai[1]);
                    $('input[name="id_jadwal"]').val(data.id_jadwal);
                    
                    $('#hari_senin').prop('checked', false).prop('disabled', true);
                    $('#hari_selasa').prop('checked', false).prop('disabled', true);
                    $('#hari_rabu').prop('checked', false).prop('disabled', true);
                    $('#hari_kamis').prop('checked', false).prop('disabled', true);
                    $('#hari_jumat').prop('checked', false).prop('disabled', true);
                    $('#hari_sabtu').prop('checked', false).prop('disabled', true);
                    $('#hari_minggu').prop('checked', false).prop('disabled', true);
                    $('#hari_sekarang').prop('checked', true).prop('disabled', false);
                    $('input[name="hari_sekarang"]').val(mulai[0]);
                    
                    $('#ulang_0').prop('checked', true).prop('disabled', false);
                    $('#ulang_1').prop('checked', false).prop('disabled', true);
                    $('#ulang_2').prop('checked', false).prop('disabled', true);
                    $('#ulang_3').prop('checked', false).prop('disabled', true);
                    $('#ulang_4').prop('checked', false).prop('disabled', true);
                    
                    $('#modal-ubah-jadwal').modal('show');
                }
            });
        });
        
        $('.tombol-hapus-jadwal').on('click', function (){
            let id_jadwal = $(this).data('id-jadwal');
            sa.fire({
                icon: 'question',
                title: 'Konfirmasi',
                text: 'Apakah anda yakin ingin menghapus jadwal ini?',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true,
            }).then((result) => {
                if(result.isConfirmed)
                {
                    $.ajax({
                        url: '<?= url_to('admin.jadwal.hapus_jadwal') ?>',
                        method: 'post',
                        data: {
                            <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                            id_jadwal: id_jadwal
                        },
                        success: function () {
                            sa.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Jadwal tentor berhasil dihapus',
                            }).then((result) => {
                                location.reload();
                            });
                        },
                        error: function (response) {
                            sa.fire({
                                icon: 'error',
                                title: 'Kesalahan Server!',
                                text: response.responseText,
                            });
                        }
                    });
                }
            });
        })
        
        $('.tombol-simpan-jadwal').on('click', function (){
            let id_jadwal = parseInt($('input[name="id_jadwal"]').val());
            let id_kelas = $('#id_kelas').val();
            let mulai = $('#mulai').val();
            let selesai = $('#selesai').val();
            let hari_senin = $('#hari_senin').is(':checked') ? parseInt($('input[name="hari_senin"]').val()) : null;
            let hari_selasa = $('#hari_selasa').is(':checked') ? parseInt($('input[name="hari_selasa"]').val()) : null;
            let hari_rabu = $('#hari_rabu').is(':checked') ? parseInt($('input[name="hari_rabu"]').val()) : null;
            let hari_kamis = $('#hari_kamis').is(':checked') ? parseInt($('input[name="hari_kamis"]').val()) : null;
            let hari_jumat = $('#hari_jumat').is(':checked') ? parseInt($('input[name="hari_jumat"]').val()) : null;
            let hari_sabtu = $('#hari_sabtu').is(':checked') ? parseInt($('input[name="hari_sabtu"]').val()) : null;
            let hari_minggu = $('#hari_minggu').is(':checked') ? parseInt($('input[name="hari_minggu"]').val()) : null;
            let hari_sekarang = $('#hari_sekarang').is(':checked') ? $('input[name="hari_sekarang"]').val() : null;
            let ulang = parseInt($('input[name="ulang"]:checked').val());
            
            let tanggal_mulai = '';
            let tanggal_selesai = '';
            let arr_mulai = [];
            let arr_selesai = [];
            
            if(id_jadwal !== 0)
            {
                tanggal_mulai = hari_sekarang + ' ' + mulai;
                tanggal_selesai = hari_sekarang + ' ' + selesai;
                
                arr_mulai.push(tanggal_mulai);
                arr_selesai.push(tanggal_selesai);
            }
            else
            {
                let batas_awal = new Date();
                let batas_akhir = new Date(getMonday(batas_awal));
                
                function getMonday(d) {
                    d = new Date(d);
                    let day = d.getDay(),
                        diff = d.getDate() - day + (day === 0 ? -6:1); // adjust when day is sunday
                    return new Date(d.setDate(diff));
                }
                
                switch (ulang)
                {
                    case 1:
                        batas_akhir.setDate(batas_akhir.getDate() + 7);
                        break;
                    case 2:
                        batas_akhir.setDate(batas_akhir.getDate() + 14);
                        break;
                    case 3:
                        batas_akhir.setMonth(batas_akhir.getMonth() + 1);
                        break;
                    default:
                        break;
                }
                
                // push array tanggal mulai dan tanggal selesai sampai batas_akhir
                while(batas_awal <= batas_akhir)
                {
                    let hari = batas_awal.getDay();
                    let tanggal = ("0" + batas_awal.getDate()).slice(-2);
                    let bulan = ("0" + (batas_awal.getMonth() + 1)).slice(-2);
                    let tahun = batas_awal.getFullYear();
                    
                    if(hari === 0)
                    {
                        hari = 7;
                    }
                    
                    if(hari_senin === hari || hari_selasa === hari || hari_rabu === hari || hari_kamis === hari || hari_jumat === hari || hari_sabtu === hari || hari_minggu === hari)
                    {
                        tanggal_mulai = tahun + '-' + bulan + '-' + tanggal + ' ' + mulai;
                        tanggal_selesai = tahun + '-' + bulan + '-' + tanggal + ' ' + selesai;
                        
                        arr_mulai.push(tanggal_mulai);
                        arr_selesai.push(tanggal_selesai);
                    }
                    
                    batas_awal.setDate(batas_awal.getDate() + 1);
                }
            }

            $.ajax({
                url: '<?= url_to('admin.jadwal.simpan_jadwal') ?>',
                method: 'post',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_pengajar: '<?= $tentor->id_pengajar ?>',
                    id_jadwal: id_jadwal,
                    id_kelas: id_kelas,
                    mulai: arr_mulai,
                    selesai: arr_selesai,
                },
                success: function () {
                    sa.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Jadwal tentor berhasil disimpan',
                    }).then((result) => {
                        location.reload();
                    });
                },
                error: function (response) {
                    sa.fire({
                        icon: 'error',
                        title: 'Kesalahan Server!',
                        text: response.responseText,
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>