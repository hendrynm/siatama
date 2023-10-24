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
            $routes->post('hapus-kelas',
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
        
        $routes->get('daftar-tentor',
            [LaporanController::class, 'daftar_tentor'], ['as' => 'admin.laporan.daftar_tentor']);
        $routes->get('laporan-tentor/(:num)',
            [[LaporanController::class, 'laporan_tentor'], '$1']);
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
        $routes->get('jadwal-tentor',
            [JadwalController::class, 'jadwal_tentor'], ['as' => 'admin.jadwal.jadwal_tentor']);
        
        $routes->get('daftar-tentor',
            [JadwalController::class, 'daftar_tentor'], ['as' => 'admin.jadwal.daftar_tentor']);
        $routes->get('detail-tentor/(:num)',
            [[JadwalController::class, 'detail_tentor'], '$1']);
        $routes->post('detail-jadwal',
            [JadwalController::class, 'detail_jadwal'], ['as' => 'admin.jadwal.detail_jadwal']);
        $routes->post('simpan-jadwal',
            [JadwalController::class, 'simpan_jadwal'], ['as' => 'admin.jadwal.simpan_jadwal']);
        $routes->post('hapus-jadwal',
            [JadwalController::class, 'hapus_jadwal'], ['as' => 'admin.jadwal.hapus_jadwal']);
    });
    
    $routes->group('jenjang', function ($routes)
    {
        $routes->get('',
            [JenjangController::class, 'index'], ['as' => 'admin.jenjang.index']);
        
        $routes->post('ambil-jenjang',
            [JenjangController::class, 'ambil_jenjang'], ['as' => 'admin.jenjang.ambil_jenjang']);
        $routes->post('simpan-jenjang',
            [JenjangController::class, 'simpan_jenjang'], ['as' => 'admin.jenjang.simpan_jenjang']);
        $routes->post('hapus-jenjang',
            [JenjangController::class, 'hapus_jenjang'], ['as' => 'admin.jenjang.hapus_jenjang']);
        $routes->post('cek-jenjang',
            [JenjangController::class, 'cek_jenjang'], ['as' => 'admin.jenjang.cek_jenjang']);
        
        $routes->post('ambil-tingkat',
            [JenjangController::class, 'ambil_tingkat'], ['as' => 'admin.jenjang.ambil_tingkat']);
        $routes->post('simpan-tingkat',
            [JenjangController::class, 'simpan_tingkat'], ['as' => 'admin.jenjang.simpan_tingkat']);
        $routes->post('hapus-tingkat',
            [JenjangController::class, 'hapus_tingkat'], ['as' => 'admin.jenjang.hapus_tingkat']);
        $routes->post('cek-tingkat',
            [JenjangController::class, 'cek_tingkat'], ['as' => 'admin.jenjang.cek_tingkat']);
    });
    
    $routes->group('semester', function ($routes)
    {
        $routes->get('',
            [SemesterController::class, 'index'], ['as' => 'admin.semester.index']);
        $routes->post('ganti',
            [SemesterController::class, 'ganti'], ['as' => 'admin.semester.ganti']);
    });
    
    $routes->group('pembayaran', function ($routes)
    {
        $routes->get('',
            [PembayaranController::class, 'index'], ['as' => 'admin.pembayaran.index']);
        $routes->get('daftar-bayar',
            [PembayaranController::class, 'daftar_bayar'], ['as' => 'admin.pembayaran.daftar_bayar']);
        $routes->get('detail-bayar/(:num)',
            [[PembayaranController::class, 'detail_bayar'], '$1']);
        $routes->post('simpan-bayar',
            [PembayaranController::class, 'simpan_bayar'], ['as' => 'admin.pembayaran.simpan_bayar']);
        $routes->post('hapus-bayar',
            [PembayaranController::class, 'hapus_bayar'], ['as' => 'admin.pembayaran.hapus_bayar']);
    });
    
    $routes->group('paket', function ($routes)
    {
        $routes->get('',
            [PaketController::class, 'index'], ['as' => 'admin.paket.index']);
        $routes->get('daftar-paket',
            [PaketController::class, 'daftar_paket'], ['as' => 'admin.paket.daftar_paket']);
        $routes->get('tambah-paket',
            [PaketController::class, 'tambah_paket'], ['as' => 'admin.paket.tambah_paket']);
        $routes->post('tambah-paket',
            [PaketController::class, 'tambah_paket_post'], ['as' => 'admin.paket.tambah_paket.post']);
        $routes->get('ubah-paket/(:num)',
            [[PaketController::class, 'ubah_paket'], '$1']);
        $routes->post('ubah-paket',
            [PaketController::class, 'ubah_paket_post'], ['as' => 'admin.paket.ubah_paket.post']);
        $routes->post('hapus-paket',
            [PaketController::class, 'hapus_paket'], ['as' => 'admin.paket.hapus_paket']);
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

