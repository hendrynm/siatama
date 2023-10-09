<?php

namespace App\Controllers;

use App\Services\AkunService;
use CodeIgniter\HTTP\RedirectResponse;

class AkunController extends BaseController
{
    private AkunService $AkunService;
    
    public function __construct()
    {
        $this->AkunService = new AkunService();
    }
    
    public function index(): string
    {
        return view('admin/akun/index');
    }
    
    public function ubah_password(): string
    {
        return view('admin/akun/ubah_password');
    }
    
    public function ubah_password_post(): RedirectResponse
    {
        $id_akun = session()->get('id_akun');
        $password_lama = $this->request->getPost('password_lama');
        $password_baru = $this->request->getPost('password_baru');
        
        if($password_lama === $password_baru)
        {
            return redirect()->back()->withInput()
                ->with('error', 'Password lama dan password baru tidak boleh sama!');
        }
        
        $cek = $this->AkunService->cek_sandi($id_akun, $password_lama);
        if(!$cek)
        {
            return redirect()->back()->withInput()
                ->with('error', 'Password lama salah!');
        }
        
        $ubah = $this->AkunService->ubah_sandi($id_akun, $password_baru);
        if($ubah)
        {
            return redirect()->to(url_to('admin.akun.ubah_password'))
                ->with('success', 'Password berhasil diubah!');
        }
        
        return redirect()->back()->withInput()
            ->with('error', 'Password gagal diubah!');
    }
}
