<?php

namespace Config;

use App\Controllers\AdminController;
use App\Controllers\AkunController;
use App\Controllers\JadwalController;
use App\Controllers\JenjangController;
use App\Controllers\LaporanController;
use App\Controllers\PaketController;
use App\Controllers\PembayaranController;
use App\Controllers\TentorController;
use App\Controllers\PenilaianController;
use App\Controllers\PresensiController;
use App\Controllers\SemesterController;
use App\Controllers\SiswaController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('/', function ($routes)
{
    $routes->get('', [AdminController::class, 'masuk'], ['as' => 'publik.masuk.index']);
    $routes->post('', [AdminController::class, 'masuk_post'], ['as' => 'publik.masuk.post']);
});

$routes->group('admin', function ($routes)
{
    $routes->group('beranda', function ($routes)
    {
        $routes->get('',
            [AdminController::class, 'index'], ['as' => 'admin.beranda.index']);
        $routes->get('keluar',
            [AdminController::class, 'keluar'], ['as' => 'admin.beranda.keluar']);
    });
    
    $routes->group('presensi', function ($routes)
    {
        $routes->get('',
            [PresensiController::class, 'index'], ['as' => 'admin.presensi.index']);
        
        $routes->group('kehadiran', function ($routes)
        {
            $routes->get('pilih-kelas',
                [PresensiController::class, 'kehadiran_pilih_kelas'], ['as' => 'admin.presensi.kehadiran.pilih_kelas']);
            $routes->get('lihat-kelas/(:num)',
                [[PresensiController::class, 'kehadiran_lihat_kelas'], '$1']);
            $routes->get('isi-presensi/(:num)/(:num)',
                [[PresensiController::class, 'kehadiran_isi_presensi'], '$1/$2']);
            
            $routes->get('tambah-presensi/(:num)',
                [[PresensiController::class, 'kehadiran_tambah_presensi'], '$1']);
            $routes->post('tambah-presensi',
                [PresensiController::class, 'kehadiran_tambah_presensi_post'], ['as' => 'admin.presensi.kehadiran.tambah_presensi.post']);
            $routes->get('ubah-presensi/(:num)/(:num)',
                [[PresensiController::class, 'kehadiran_ubah_presensi'], '$1/$2']);
            $routes->post('ubah-presensi',
                [PresensiController::class, 'kehadiran_ubah_presensi_post'], ['as' => 'admin.presensi.kehadiran.ubah_presensi.post']);
            $routes->post('hapus-presensi',
                [PresensiController::class, 'kehadiran_hapus_presensi'], ['as' => 'admin.presensi.kehadiran.hapus_presensi']);
            
            $routes->post('simpan-foto',
                [PresensiController::class, 'kehadiran_simpan_foto'], ['as' => 'admin.presensi.kehadiran.simpan_foto']);
            $routes->post('simpan-presensi',
                [PresensiController::class, 'kehadiran_simpan_presensi'], ['as' => 'admin.presensi.kehadiran.simpan_presensi']);
            $routes->post('simpan-catatan',
                [PresensiController::class, 'kehadiran_simpan_catatan'], ['as' => 'admin.presensi.kehadiran.simpan_catatan']);
            $routes->post('ambil-catatan',
                [PresensiController::class, 'kehadiran_ambil_catatan'], ['as' => 'admin.presensi.kehadiran.ambil_catatan']);
        });
        
        $routes->group('pengaturan', function ($routes)
        {
            $routes->get('pilih-kelas',
                [PresensiController::class, 'pengaturan_pilih_kelas'], ['as' => 'admin.presensi.pengaturan.pilih_kelas']);
            $routes->get('lihat-kelas/(:num)',
                [[PresensiController::class, 'pengaturan_lihat_kelas'], '$1']);
            
            $routes->get('tambah-kelas',
                [PresensiController::class, 'pengaturan_tambah_kelas'], ['as' => 'admin.presensi.pengaturan.tambah_kelas']);
            $routes->post('tambah-kelas',
                [PresensiController::class, 'pengaturan_tambah_kelas_post'], ['as' => 'admin.presensi.pengaturan.tambah_kelas.post']);
            $routes->get('ubah-kelas/(:num)',
                [[PresensiController::class, 'pengaturan_ubah_kelas'], '$1']);
            $routes->post('ubah-kelas',
                [PresensiController::class, 'pengaturan_ubah_kelas_post'], ['as' => 'admin.presensi.pengaturan.ubah_kelas.post']);
            $routes->get('hapus-kelas',
                [PresensiController::class, 'pengaturan_hapus_kelas'], ['as' => 'admin.presensi.pengaturan.hapus_kelas']);
            
            $routes->get('tambah-siswa',
                [PresensiController::class, 'pengaturan_tambah_siswa'], ['as' => 'admin.presensi.pengaturan.tambah_siswa']);
            $routes->post('tambah-siswa',
                [PresensiController::class, 'pengaturan_tambah_siswa_post'], ['as' => 'admin.presensi.pengaturan.tambah_siswa.post']);
            $routes->get('ubah-siswa',
                [PresensiController::class, 'pengaturan_ubah_siswa'], ['as' => 'admin.presensi.pengaturan.ubah_siswa']);
            $routes->post('ubah-siswa',
                [PresensiController::class, 'pengaturan_ubah_siswa_post'], ['as' => 'admin.presensi.pengaturan.ubah_siswa.post']);
            $routes->get('hapus-siswa',
                [PresensiController::class, 'pengaturan_hapus_siswa'], ['as' => 'admin.presensi.pengaturan.hapus_siswa']);
            
            $routes->post('daftar-tingkat',
                [PresensiController::class, 'pengaturan_daftar_tingkat'], ['as' => 'admin.presensi.pengaturan.daftar_tingkat']);
        });
    });
    
    $routes->group('penilaian', function ($routes)
    {
        $routes->get('',
            [PenilaianController::class, 'index'], ['as' => 'admin.penilaian.index']);
        
        $routes->get('lihat-komponen',
            [PenilaianController::class, 'lihat_komponen'], ['as' => 'admin.penilaian.lihat_komponen']);
        $routes->post('simpan-komponen',
            [PenilaianController::class, 'simpan_komponen'], ['as' => 'admin.penilaian.simpan_komponen']);
        $routes->post('ambil-nilai',
            [PenilaianController::class, 'ambil_nilai'], ['as' => 'admin.penilaian.ambil_nilai']);
        $routes->post('simpan-nilai',
            [PenilaianController::class, 'simpan_nilai'], ['as' => 'admin.penilaian.simpan_nilai']);
    });
    
    $routes->group('laporan', function ($routes)
    {
        $routes->get('',
            [LaporanController::class, 'index'], ['as' => 'admin.laporan.index']);
        $routes->get('pilih-kelas',
            [LaporanController::class, 'pilih_kelas'], ['as' => 'admin.laporan.pilih_kelas']);
        $routes->get('lihat-kelas/(:num)',
            [[LaporanController::class, 'lihat_kelas'], '$1']);
        $routes->get('laporan-siswa/(:num)/(:num)',
            [[LaporanController::class, 'laporan_siswa'], '$1/$2']);
        $routes->post('cetak',
            [LaporanController::class, 'cetak'], ['as' => 'admin.laporan.cetak']);
    });
    
    $routes->group('siswa', function ($routes)
    {
        $routes->get('',
            [SiswaController::class, 'index'], ['as' => 'admin.siswa.index']);
        $routes->get('siswa-aktif',
            [SiswaController::class, 'siswa_aktif'], ['as' => 'admin.siswa.siswa_aktif']);
        $routes->get('siswa-nonaktif',
            [SiswaController::class, 'siswa_nonaktif'], ['as' => 'admin.siswa.siswa_nonaktif']);
        $routes->get('tambah-siswa',
            [SiswaController::class, 'tambah_siswa'], ['as' => 'admin.siswa.tambah_siswa']);
        $routes->post('tambah-siswa',
            [SiswaController::class, 'simpan_data_siswa_aktif'], ['as' => 'admin.siswa.tambah_siswa.post']);
        $routes->get('ubah-siswa/(:num)',
            [[SiswaController::class, 'ubah_siswa'], '$1']);
        $routes->post('ubah-siswa',
            [SiswaController::class, 'simpan_data_siswa_aktif'], ['as' => 'admin.siswa.ubah_siswa.post']);
        $routes->post('hapus-siswa',
            [SiswaController::class, 'hapus_siswa'], ['as' => 'admin.siswa.hapus_siswa.post']);
        $routes->post('arsip-siswa',
            [SiswaController::class, 'arsip_siswa'], ['as' => 'admin.siswa.arsip_siswa']);
        $routes->post('aktif-siswa',
            [SiswaController::class, 'aktif_siswa'], ['as' => 'admin.siswa.aktif_siswa']);
    });
    
    $routes->group('tentor', function ($routes)
    {
        $routes->get('',
            [TentorController::class, 'index'], ['as' => 'admin.tentor.index']);
        $routes->get('tentor-aktif',
            [TentorController::class, 'tentor_aktif'], ['as' => 'admin.tentor.tentor_aktif']);
        $routes->get('tentor-nonaktif',
            [TentorController::class, 'tentor_nonaktif'], ['as' => 'admin.tentor.tentor_nonaktif']);
        $routes->get('tambah-tentor',
            [TentorController::class, 'tambah_tentor'], ['as' => 'admin.tentor.tambah_tentor']);
        $routes->post('tambah-tentor',
            [TentorController::class, 'tambah_tentor_post'], ['as' => 'admin.tentor.tambah_tentor.post']);
        $routes->get('ubah-tentor/(:num)',
            [[TentorController::class, 'ubah_tentor'], '$1']);
        $routes->post('ubah-tentor',
            [TentorController::class, 'ubah_tentor_post'], ['as' => 'admin.tentor.ubah_tentor.post']);
        $routes->post('hapus-tentor',
            [TentorController::class, 'hapus_tentor'], ['as' => 'admin.tentor.hapus_tentor']);
        $routes->post('arsip-tentor',
            [TentorController::class, 'arsip_tentor'], ['as' => 'admin.tentor.arsip_tentor']);
        $routes->post('aktif-tentor',
            [TentorController::class, 'aktif_tentor'], ['as' => 'admin.tentor.aktif_tentor']);
    });
    
    $routes->group('jadwal', function ($routes)
    {
        $routes->get('',
            [JadwalController::class, 'index'], ['as' => 'admin.jadwal.index']);
        $routes->get('siswa-aktif',
            [JadwalController::class, 'siswa_aktif'], ['as' => 'admin.jadwal.siswa_aktif']);
        $routes->get('tentor-aktif',
            [JadwalController::class, 'tentor_aktif'], ['as' => 'admin.jadwal.tentor_aktif']);
    });
    
    $routes->group('jenjang', function ($routes)
    {
        $routes->get('',
            [JenjangController::class, 'index'], ['as' => 'admin.jenjang.index']);
        
        $routes->get('tambah-jenjang',
            [JenjangController::class, 'tambah_jenjang'], ['as' => 'admin.jenjang.tambah_jenjang']);
        $routes->post('tambah-jenjang',
            [JenjangController::class, 'tambah_jenjang_post'], ['as' => 'admin.jenjang.tambah_jenjang.post']);
        $routes->get('ubah-jenjang',
            [JenjangController::class, 'ubah_jenjang'], ['as' => 'admin.jenjang.ubah_jenjang']);
        $routes->post('ubah-jenjang',
            [JenjangController::class, 'ubah_jenjang_post'], ['as' => 'admin.jenjang.ubah_jenjang.post']);
        $routes->get('hapus-jenjang',
            [JenjangController::class, 'hapus_jenjang'], ['as' => 'admin.jenjang.hapus_jenjang']);
        
        $routes->get('tambah-tingkat',
            [JenjangController::class, 'tambah_tingkat'], ['as' => 'admin.jenjang.tambah_tingkat']);
        $routes->post('tambah-tingkat',
            [JenjangController::class, 'tambah_tingkat_post'], ['as' => 'admin.jenjang.tambah_tingkat.post']);
        $routes->get('ubah-tingkat',
            [JenjangController::class, 'ubah_tingkat'], ['as' => 'admin.jenjang.ubah_tingkat']);
        $routes->post('ubah-tingkat',
            [JenjangController::class, 'ubah_tingkat_post'], ['as' => 'admin.jenjang.ubah_tingkat.post']);
        $routes->get('hapus-tingkat',
            [JenjangController::class, 'hapus_tingkat'], ['as' => 'admin.jenjang.hapus_tingkat']);
    });
    
    $routes->group('semester', function ($routes)
    {
        $routes->get('',
            [SemesterController::class, 'index'], ['as' => 'admin.semester.index']);
        $routes->get('daftar-semester',
            [SemesterController::class, 'daftar_semester'], ['as' => 'admin.semester.daftar_semester']);
        $routes->get('tambah-semester',
            [SemesterController::class, 'tambah_semester'], ['as' => 'admin.semester.tambah_semester']);
        $routes->post('tambah-semester',
            [SemesterController::class, 'tambah_semester_post'], ['as' => 'admin.semester.tambah_semester.post']);
        $routes->get('ubah-semester',
            [SemesterController::class, 'ubah_semester'], ['as' => 'admin.semester.ubah_semester']);
        $routes->post('ubah-semester',
            [SemesterController::class, 'ubah_semester_post'], ['as' => 'admin.semester.ubah_semester.post']);
        $routes->get('hapus-semester',
            [SemesterController::class, 'hapus_semester'], ['as' => 'admin.semester.hapus_semester']);
    });
    
    $routes->group('pembayaran', function ($routes)
    {
        $routes->get('',
            [PembayaranController::class, 'index'], ['as' => 'admin.pembayaran.index']);
    });
    
    $routes->group('paket', function ($routes)
    {
        $routes->get('',
            [PaketController::class, 'index'], ['as' => 'admin.paket.index']);
    });
    
    $routes->group('akun', function ($routes)
    {
        $routes->get('',
            [AkunController::class, 'index'], ['as' => 'admin.akun.index']);
        $routes->get('ubah-password',
            [AkunController::class, 'ubah_password'], ['as' => 'admin.akun.ubah_password']);
        $routes->post('ubah-password',
            [AkunController::class, 'ubah_password_post'], ['as' => 'admin.akun.ubah_password.post']);
    });
});

