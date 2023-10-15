<?php

namespace App\Services;

use App\Models\SettingPaket;

class PaketService
{
    private SettingPaket $SettingPaket;
    private JenjangService $JenjangService;
    
    public function __construct()
    {
        $this->SettingPaket = new SettingPaket();
        $this->JenjangService = new JenjangService();
    }
    
    public function ambil_daftar_paket(): array
    {
        return $this->SettingPaket
            ->join('setting_tingkat', 'setting_tingkat.id_tingkat = setting_paket.id_tingkat')
            ->join('setting_jenjang', 'setting_jenjang.id_jenjang = setting_tingkat.id_jenjang')
            ->orderBy('setting_jenjang.id_jenjang')
            ->orderBy('setting_tingkat.id_tingkat')
            ->orderBy('setting_paket.nama_paket')
            ->findAll();
    }
    
    public function ambil_daftar_jenjang(): array
    {
        return $this->JenjangService->ambil_daftar_jenjang();
    }
    
    public function simpan_paket(string $nama_paket, int $id_tingkat, string $jenis, int $harga_paket, int $id_paket = null): void
    {
        $this->SettingPaket->upsert([
            'id_paket' => $id_paket,
            'nama_paket' => $nama_paket,
            'id_tingkat' => $id_tingkat,
            'jenis' => $jenis,
            'harga_paket' => $harga_paket,
        ]);
    }
    
    public function ambil_detail_paket(int $id_paket): object
    {
        return $this->SettingPaket
            ->join('setting_tingkat', 'setting_tingkat.id_tingkat = setting_paket.id_tingkat')
            ->join('setting_jenjang', 'setting_jenjang.id_jenjang = setting_tingkat.id_jenjang')
            ->find($id_paket);
    }
    
    public function hapus_paket(int $id_paket): void
    {
        $this->SettingPaket->delete($id_paket);
    }
}