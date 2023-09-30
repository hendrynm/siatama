<?php

namespace App\Controllers;

use App\Services\AdminService;
use App\Services\AutentikasiService;
use CodeIgniter\HTTP\RedirectResponse;

class AdminController extends BaseController
{
    private AutentikasiService $AutentikasiService;
    
    public function __construct()
    {
        $this->AutentikasiService = new AutentikasiService();
    }
    
    public function masuk(): string
    {
        return view('publik/masuk/index');
    }
    
    public function masuk_post(): RedirectResponse
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $data_pengguna = $this->AutentikasiService->cek_username_ada($username);
        
        if ($data_pengguna !== null)
        {
            if (password_verify($password, $data_pengguna->password))
            {
                $this->AutentikasiService->simpan_session($data_pengguna->id_akun, $data_pengguna->level);
                return redirect()->to(route_to('admin.beranda.index'));
            }
        }
        return redirect()->back()->withInput()
            ->with('error', 'Username atau Password yang dimasukkan <b>salah!</b>');
    }
    
    public function keluar(): RedirectResponse
    {
        $this->AutentikasiService->hapus_session();
        return redirect()->to(route_to('admin.masuk.index'));
    }
    
    public function index(): string
    {
        return view('admin/beranda/index');
    }
}
