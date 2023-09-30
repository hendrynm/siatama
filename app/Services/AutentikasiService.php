<?php

namespace App\Services;

use App\Models\LiveAkun;

class AutentikasiService
{
    private LiveAkun $LiveAkun;
    
    public function __construct()
    {
        $this->LiveAkun = new LiveAkun();
    }
    
    public function cek_username_ada(string $username): object|null
    {
        return $this->LiveAkun
            ->where('username', $username)
            ->first();
    }
    
    public function simpan_session(string $id_akun, string $hak_akses): void
    {
        session()->set('id_akun', $id_akun);
        session()->set('hak_akses', $hak_akses);
    }
    
    public function hapus_session(): void
    {
        session()->destroy();
    }
}
