<?php

namespace App\Controllers;

class PresensiController extends BaseController
{
    public function index(): string
    {
        return view('admin/presensi/index');
    }
    
    public function kehadiran_pilih_kelas(): string
    {
        return view('admin/presensi/kehadiran/pilih_kelas');
    }
    
    public function kehadiran_lihat_kelas(): string
    {
        return view('admin/presensi/kehadiran/lihat_kelas');
    }
    
    public function kehadiran_tambah_presensi(): string
    {
        return view('admin/presensi/kehadiran/tambah_presensi');
    }
    
    public function kehadiran_ubah_presensi(): string
    {
        return view('admin/presensi/kehadiran/ubah_presensi');
    }
    
    public function kehadiran_isi_presensi(): string
    {
        return view('admin/presensi/kehadiran/isi_presensi');
    }
    
    public function pengaturan_pilih_kelas(): string
    {
        return view('admin/presensi/pengaturan/pilih_kelas');
    }
    
    public function pengaturan_lihat_kelas(): string
    {
        return view('admin/presensi/pengaturan/lihat_kelas');
    }
    
    public function pengaturan_tambah_kelas(): string
    {
        return view('admin/presensi/pengaturan/tambah_kelas');
    }
    
    public function pengaturan_ubah_kelas(): string
    {
        return view('admin/presensi/pengaturan/ubah_kelas');
    }
}
