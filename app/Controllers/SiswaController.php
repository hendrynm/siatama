<?php

namespace App\Controllers;

class SiswaController extends BaseController
{
    public function index(): string
    {
        return view('admin/siswa/index');
    }
    
    public function siswa_aktif(): string
    {
        return view('admin/siswa/siswa_aktif');
    }
    
    public function siswa_nonaktif(): string
    {
        return view('admin/siswa/siswa_nonaktif');
    }
    
    public function tambah_siswa(): string
    {
        return view('admin/siswa/tambah_siswa');
    }
    
    public function ubah_siswa(): string
    {
        return view('admin/siswa/ubah_siswa');
    }
    
    public function hapus_siswa(): string
    {
        return view('admin/siswa/hapus_siswa');
    }
}
