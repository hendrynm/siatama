<?php

namespace App\Services;

use App\Models\LiveAkun;

class AkunService
{
    private LiveAkun $LiveAkun;
    
    public function __construct()
    {
        $this->LiveAkun = new LiveAkun();
    }
    
    public function cek_sandi(int $id_akun, string $password_lama): bool
    {
        $akun = $this->LiveAkun->find($id_akun);
        
        return password_verify($password_lama, $akun->password);
    }
    
    public function ubah_sandi(int $id_akun, string $password_baru): bool
    {
        return $this->LiveAkun->update(
            $id_akun,
            ['password' => password_hash($password_baru, PASSWORD_DEFAULT)]
        );
    }
}