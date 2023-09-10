<?php

namespace App\Controllers;

use App\Services\SettingService;
use App\Services\SiswaService;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\RedirectResponse;
use Config\Database;
use Exception;

class SiswaController extends BaseController
{
    private SiswaService $SiswaService;
    private SettingService $SettingService;
    
    public function __construct()
    {
        $this->SiswaService = new SiswaService();
        $this->SettingService = new SettingService();
    }
    
    public function index(): string
    {
        return view('admin/siswa/index');
    }
    
    public function siswa_aktif(): string
    {
        $siswa = $this->SiswaService->ambil_siswa_aktif();
        return view('admin/siswa/siswa_aktif', [
            'siswa' => $siswa
        ]);
    }
    
    public function siswa_nonaktif(): string
    {
        $siswa = $this->SiswaService->ambil_siswa_nonaktif();
        return view('admin/siswa/siswa_nonaktif', [
            'siswa' => $siswa
        ]);
    }
    
    public function tambah_siswa(): string
    {
        $jenjang = $this->SettingService->ambil_jenjang();
        $tingkat = $this->SettingService->ambil_tingkat();
        $paket = $this->SettingService->ambil_paket();
        
        return view('admin/siswa/tambah_siswa', [
            'jenjang' => $jenjang,
            'tingkat' => $tingkat,
            'paket' => $paket
        ]);
    }
    
    public function ubah_siswa(int $id_siswa): string
    {
        $siswa = $this->SiswaService->ambil_detail_siswa_aktif($id_siswa);
        $jenjang = $this->SettingService->ambil_jenjang();
        $tingkat = $this->SettingService->ambil_tingkat();
        $paket = $this->SettingService->ambil_paket();
        
        return view('admin/siswa/ubah_siswa', [
            'siswa' => $siswa,
            'jenjang' => $jenjang,
            'tingkat' => $tingkat,
            'paket' => $paket
        ]);
    }
    
    public function simpan_data_siswa_aktif(): RedirectResponse
    {
        try
        {
            $data = $this->request->getPost();
            $this->SiswaService->simpan_siswa_aktif($data);
            return redirect()->to(route_to('admin.siswa.index'))
                ->with('success', 'Data siswa telah berhasil disimpan');
        }
        catch (Exception $e)
        {
            return redirect()->back()->withInput()
                ->with('error', $e->getMessage());
        }
    }
    
    public function hapus_siswa(): ?string
    {
        try
        {
            $data = $this->request->getPost();
            $this->SiswaService->hapus_siswa_aktif($data['id_siswa']);
            return 'sukses';
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
    
    public function arsip_siswa(): string
    {
        $db = Database::connect();
        try
        {
            $data = $this->request->getPost();
            $db->transException(true)->transStart();
            $this->SiswaService->arsip_siswa($data['id_siswa']);
            $db->transComplete();
            
            return 'sukses';
        }
        catch (DatabaseException $e)
        {
            return $e->getMessage();
        }
    }
    
    public function aktif_siswa(): string
    {
        $db = Database::connect();
        try
        {
            $data = $this->request->getPost();
            $db->transException(true)->transStart();
            $this->SiswaService->aktif_siswa($data['id_siswa']);
            $db->transComplete();
            
            return 'sukses';
        }
        catch (DatabaseException $e)
        {
            return $e->getMessage();
        }
    }
}
