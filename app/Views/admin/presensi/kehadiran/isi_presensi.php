<?= $this->extend('admin/_layout/master') ?>

<?php helper(['form']) ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Isi Kehadiran
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<style>
    .custom-btn-circle {
        width: 5vh;
        height: 5vh;
        border-radius: 2.5vh;
        font-size: 14px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= url_to('PresensiController::kehadiran_lihat_kelas', $kelas->id_kelas) ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Isi Kehadiran Siswa</span>
        </div>
        <div class="block-content px-3 py-4 d-flex row justify-content-between">
            <div class="col-12 col-xl-6 space-y-2">
                <div class="d-flex row space-y-1">
                    <div class="fs-lg">
                        <span class="badge bg-<?= $kelas->warna ?>"><?= $kelas->nama_jenjang ?></span>
                        <span class="badge bg-primary-op"><?= ($kelas->jenis == 0) ? 'Reguler' : 'Privat' ?></span>
                    </div>
                    <div class="fs-1">
                        <span class="fw-semibold">Kelas <?= $kelas->nama_kelas ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php if($pertemuan->foto != null): ?>
                        <img src="<?= base_url('uploads/' . $pertemuan->foto) ?>" width="100%" alt="gambar kehadiran">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-auto mt-3">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-alt-info text-center px-lg-4 py-lg-3" data-bs-toggle="modal" data-bs-target="#modal-tambah-foto">
                            <i class="fa fa-camera"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Tambah Foto</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 mt-3">
    <div class="block block-bordered">
        <div class="table-responsive p-0">
            <table class="table table-hover my-0">
                <thead>
                <tr class="bg-gray text-sm text-center">
                    <th class="col-1">No.</th>
                    <th class="col-5" style="min-width: 200px;">Data Siswa</th>
                    <th class="col-4" style="min-width: 125px;">Kehadiran</th>
                    <th class="col-2">Aksi</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                <?php foreach ($siswa as $k=>$s): ?>
                <tr>
                    <th class="text-center fw-medium fs-3" scope="row">
                        <?= $k+1 ?>
                    </th>
                    <td class="">
                        <div class="fw-medium"><?= $s->nama_siswa ?></div>
                        <div class="fs-sm"><?= $s->asal_sekolah ?></div>
                    </td>
                    <td class="text-center">
                    <?php $ketemu = false; ?>
                    <?php foreach($presensi as $p): ?>
                    <?php if($p->id_siswa == $s->id_siswa && $p->id_pertemuan = $pertemuan->id_pertemuan): ?>
                        <a href="javascript:void(0)" class="btn btn-<?= $p->status == 'H' ? '' : 'outline-'?>success custom-btn-circle" data-action="H" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Hadir">H</a>
                        <a href="javascript:void(0)" class="btn btn-<?= $p->status == 'S' ? '' : 'outline-'?>info custom-btn-circle" data-action="S" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Sakit">S</a>
                        <a href="javascript:void(0)" class="btn btn-<?= $p->status == 'I' ? '' : 'outline-'?>warning custom-btn-circle mt-2 mt-lg-0" data-action="I" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Izin">I</a>
                        <a href="javascript:void(0)" class="btn btn-<?= $p->status == 'A' ? '' : 'outline-'?>danger custom-btn-circle mt-2 mt-lg-0" data-action="A" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Alpa">A</a>
                        <a href="javascript:void(0)" class="btn btn-<?= $p->status == 'N' ? '' : 'outline-'?>secondary custom-btn-circle mt-2 mt-lg-0" data-action="N" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="None">N</a>
                    <?php $ketemu = true; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if(!$ketemu): ?>
                        <a href="javascript:void(0)" class="btn btn-outline-success custom-btn-circle" data-action="H" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Hadir">H</a>
                        <a href="javascript:void(0)" class="btn btn-outline-info custom-btn-circle" data-action="S" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Sakit">S</a>
                        <a href="javascript:void(0)" class="btn btn-outline-warning custom-btn-circle mt-2 mt-lg-0" data-action="I" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Izin">I</a>
                        <a href="javascript:void(0)" class="btn btn-outline-danger custom-btn-circle mt-2 mt-lg-0" data-action="A" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Alpa">A</a>
                        <a href="javascript:void(0)" class="btn btn-outline-secondary custom-btn-circle mt-2 mt-lg-0" data-action="N" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="None">N</a>
                    <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-outline-primary btn-sm tombol-catatan" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Catatan">
                            <i class="far fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-outline-info btn-sm tombol-penilaian mt-2 mt-lg-0" data-id-siswa="<?= $s->id_siswa ?>" data-bs-toggle="tooltip" title="Penilaian">
                            <i class="fa fa-book"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-catatan" tabindex="-1" role="dialog" aria-labelledby="modal-catatan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Catatan untuk Siswa</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="form-floating mb-4">
                        <textarea class="form-control" id="catatan" name="catatan" style="height: 100px;" placeholder="Masukkan catatan disini"></textarea>
                        <label class="form-label" for="catatan">Masukkan catatan disini...</label>
                        <input type="hidden" name="id_siswa">
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-danger btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-alt-primary btn-sm" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade form-skor" id="modal-penilaian" tabindex="-1" role="dialog" aria-labelledby="modal-penilaian" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Penilaian untuk Siswa</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm form-nilai">
                    <?php foreach($nilai as $k=>$n): ?>
                    <?= form_hidden('id_nilai[]', $n->id_nilai) ?>
                    <div class="form-floating mb-4">
                        <?php if($n->jenis == 0): ?>
                            <select class="form-select nilai-skor" id="skor<?= $n->id_nilai ?>" name="skor_select[]">
                                <option value="" selected disabled>-- Pilih nilai--</option>
                                <?php foreach ($skor->{$n->id_nilai} as $s): ?>
                                    <?php
                                        $skor_full = $s->skor;
                                        $skor_int = intval($skor_full);
                                        $skor_str = explode($skor_int . " - ", $skor_full)[1];
                                    ?>
                                    <option value="<?= $skor_int ?>"><?= $skor_str ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="skor<?= $n->id_nilai ?>"><?= $n->nama_nilai ?></label>
                        <?php else: ?>
                            <input class="form-control nilai-skor" type="number" name="skor[]" id="skor<?= $n->id_nilai ?>" placeholder="Masukkan nilai disini" min="<?= $skor->{$n->id_nilai}[0]->skor ?>" max="<?= $skor->{$n->id_nilai}[1]->skor ?>" required>
                            <label for="skor<?= $n->id_nilai ?>"><?= $n->nama_nilai ?> (Skala: <?= $skor->{$n->id_nilai}[0]->skor ?> - <?= $skor->{$n->id_nilai}[1]->skor ?>)</label>
                        <?php endif; ?>
                        
                        <input type="hidden" name="id_penilaian[]">
                    </div>
                    <?php endforeach; ?>
                    <input type="hidden" name="id_siswa">
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-danger btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-alt-primary btn-sm" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?= url_to('admin.presensi.kehadiran.simpan_foto') ?>" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
<?= form_hidden('id_kelas', $kelas->id_kelas) ?>
<?= form_hidden('id_pertemuan', $pertemuan->id_pertemuan) ?>
<div class="modal fade" id="modal-tambah-foto" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-foto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Foto Kelas</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm mb-5">
                    <label class="form-label" for="example-file-input">File foto (hanya 1 saja)</label>
                    <input class="form-control" type="file" name="file_foto" id="file_foto">
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-danger btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-alt-primary btn-sm">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/jquery-validation/jquery.validate.min.js') ?>
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
    
    $(document).ready(function()
    {
        let id_pertemuan = <?= $pertemuan->id_pertemuan ?>;
        let belum_expired = '<?= $cek_presensi ?>';

        // jQuery untuk menangani perubahan warna tombol berdasarkan respons AJAX
        $('.custom-btn-circle').click(function() {
            let status = $(this).data('action');
            let id_siswa = $(this).data('id-siswa');
            let button = $(this);

            if(belum_expired)
            {
                $.ajax({
                    url: '<?= url_to('admin.presensi.kehadiran.simpan_presensi') ?>',
                    type: 'POST',
                    data: {
                        '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
                        status: status,
                        id_siswa: id_siswa,
                        id_pertemuan: id_pertemuan,
                    },
                    dataType: 'json',
                    success: function() {
                        // Gunakan $button di sini untuk mengubah warna tombol
                        updateButtonColor(button, status);
                        sa.fire({
                            icon: 'success',
                            title: 'Kehadiran Disimpan!',
                            html: '<span>Data kehadiran telah <b>disimpan</b> atau <b>diperbarui</b>.</span>',
                        });
                    },
                    error: function() {
                        sa.fire({
                            icon: 'error',
                            title: 'Kesalahan Server!',
                            html: '<span>Data gagal disimpan, mohon <b>ulangi</b> pengisian formulir.</span>',
                        });
                    }
                });
            }
            else
            {
                sa.fire({
                    icon: 'error',
                    title: 'Pengisian Expired!',
                    html: '<span>Kehadiran siswa tidak bisa diubah karena <b>melewati batas waktu</b>.</span>',
                });
            }
        });

        // Ketika tombol "Tampilkan Modal" diklik
        $(".tombol-catatan").click(function() {
            let id_siswa = $(this).data('id-siswa');

            // Lakukan pemanggilan Ajax untuk mengambil data
            $.ajax({
                url: '<?= url_to('admin.presensi.kehadiran.ambil_catatan') ?>', // Ganti dengan URL yang sesuai
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_siswa: id_siswa,
                    id_pertemuan: id_pertemuan
                },
                type: "POST",
                dataType: "json",
                success: function(data) {
                    // Isi textarea dengan data yang diterima dari server
                    $("#catatan").val(data.catatan);
                    $("input[name=id_siswa]").val(id_siswa);
                    $("#modal-catatan").modal("show");
                },
                error: function() {
                    sa.fire({
                        icon: 'error',
                        title: 'Kesalahan Pengguna!',
                        html: '<span>Mohon mengisi <b>kehadiran siswa</b> terlebih dahulu.</span>',
                    });
                }
            });
        });

        // Ketika tombol "Tampilkan Modal" diklik
        $(".tombol-penilaian").click(function() {
            let id_siswa = $(this).data('id-siswa');
            
            // Lakukan pemanggilan Ajax untuk mengambil data
            $.ajax({
                url: '<?= url_to('admin.penilaian.ambil_nilai') ?>', // Ganti dengan URL yang sesuai
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_siswa: id_siswa,
                    id_pertemuan: id_pertemuan
                },
                type: "POST",
                dataType: "json",
                success: function(data) {
                    let id_penilaian_array = [];
                    
                    if(data.length > 0)
                    {
                        $.each(data, function(i, item) {
                            if (item.jenis === 0) {
                                $("#skor" + item.id_nilai).children("option").each(function() {
                                    let skor_dropdown = $(this).val();
                                    let skor_saja = parseInt(skor_dropdown);
                                    
                                    if (skor_saja === item.nilai) {
                                        $(this).prop('selected', true);
                                    }
                                });
                            } else {
                                $("#skor" + item.id_nilai).val(item.nilai);
                            }

                            if (id_penilaian_array.indexOf(item.id_penilaian) === -1) {
                                id_penilaian_array.push(item.id_penilaian);
                            }
                        });

                        $("input[name='id_penilaian[]']").each(function(i) {
                            $(this).val(id_penilaian_array[i]);
                        });
                    }
                    else
                    {
                        $(".nilai-skor").each(function() {
                            if ($(this).is("input")) {
                                $(this).val("");
                            } else if ($(this).is("select")) {
                                $(this).val("");
                            }
                        });
                        $("input[name='id_penilaian[]']").each(function() {
                            $(this).val("");
                        });
                    }
                    
                    $("input[name=id_siswa]").val(id_siswa);
                    $("#modal-penilaian").modal("show");
                },
                error: function() {
                    sa.fire({
                        icon: 'error',
                        title: 'Kesalahan Pengguna!',
                        html: '<span>Mohon mengisi <b>kehadiran siswa</b> terlebih dahulu.</span>',
                    });
                }
            });
        });

        // Ketika tombol "Simpan" di dalam modal diklik
        $("#modal-catatan").on("click", ".btn-alt-primary", function() {
            let catatan = $("#catatan").val();
            let id_siswa = $("input[name=id_siswa]").val();

            if(belum_expired)
            {
                // Lakukan pemanggilan Ajax untuk mengirim data
                $.ajax({
                    url: '<?= url_to('admin.presensi.kehadiran.simpan_catatan') ?>', // Ganti dengan URL yang sesuai
                    type: "POST",
                    data: {
                        <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                        id_siswa: id_siswa,
                        id_pertemuan: id_pertemuan,
                        catatan: catatan
                    },
                    success: function() {
                        // Tutup modal setelah berhasil menyimpan data
                        $("#modal-catatan").modal("hide");
                        sa.fire({
                            icon: 'success',
                            title: 'Catatan Disimpan!',
                            html: '<span>Catatan siswa telah <b>disimpan</b> atau <b>diperbarui</b>.</span>',
                        });
                    },
                    error: function() {
                        // Jika ada kesalahan, tampilkan pesan kesalahan
                        sa.fire({
                            icon: 'error',
                            title: 'Kesalahan Server!',
                            html: '<span>Data gagal disimpan, mohon <b>ulangi</b> pengisian formulir.</span>',
                        });
                    }
                });
            }
            else
            {
                sa.fire({
                    icon: 'error',
                    title: 'Pengisian Expired!',
                    html: '<span>Catatan siswa tidak bisa diubah karena <b>melewati batas waktu</b>.</span>',
                });
            }
        });

        // Ketika tombol "Simpan" di dalam modal diklik
        $("#modal-penilaian").on("click", ".btn-alt-primary", function() {
            let id_siswa = $("input[name=id_siswa]").val();
            let skor = [];
            let jenis = [<?php foreach($nilai as $n)  { echo $n->jenis . ","; } ?>];
            let min_skor = [
                <?php foreach($nilai as $k=>$n)
                {
                    if($n->jenis == 1) echo $skor->{$n->id_nilai}[0]->skor . ",";
                    else echo "-1,";
                }
                ?>];
            let max_skor = [
                <?php foreach($nilai as $k=>$n)
                {
                    if($n->jenis == 1) echo $skor->{$n->id_nilai}[1]->skor . ",";
                    else echo "-1,";
                }
                ?>];
            
            $(".form-nilai").find(".nilai-skor").each(function() {
                if ($(this).is("input")) {
                    skor.push($(this).val());
                } else if ($(this).is("select")) {
                    skor.push($(this).val());
                }
            });
            
            let id_nilai = ($("input[name='id_nilai[]']").map(function(){
                return $(this).val();
            }).get());
            let id_penilaian = ($("input[name='id_penilaian[]']").map(function(){
                return $(this).val();
            }).get());
            
            if(belum_expired)
            {
                let nilai = [];
                let data = {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_siswa: id_siswa,
                    id_pertemuan: id_pertemuan,
                    nilai_arr: nilai,
                };
                let aman = 0;
                
                $(id_nilai).each(function(i, item) {
                    if ((jenis[i] === 0 && skor[i] !== null) || (jenis[i] === 1 && skor[i] >= min_skor[i] && skor[i] <= max_skor[i])) {
                        if (id_penilaian[i] !== "") {
                            nilai.push({
                                id_nilai: item,
                                id_penilaian: id_penilaian[i],
                                nilai: skor[i],
                            });
                        } else {
                            nilai.push({
                                id_nilai: item,
                                nilai: skor[i],
                            });
                        }
                        aman += 1;
                    } else if (jenis[i] === 1) {
                        sa.fire({
                            icon: 'error',
                            title: 'Input Tidak Valid!',
                            html: '<span>Nilai harus antara <b>' + min_skor[i] + '</b> sampai <b>' + max_skor[i] + '</b></span>',
                        });
                    } else if (jenis[i] === 0) {
                        sa.fire({
                            icon: 'error',
                            title: 'Input Tidak Valid!',
                            html: '<span>Nilai harus dipilih dari <b>dropdown</b> yang ada</span>',
                        });
                    }
                });

                if(aman === id_nilai.length)
                {
                    $.ajax({
                        url: '<?= url_to('admin.penilaian.simpan_nilai') ?>',
                        type: "POST",
                        data: data,
                        success: function() {
                            // Tutup modal setelah berhasil menyimpan data
                            $("#modal-penilaian").modal("hide");
                            sa.fire({
                                icon: 'success',
                                title: 'Penilaian Disimpan!',
                                html: '<span>Penilaian siswa telah <b>disimpan</b> atau <b>diperbarui</b>.</span>',
                            });
                        },
                        error: function() {
                            // Jika ada kesalahan, tampilkan pesan kesalahan
                            sa.fire({
                                icon: 'error',
                                title: 'Kesalahan Server!',
                                html: '<span>Data gagal disimpan, mohon <b>ulangi</b> pengisian formulir.</span>',
                            });
                        }
                    });
                }
            }
            else
            {
                sa.fire({
                    icon: 'error',
                    title: 'Pengisian Expired!',
                    html: '<span>Penilaian siswa tidak bisa diubah karena <b>melewati batas waktu</b>.</span>',
                });
            }
        });
    });

    // Fungsi untuk mengubah warna tombol berdasarkan tindakan
    function updateButtonColor(buttonElement, action) {
        // Hapus semua kelas warna tombol
        buttonElement.removeClass('btn-outline-success btn-outline-info btn-outline-warning btn-outline-danger btn-outline-secondary');
        buttonElement.removeClass('text-success text-info text-warning text-danger text-secondary');

        // Tentukan kelas warna tombol berdasarkan tindakan
        switch (action) {
            case 'H':
                buttonElement.addClass('btn-success');
                break;
            case 'S':
                buttonElement.addClass('btn-info');
                break;
            case 'I':
                buttonElement.addClass('btn-warning');
                break;
            case 'A':
                buttonElement.addClass('btn-danger');
                break;
            case 'N':
                buttonElement.addClass('btn-secondary');
                break;
            default:
                // Tindakan tidak valid, atur warna default atau kelas lainnya
                break;
        }
        buttonElement.addClass('text-white');
    }
</script>
<?= $this->endSection() ?>
