<?php

namespace App\Services;

use App\Models\HistorySiswa;
use App\Models\LiveSiswa;
use Exception;

class SiswaService
{
    private LiveSiswa $LiveSiswa;
    private HistorySiswa $HistorySiswa;
    
    public function __construct()
    {
        $this->LiveSiswa = new LiveSiswa();
        $this->HistorySiswa = new HistorySiswa();
    }
    
    public function ambil_siswa_aktif(): ?array
    {
        return $this->LiveSiswa->select([
            'id_siswa',
            'nama_siswa',
            'asal_sekolah',
            'nama_jenjang',
            'warna',
            'nama_tingkat',
            'nama_ortu',
            'telepon_ortu',
            'nama_paket',
            'harga_paket',
            'jenis'
        ])
            ->join('setting_tingkat',
                'setting_tingkat.id_tingkat = live_siswa.id_tingkat')
            ->join('setting_jenjang',
                'setting_jenjang.id_jenjang = setting_tingkat.id_jenjang')
            ->join('setting_paket',
                'setting_paket.id_paket = live_siswa.id_paket')
            ->orderBy('nama_siswa')
            ->findAll();
    }
    
    public function ambil_siswa_nonaktif(): ?array
    {
        return $this->HistorySiswa->select([
            'id_history_siswa',
            'nama_siswa',
            'asal_sekolah',
            'nama_jenjang',
            'warna',
            'nama_tingkat',
            'nama_ortu',
            'telepon_ortu',
            'nama_paket',
            'harga_paket',
            'jenis'
        ])
            ->join('setting_tingkat',
                'setting_tingkat.id_tingkat = history_siswa.id_tingkat')
            ->join('setting_jenjang',
                'setting_jenjang.id_jenjang = setting_tingkat.id_jenjang')
            ->join('setting_paket',
                'setting_paket.id_paket = history_siswa.id_paket')
            ->orderBy('nama_siswa')
            ->findAll();
    }
    
    public function ambil_detail_siswa_aktif(string $id_siswa): ?object
    {
        return $this->LiveSiswa->select([
            'id_siswa',
            'nama_siswa',
            'asal_sekolah',
            'setting_jenjang.id_jenjang',
            'nama_jenjang',
            'warna',
            'setting_tingkat.id_tingkat',
            'nama_tingkat',
            'nama_ortu',
            'telepon_ortu',
            'setting_paket.id_paket',
            'nama_paket',
            'harga_paket',
            'jenis'
        ])
            ->join('setting_tingkat',
                'setting_tingkat.id_tingkat = live_siswa.id_tingkat')
            ->join('setting_jenjang',
                'setting_jenjang.id_jenjang = setting_tingkat.id_jenjang')
            ->join('setting_paket',
                'setting_paket.id_paket = live_siswa.id_paket')
            ->orderBy('nama_siswa')
            ->where('id_siswa', $id_siswa)
            ->first();
    }
    
    public function simpan_siswa_aktif(array $request): void
    {
        $data = [
            'id_siswa' => $request['id_siswa'] ?? null,
            'nama_siswa' => $request['nama_siswa'],
            'asal_sekolah' => $request['sekolah'],
            'id_tingkat' => $request['tingkat'],
            'nama_ortu' => $request['nama_ortu'],
            'telepon_ortu' => $request['hp_ortu'],
            'id_paket' => $request['paket']
        ];
        
        $this->LiveSiswa->upsert($data);
    }
    
    public function hapus_siswa_aktif(string $id_siswa): void
    {
        $this->LiveSiswa->delete($id_siswa);
    }
    
    public function arsip_siswa(string $id_siswa): void
    {
        $siswa = $this->LiveSiswa->find($id_siswa);
        
        $data = [
            'id_history_siswa' => $siswa->id_siswa,
            'nama_siswa' => $siswa->nama_siswa,
            'id_tingkat' => $siswa->id_tingkat,
            'id_history_kelas' => $siswa->id_kelas,
            'id_paket' => $siswa->id_paket,
            'asal_sekolah' => $siswa->asal_sekolah,
            'nama_ortu' => $siswa->nama_ortu,
            'telepon_ortu' => $siswa->telepon_ortu
        ];
        
        $this->HistorySiswa->insert($data);
        $this->LiveSiswa->delete($id_siswa);
    }
    
    public function aktif_siswa(string $id_siswa): void
    {
        $siswa = $this->HistorySiswa->find($id_siswa);
        
        $data = [
            'id_siswa' => $siswa->id_history_siswa,
            'nama_siswa' => $siswa->nama_siswa,
            'id_tingkat' => $siswa->id_tingkat,
            'id_kelas' => $siswa->id_history_kelas,
            'id_paket' => $siswa->id_paket,
            'asal_sekolah' => $siswa->asal_sekolah,
            'nama_ortu' => $siswa->nama_ortu,
            'telepon_ortu' => $siswa->telepon_ortu
        ];
        
        $this->LiveSiswa->insert($data);
        $this->HistorySiswa->delete($id_siswa);
    }
}