<?php

namespace Config;

use App\Controllers\AdminController;
use App\Controllers\JadwalController;
use App\Controllers\JenjangController;
use App\Controllers\LaporanController;
use App\Controllers\MentorController;
use App\Controllers\PenilaianController;
use App\Controllers\PresensiController;
use App\Controllers\SemesterController;
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
$routes->get('/', [AdminController::class, 'masuk'], ['as' => 'publik.masuk.index']);

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
    
    $routes->group('penilaian', function ($routes)
    {
        $routes->get('',
            [PenilaianController::class, 'index'], ['as' => 'admin.penilaian.index']);
        
        $routes->get('pilih-kelas',
            [PenilaianController::class, 'pilih_kelas'], ['as' => 'admin.penilaian.pilih_kelas']);
        $routes->get('lihat-kelas',
            [PenilaianController::class, 'lihat_kelas'], ['as' => 'admin.penilaian.lihat_kelas']);
        $routes->get('tambah-penilaian',
            [PenilaianController::class, 'tambah_penilaian'], ['as' => 'admin.penilaian.tambah_penilaian']);
        $routes->get('isi-penilaian',
            [PenilaianController::class, 'isi_penilaian'], ['as' => 'admin.penilaian.isi_penilaian']);
        
        $routes->get('lihat-komponen',
            [PenilaianController::class, 'lihat_komponen'], ['as' => 'admin.penilaian.lihat_komponen']);
    });
    
    $routes->group('laporan', function ($routes)
    {
        $routes->get('',
            [LaporanController::class, 'index'], ['as' => 'admin.laporan.index']);
        $routes->get('pilih-kelas',
            [LaporanController::class, 'pilih_kelas'], ['as' => 'admin.laporan.pilih_kelas']);
        $routes->get('lihat-kelas',
            [LaporanController::class, 'lihat_kelas'], ['as' => 'admin.laporan.lihat_kelas']);
        $routes->get('laporan-siswa',
            [LaporanController::class, 'laporan_siswa'], ['as' => 'admin.laporan.laporan_siswa']);
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
            [SiswaController::class, 'tambah_siswa_post'], ['as' => 'admin.siswa.tambah_siswa.post']);
        $routes->get('ubah-siswa',
            [SiswaController::class, 'ubah_siswa'], ['as' => 'admin.siswa.ubah_siswa']);
        $routes->post('ubah-siswa',
            [SiswaController::class, 'ubah_siswa_post'], ['as' => 'admin.siswa.ubah_siswa.post']);
        $routes->get('hapus-siswa',
            [SiswaController::class, 'hapus_siswa'], ['as' => 'admin.siswa.hapus_siswa']);
        $routes->get('arsip-siswa',
            [SiswaController::class, 'arsip_siswa'], ['as' => 'admin.siswa.arsip_siswa']);
    });
    
    $routes->group('mentor', function ($routes)
    {
        $routes->get('',
            [MentorController::class, 'index'], ['as' => 'admin.mentor.index']);
        $routes->get('mentor-aktif',
            [MentorController::class, 'mentor_aktif'], ['as' => 'admin.mentor.mentor_aktif']);
        $routes->get('mentor-nonaktif',
            [MentorController::class, 'mentor_nonaktif'], ['as' => 'admin.mentor.mentor_nonaktif']);
        $routes->get('tambah-mentor',
            [MentorController::class, 'tambah_mentor'], ['as' => 'admin.mentor.tambah_mentor']);
        $routes->post('tambah-mentor',
            [MentorController::class, 'tambah_mentor_post'], ['as' => 'admin.mentor.tambah_mentor.post']);
        $routes->get('ubah-mentor',
            [MentorController::class, 'ubah_mentor'], ['as' => 'admin.mentor.ubah_mentor']);
        $routes->post('ubah-mentor',
            [MentorController::class, 'ubah_mentor_post'], ['as' => 'admin.mentor.ubah_mentor.post']);
        $routes->get('hapus-mentor',
            [MentorController::class, 'hapus_mentor'], ['as' => 'admin.mentor.hapus_mentor']);
        $routes->get('arsip-mentor',
            [MentorController::class, 'arsip_mentor'], ['as' => 'admin.mentor.arsip_mentor']);
    });
    
    $routes->group('jadwal', function ($routes)
    {
        $routes->get('',
            [JadwalController::class, 'index'], ['as' => 'admin.jadwal.index']);
        $routes->get('siswa-aktif',
            [JadwalController::class, 'siswa_aktif'], ['as' => 'admin.jadwal.siswa_aktif']);
        $routes->get('mentor-aktif',
            [JadwalController::class, 'mentor_aktif'], ['as' => 'admin.jadwal.mentor_aktif']);
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
