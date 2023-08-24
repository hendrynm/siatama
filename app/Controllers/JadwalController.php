<?php

namespace App\Controllers;

class JadwalController extends BaseController
{
    public function index(): string
    {
        return view('admin/jadwal/index');
    }
    
    public function mentor_aktif(): string
    {
        return view('admin/jadwal/mentor_aktif');
    }
    
    public function siswa_aktif(): string
    {
        return view('admin/jadwal/siswa_aktif');
    }
}
