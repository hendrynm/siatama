<?php

namespace App\Controllers;

class SiswaController extends BaseController
{
    public function daftar_siswa_aktif(): string
    {
        return view('siswa/daftar_siswa_aktif');
    }
}
