<?php

namespace App\Controllers;

use App\Services\PaketService;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

class PaketController extends BaseController
{
    private PaketService $PaketService;
    
    public function __construct()
    {
        $this->PaketService = new PaketService();
    }
    
    public function index(): string
    {
        return view('admin/paket/index');
    }
    
    public function daftar_paket(): string
    {
        $paket = $this->PaketService->ambil_daftar_paket();
        
        return view('admin/paket/daftar_paket', [
            'paket' => $paket,
        ]);
    }
    
    public function tambah_paket(): string
    {
        $jenjang = $this->PaketService->ambil_daftar_jenjang();
        
        return view('admin/paket/tambah_paket',[
            'jenjang' => $jenjang,
        ]);
    }
    
    public function tambah_paket_post(): RedirectResponse
    {
        $nama_paket = $this->request->getPost('nama_paket');
        $id_tingkat = $this->request->getPost('id_tingkat');
        $jenis = $this->request->getPost('jenis');
        $harga_paket = $this->request->getPost('harga_paket');
        
        $this->PaketService->simpan_paket($nama_paket, $id_tingkat, $jenis, $harga_paket);
        
        return redirect()->route('admin.paket.daftar_paket')->with('success', 'Paket baru berhasil ditambahkan.');
    }
    
    public function ubah_paket(int $id_paket): string
    {
        $paket = $this->PaketService->ambil_detail_paket($id_paket);
        $jenjang = $this->PaketService->ambil_daftar_jenjang();
        
        return view('admin/paket/ubah_paket', [
            'paket' => $paket,
            'jenjang' => $jenjang,
        ]);
    }
    
    public function ubah_paket_post(): RedirectResponse
    {
        $id_paket = $this->request->getPost('id_paket');
        $nama_paket = $this->request->getPost('nama_paket');
        $id_tingkat = $this->request->getPost('id_tingkat');
        $jenis = $this->request->getPost('jenis');
        $harga_paket = $this->request->getPost('harga_paket');
        
        $this->PaketService->simpan_paket($nama_paket, $id_tingkat, $jenis, $harga_paket, $id_paket);
        
        return redirect()->route('admin.paket.daftar_paket')->with('success', 'Paket berhasil diubah.');
    }
    
    public function hapus_paket(): string
    {
        try
        {
            $id_paket = $this->request->getPost('id_paket');
            
            $this->PaketService->hapus_paket($id_paket);
            
            return "sukses";
        }
        catch (Exception $e)
        {
            return json_encode($e->getMessage());
        }
    }
}
