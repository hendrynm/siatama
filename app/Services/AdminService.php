<?php

namespace App\Services;

use App\Models\LiveAkun;

class AdminService
{
    private LiveAkun $LiveAkun;
    
    public function __construct()
    {
        $this->LiveAkun = new LiveAkun();
    }
    
    public function ambil_data_akun(): ?object
    {
        $id_akun = session()->get('id_akun');
        return $this->LiveAkun
            ->select(['nama_pengajar','level'])
            ->join('live_pengajar', 'live_pengajar.id_pengajar = live_akun.id_pengajar')
            ->where('id_akun', $id_akun)
            ->first();
    }
}
