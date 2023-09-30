<?php

namespace App\Controllers;


use App\Services\PenilaianService;

class PenilaianController extends BaseController
{
    private PenilaianService $PenilaianService;
    
    public function __construct()
    {
        $this->PenilaianService = new PenilaianService();
    }
    
    public function index(): string
    {
        return view('admin/penilaian/index');
    }
    
    public function pilih_kelas(): string
    {
        return view('admin/penilaian/pengisian/pilih_kelas');
    }
    
    public function lihat_kelas(): string
    {
        return view('admin/penilaian/pengisian/lihat_kelas');
    }
    
    public function tambah_penilaian(): string
    {
        return view('admin/penilaian/pengisian/tambah_penilaian');
    }
    
    public function isi_penilaian(): string
    {
        return view('admin/penilaian/pengisian/isi_penilaian');
    }
    
    public function lihat_komponen(): string
    {
        $nilai = $this->PenilaianService->ambil_daftar_nilai();
        $skor = $this->PenilaianService->ambil_daftar_skor($nilai);
        
        return view('admin/penilaian/komponen/lihat_komponen', [
            'nilai' => $nilai,
            'skor' => $skor,
        ]);
    }
}
