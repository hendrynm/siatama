<?php

namespace App\Controllers;

use App\Services\JadwalService;
use CodeIgniter\Database\Exceptions\DatabaseException;

class JadwalController extends BaseController
{
    private JadwalService $JadwalService;
    
    public function __construct()
    {
        $this->JadwalService = new JadwalService();
    }
    
    public function index(): string
    {
        return view('admin/jadwal/index');
    }
    
    public function jadwal_tentor(): string
    {
        $tentor = $this->JadwalService->ambil_daftar_tentor();
        $jadwal = $this->JadwalService->ambil_jadwal_tentor();
        
        return view('admin/jadwal/jadwal_tentor', [
            'tentor' => $tentor,
            'jadwal' => $jadwal,
        ]);
    }
    
    public function daftar_tentor(): string
    {
        $tentor = $this->JadwalService->ambil_daftar_tentor();
        
        return view('admin/jadwal/daftar_tentor', [
            'tentor' => $tentor,
        ]);
    }
    
    public function detail_tentor($id_pengajar): string
    {
        $tentor = $this->JadwalService->ambil_detail_tentor($id_pengajar);
        $jadwal = $this->JadwalService->ambil_detail_jadwal_pengajar($id_pengajar);
        $kelas = $this->JadwalService->ambil_daftar_kelas();
        
        return view('admin/jadwal/detail_tentor', [
            'tentor' => $tentor,
            'jadwal' => $jadwal,
            'kelas' => $kelas,
        ]);
    }
    
    public function detail_jadwal(): string
    {
        $id_jadwal = $this->request->getPost('id_jadwal');
        $jadwal = $this->JadwalService->ambil_detail_jadwal($id_jadwal);
        
        return json_encode($jadwal);
    }
    
    public function simpan_jadwal(): string
    {
        $db = \Config\Database::connect();
        try
        {
            $db->transStart();
            $id_jadwal = $this->request->getPost('id_jadwal') == 0 ? null : $this->request->getPost('id_jadwal');
            $id_pengajar = $this->request->getPost('id_pengajar');
            $id_kelas = $this->request->getPost('id_kelas');
            $mulai = $this->request->getPost('mulai');
            $selesai = $this->request->getPost('selesai');
            
            $this->JadwalService->simpan_jadwal($id_kelas, $id_pengajar, $mulai, $selesai, $id_jadwal);
            $db->transComplete();
            return json_encode(['status' => 'success']);
        }
        catch (DatabaseException $e)
        {
            $db->transRollback();
            return json_encode($e->getMessage());
        }
    }
    
    public function hapus_jadwal(): string
    {
        try
        {
            $id_jadwal = $this->request->getPost('id_jadwal');
            $this->JadwalService->hapus_jadwal($id_jadwal);
            return json_encode(['status' => 'success']);
        }
        catch (DatabaseException $e)
        {
            return json_encode($e->getMessage());
        }
    }
}
