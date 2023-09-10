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
    
    public function simpan_session(string $id_akun): void
    {
        session()->set('id_akun', $id_akun);
    }
    
    public function hapus_session(): void
    {
        session()->destroy();
    }
}
