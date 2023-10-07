<?php

namespace App\Controllers;

use App\Services\TentorService;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\RedirectResponse;
use Config\Database;
use Exception;

class TentorController extends BaseController
{
    private TentorService $TentorService;
    
    public function __construct()
    {
        $this->TentorService = new TentorService();
    }
    
    public function index(): string
    {
        return view('admin/tentor/index');
    }
    
    public function tentor_aktif(): string
    {
        $tentor = $this->TentorService->ambil_daftar_tentor_aktif();
        
        return view('admin/tentor/tentor_aktif', [
            'tentor' => $tentor
        ]);
    }
    
    public function tentor_nonaktif(): string
    {
        $tentor = $this->TentorService->ambil_daftar_tentor_nonaktif();
        
        return view('admin/tentor/tentor_nonaktif', [
            'tentor' => $tentor
        ]);
    }
    
    public function tambah_tentor(): string
    {
        return view('admin/tentor/tambah_tentor');
    }
    
    public function tambah_tentor_post(): RedirectResponse
    {
        $nama_pengajar = $this->request->getPost('nama_pengajar');
        $nomor_hp = $this->request->getPost('nomor_hp');
        $email_bimbel = $this->request->getPost('email_bimbel');
        $email_pribadi = $this->request->getPost('email_pribadi');
        $alamat = $this->request->getPost('alamat');
        
        $simpan = $this->TentorService->simpan_tentor($nama_pengajar, $nomor_hp, $email_bimbel, $email_pribadi, $alamat);
        
        if ($simpan)
        {
            return redirect()->to(url_to('TentorController::tentor_aktif'))
                ->with('success', 'Berhasil menyimpan data tentor baru.');
        }
        return redirect()->back()->withInput()
            ->with('error', 'Gagal menyimpan data tentor baru.');
    }
    
    public function ubah_tentor(int $id_pengajar): string
    {
        $tentor = $this->TentorService->ambil_detail_tentor($id_pengajar);
        
        return view('admin/tentor/ubah_tentor', [
            'tentor' => $tentor
        ]);
    }
    
    public function ubah_tentor_post(): RedirectResponse
    {
        $id_pengajar = $this->request->getPost('id_pengajar');
        $nama_pengajar = $this->request->getPost('nama_pengajar');
        $nomor_hp = $this->request->getPost('nomor_hp');
        $email_bimbel = $this->request->getPost('email_bimbel');
        $email_pribadi = $this->request->getPost('email_pribadi');
        $alamat = $this->request->getPost('alamat');
        
        $simpan = $this->TentorService->simpan_tentor($nama_pengajar, $nomor_hp, $email_bimbel, $email_pribadi, $alamat, $id_pengajar);
        
        if ($simpan)
        {
            return redirect()->to(url_to('TentorController::tentor_aktif'))
                ->with('success', 'Berhasil menyimpan data tentor.');
        }
        return redirect()->back()->withInput()
            ->with('error', 'Gagal menyimpan data tentor.');
    }
    
    public function hapus_tentor(): ?string
    {
        try
        {
            $data = $this->request->getPost();
            $this->TentorService->hapus_tentor($data['id_tentor']);
            return 'sukses';
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
    
    public function arsip_tentor(): string
    {
        $db = Database::connect();
        try
        {
            $data = $this->request->getPost();
            $db->transException(true)->transStart();
            $this->TentorService->arsip_tentor($data['id_tentor']);
            $db->transComplete();
            
            return 'sukses';
        }
        catch (DatabaseException $e)
        {
            return $e->getMessage();
        }
    }
    
    public function aktif_tentor(): string
    {
        $db = Database::connect();
        try
        {
            $data = $this->request->getPost();
            $db->transException(true)->transStart();
            $this->TentorService->aktif_tentor($data['id_tentor']);
            $db->transComplete();
            
            return 'sukses';
        }
        catch (DatabaseException $e)
        {
            return $e->getMessage();
        }
    }
}
