<?php

namespace App\Controllers;

use App\Services\JenjangService;

class JenjangController extends BaseController
{
    private JenjangService $JenjangService;
    
    public function __construct()
    {
        $this->JenjangService = new JenjangService();
    }
    
    public function index(): string
    {
        $jenjang = $this->JenjangService->ambil_daftar_jenjang();
        
        return view('admin/jenjang/index', [
            'jenjang' => $jenjang,
        ]);
    }
    
    public function ambil_jenjang(): string
    {
        $id_jenjang = $this->request->getPost('id_jenjang');
        
        $data = $this->JenjangService->ambil_detail_jenjang($id_jenjang);
        
        return json_encode($data);
    }
    
    public function simpan_jenjang(): string
    {
        $id_jenjang = $this->request->getPost('id_jenjang') == '' ? null : $this->request->getPost('id_jenjang');
        $nama_jenjang = $this->request->getPost('nama_jenjang');
        $warna = $this->request->getPost('warna');
        
        $this->JenjangService->simpan_jenjang($nama_jenjang, $warna, $id_jenjang);
        
        return json_encode(['status' => 'ok']);
    }
    
    public function hapus_jenjang(): string
    {
        $id_jenjang = $this->request->getPost('id_jenjang');
        
        $this->JenjangService->hapus_jenjang($id_jenjang);
        
        return json_encode(['status' => 'ok']);
    }
    
    public function ambil_tingkat(): string
    {
        $id_tingkat = $this->request->getPost('id_tingkat');
        
        $data = $this->JenjangService->ambil_detail_tingkat($id_tingkat);
        
        return json_encode($data);
    }
    
    public function simpan_tingkat(): string
    {
        $id_tingkat = $this->request->getPost('id_tingkat') == '' ? null : $this->request->getPost('id_tingkat');
        $id_jenjang = $this->request->getPost('id_jenjang');
        $nama_tingkat = $this->request->getPost('nama_tingkat');
        
        $this->JenjangService->simpan_tingkat($id_jenjang, $nama_tingkat, $id_tingkat);
        
        return json_encode(['status' => 'ok']);
    }
    
    public function hapus_tingkat(): string
    {
        $id_tingkat = $this->request->getPost('id_tingkat');
        
        $this->JenjangService->hapus_tingkat($id_tingkat);
        
        return json_encode(['status' => 'ok']);
    }
    
    public function cek_tingkat(): string
    {
        $id_jenjang = $this->request->getPost('id_jenjang');
        
        $data = $this->JenjangService->cek_tingkat($id_jenjang);
        
        return json_encode($data);
    }
}
