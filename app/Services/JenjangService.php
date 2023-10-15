<?php

namespace App\Services;

use App\Models\SettingJenjang;
use App\Models\SettingTingkat;

class JenjangService
{
    private SettingJenjang $SettingJenjang;
    private SettingTingkat $SettingTingkat;
    
    public function __construct()
    {
        $this->SettingJenjang = new SettingJenjang();
        $this->SettingTingkat = new SettingTingkat();
    }
    
    public function ambil_daftar_jenjang(): ?array
    {
        $query1 = $this->SettingJenjang
            ->orderBy('id_jenjang')
            ->findAll();
        
        $query2 = $this->SettingTingkat
            ->orderBy('id_jenjang')
            ->orderBy('nama_tingkat')
            ->findAll();
        
        $data = [];
        foreach ($query1 as $k1 => $v1) {
            $data[$k1] = $v1;
            $data[$k1]->tingkat = [];
            foreach ($query2 as $v2) {
                if ($v1->id_jenjang == $v2->id_jenjang) {
                    $data[$k1]->tingkat[] = $v2;
                }
            }
        }
        
        return $data;
    }
    
    public function ambil_detail_jenjang(int $id_jenjang): ?object
    {
        return $this->SettingJenjang
            ->where('id_jenjang', $id_jenjang)
            ->first();
    }
    
    public function simpan_jenjang(string $nama_jenjang, string $warna, int $id_jenjang = null): void
    {
        $this->SettingJenjang->upsert([
            'id_jenjang' => $id_jenjang,
            'nama_jenjang' => $nama_jenjang,
            'warna' => $warna,
            ]);
    }
    
    public function hapus_jenjang(int $id_jenjang): void
    {
        $this->SettingJenjang
            ->delete($id_jenjang);
    }
    
    public function ambil_detail_tingkat(int $id_tingkat): ?object
    {
        return $this->SettingTingkat
            ->where('id_tingkat', $id_tingkat)
            ->first();
    }
    
    public function simpan_tingkat(int $id_jenjang, string $nama_tingkat, int $id_tingkat = null): void
    {
        $this->SettingTingkat->upsert([
            'id_tingkat' => $id_tingkat,
            'id_jenjang' => $id_jenjang,
            'nama_tingkat' => $nama_tingkat,
            ]);
    }
    
    public function hapus_tingkat(int $id_tingkat): void
    {
        $this->SettingTingkat
            ->delete($id_tingkat);
    }
    
    public function cek_tingkat(int $id_jenjang): int
    {
        return $this->SettingTingkat
            ->where('id_jenjang', $id_jenjang)
            ->countAllResults();
    }
}