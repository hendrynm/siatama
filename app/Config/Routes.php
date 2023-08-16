<?php

namespace Config;

use App\Controllers\AdminController;
use App\Controllers\JadwalController;
use App\Controllers\MentorController;
use App\Controllers\PresensiController;
use App\Controllers\SiswaController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('admin', function ($routes)
{
    $routes->group('beranda', function ($routes)
    {
        $routes->get('',
            [AdminController::class, 'index'], ['as' => 'admin.beranda.index']);
    });
    
    $routes->group('presensi', function ($routes)
    {
        $routes->get('',
            [PresensiController::class, 'index'], ['as' => 'admin.presensi.index']);
        
        $routes->group('kehadiran', function ($routes)
        {
            $routes->get('pilih-kelas',
                [PresensiController::class, 'kehadiran_pilih_kelas'], ['as' => 'admin.presensi.kehadiran.pilih_kelas']);
            $routes->get('lihat-kelas',
                [PresensiController::class, 'kehadiran_lihat_kelas'], ['as' => 'admin.presensi.kehadiran.lihat_kelas']);
            $routes->get('isi-presensi',
                [PresensiController::class, 'kehadiran_isi_presensi'], ['as' => 'admin.presensi.kehadiran.isi_presensi']);
            
            $routes->get('tambah-presensi',
                [PresensiController::class, 'kehadiran_tambah_presensi'], ['as' => 'admin.presensi.kehadiran.tambah_presensi']);
            $routes->post('tambah-presensi',
                [PresensiController::class, 'kehadiran_tambah_presensi_post'], ['as' => 'admin.presensi.kehadiran.tambah_presensi.post']);
            $routes->get('ubah-presensi',
                [PresensiController::class, 'kehadiran_ubah_presensi'], ['as' => 'admin.presensi.kehadiran.ubah_presensi']);
            $routes->post('ubah-presensi',
                [PresensiController::class, 'kehadiran_ubah_presensi_post'], ['as' => 'admin.presensi.kehadiran.ubah_presensi.post']);
            $routes->get('hapus-presensi',
                [PresensiController::class, 'kehadiran_hapus_presensi'], ['as' => 'admin.presensi.kehadiran.hapus_presensi']);
        });
        
        $routes->group('pengaturan', function ($routes)
        {
            $routes->get('pilih-kelas',
                [PresensiController::class, 'pengaturan_pilih_kelas'], ['as' => 'admin.presensi.pengaturan.pilih_kelas']);
            $routes->get('lihat-kelas',
                [PresensiController::class, 'pengaturan_lihat_kelas'], ['as' => 'admin.presensi.pengaturan.lihat_kelas']);
            
            $routes->get('tambah-kelas',
                [PresensiController::class, 'pengaturan_tambah_kelas'], ['as' => 'admin.presensi.pengaturan.tambah_kelas']);
            $routes->post('tambah-kelas',
                [PresensiController::class, 'pengaturan_tambah_kelas_post'], ['as' => 'admin.presensi.pengaturan.tambah_kelas.post']);
            $routes->get('ubah-kelas',
                [PresensiController::class, 'pengaturan_ubah_kelas'], ['as' => 'admin.presensi.pengaturan.ubah_kelas']);
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
        });
    });
    
    $routes->group('rapor', function ($routes)
    {
    
    });
    
    $routes->group('siswa', function ($routes)
    {
        $routes->get('',
            [SiswaController::class, 'daftar_siswa_aktif'], ['as' => 'admin.siswa.daftar_siswa_aktif']);
    });
    
    $routes->group('mentor', function ($routes)
    {
        $routes->get('',
            [MentorController::class, 'daftar_mentor_aktif'], ['as' => 'admin.mentor.daftar_mentor_aktif']);
    });
    
    $routes->group('jadwal', function ($routes)
    {
        $routes->get('semua-siswa-aktif',
            [JadwalController::class, 'semua_siswa_aktif'], ['as' => 'admin.jadwal.semua_siswa_aktif']);
        $routes->get('semua-mentor-aktif',
            [JadwalController::class, 'semua_mentor_aktif'], ['as' => 'admin.jadwal.semua_mentor_aktif']);
    });
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
