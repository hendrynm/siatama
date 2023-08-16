<?php

namespace App\Controllers;

class JadwalController extends BaseController
{
    public function semua_mentor_aktif(): string
    {
        return view('admin/jadwal/semua_mentor_aktif');
    }
    
    public function semua_siswa_aktif(): string
    {
        return view('admin/jadwal/semua_siswa_aktif');
    }
}
