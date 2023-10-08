<?php

namespace App\Controllers;


use App\Services\PenilaianService;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

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
    
    public function lihat_komponen(): string
    {
        $nilai = $this->PenilaianService->ambil_daftar_nilai();
        $skor = $this->PenilaianService->ambil_daftar_skor($nilai);
        
        return view('admin/penilaian/komponen/lihat_komponen', [
            'nilai' => $nilai,
            'skor' => $skor,
        ]);
    }
    
    public function simpan_komponen(): RedirectResponse
    {
        $id_nilai = $this->request->getPost('id_nilai');
        $nama_nilai = $this->request->getPost('nama_nilai');
        $jenis = $this->request->getPost('jenis');
        $deskripsi = $this->request->getPost('deskripsi');
        
        $id_skor = $this->request->getPost('id_skor');
        $skor = $this->request->getPost('skor');
        
        $this->PenilaianService->simpan_komponen($id_nilai, $nama_nilai, $jenis, $deskripsi, $id_skor, $skor);
        
        return redirect()->to(route_to('admin.penilaian.lihat_komponen'));
    }
    
    public function ambil_nilai(): string
    {
        $id_siswa = $this->request->getPost('id_siswa');
        $id_pertemuan = $this->request->getPost('id_pertemuan');
        
        $nilai = $this->PenilaianService->ambil_detail_nilai($id_pertemuan, $id_siswa);
        return json_encode($nilai);
    }
    
    public function simpan_nilai(): string
    {
        $id_siswa = $this->request->getPost('id_siswa');
        $id_pertemuan = $this->request->getPost('id_pertemuan');
        $nilai_arr = $this->request->getPost('nilai_arr');
        
        $this->PenilaianService->simpan_nilai($id_siswa, $id_pertemuan, $nilai_arr);
        return json_encode(['status' => 'success']);
    }
}
