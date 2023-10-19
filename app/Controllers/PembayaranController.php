<?php

namespace App\Controllers;

use App\Services\PembayaranService;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Exception;

class PembayaranController extends BaseController
{
    private PembayaranService $PembayaranService;
    
    public function __construct()
    {
        $this->PembayaranService = new PembayaranService();
    }
    
    public function index(): string
    {
        return view('admin/pembayaran/index');
    }
    
    public function daftar_bayar(): string
    {
        $siswa = $this->PembayaranService->ambil_daftar_siswa();
        
        return view('admin/pembayaran/daftar_bayar', [
            'siswa' => $siswa
        ]);
    }
    
    public function detail_bayar($id_siswa): string
    {
        $siswa = $this->PembayaranService->ambil_detail_siswa($id_siswa);
        $bayar = $this->PembayaranService->ambil_detail_bayar($id_siswa);
        
        return view('admin/pembayaran/detail_bayar', [
            'siswa' => $siswa,
            'bayar' => $bayar
        ]);
    }
    
    public function simpan_bayar(): string
    {
        try
        {
            $id_siswa = $this->request->getPost('id_siswa');
            $tanggal = $this->request->getPost('tanggal');
            $nominal = $this->request->getPost('nominal');
            $catatan = $this->request->getPost('catatan') === '' ? null : $this->request->getPost('catatan');
            
            $this->PembayaranService->simpan_bayar($id_siswa, $tanggal, $nominal, $catatan);
            
            return json_encode(['status' => 'success']);
        }
        catch (DatabaseException $e)
        {
            return json_encode($e->getMessage());
        }
    }
    
    public function hapus_bayar(): string
    {
        try
        {
            $id_pembayaran = $this->request->getPost('id_pembayaran');
            
            $this->PembayaranService->hapus_bayar($id_pembayaran);
            
            return json_encode(['status' => 'success']);
        }
        catch (DatabaseException $e)
        {
            return json_encode($e->getMessage());
        }
    }
}
