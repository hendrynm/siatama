<?php

namespace App\Services;

use App\Models\SettingJenjang;
use App\Models\SettingPaket;
use App\Models\SettingTingkat;

class SettingService
{
    private SettingJenjang $SettingJenjang;
    private SettingTingkat $SettingTingkat;
    private SettingPaket $SettingPaket;
    
    public function __construct()
    {
        $this->SettingJenjang = new SettingJenjang();
        $this->SettingTingkat = new SettingTingkat();
        $this->SettingPaket = new SettingPaket();
    }
    
    public function ambil_jenjang(): ?array
    {
        return $this->SettingJenjang->select([
            'id_jenjang',
            'nama_jenjang'
        ])
            ->findAll();
    }
    
    public function ambil_tingkat(): ?array
    {
        return $this->SettingTingkat->select([
            'id_tingkat',
            'nama_tingkat',
            'id_jenjang'
        ])
            ->findAll();
    }
    
    public function ambil_paket(): ?array
    {
        return $this->SettingPaket->select([
            'id_paket',
            'nama_paket',
            'harga_paket',
            'id_tingkat'
        ])
            ->findAll();
    }
}