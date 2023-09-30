<?php

namespace App\Services;

use App\Models\SettingNilai;
use App\Models\SettingSkor;
use stdClass;

class PenilaianService
{
    private SettingNilai $SettingNilai;
    private SettingSkor $SettingSkor;
    
    public function __construct()
    {
        $this->SettingNilai = new SettingNilai();
        $this->SettingSkor = new SettingSkor();
    }
    
    public function ambil_daftar_nilai(): ?array
    {
        return $this->SettingNilai
            ->findAll();
    }
    
    public function ambil_daftar_skor(array $nilai): ?object
    {
        $skor = new stdClass();
        
        foreach($nilai as $value) {
            $skor->{$value->id_nilai} = $this->SettingSkor
                ->where('id_nilai', $value->id_nilai)
                ->findAll();
        }
        
        return $skor;
    }
}