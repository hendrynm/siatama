<?php

namespace App\Services;

use App\Models\HistoryPengajar;
use App\Models\LivePengajar;

class TentorService
{
    private LivePengajar $LivePengajar;
    private HistoryPengajar $HistoryPengajar;
    
    public function __construct()
    {
        $this->LivePengajar = new LivePengajar();
        $this->HistoryPengajar = new HistoryPengajar();
    }
    
    public function ambil_daftar_tentor_aktif(): ?array
    {
        return $this->LivePengajar
            ->orderBy('nama_pengajar')
            ->findAll();
    }
    
    public function ambil_daftar_tentor_nonaktif(): ?array
    {
        return $this->HistoryPengajar
            ->orderBy('nama_pengajar')
            ->findAll();
    }
    
    public function simpan_tentor(string $nama_pengajar, string $nomor_hp, string $email_bimbel, string $email_pribadi, string $alamat, int $id_pengajar = null): bool
    {
        $data = [
            'id_pengajar' => $id_pengajar,
            'nama_pengajar' => $nama_pengajar,
            'nomor_hp' => $nomor_hp,
            'email_bimbel' => $email_bimbel,
            'email_pribadi' => $email_pribadi,
            'alamat' => $alamat,
        ];
        
        return $this->LivePengajar->upsert($data);
    }
    
    public function ambil_detail_tentor(int $id_pengajar): ?object
    {
        return $this->LivePengajar
            ->where('id_pengajar', $id_pengajar)
            ->first();
    }
    
    public function hapus_tentor(int $id_pengajar): bool
    {
        return $this->LivePengajar->delete($id_pengajar);
    }
    
    public function arsip_tentor(int $id_pengajar): void
    {
        $tentor = $this->LivePengajar->find($id_pengajar);
        
        $data = [
            'id_history_pengajar' => $tentor->id_pengajar,
            'nama_pengajar' => $tentor->nama_pengajar,
            'nomor_hp' => $tentor->nomor_hp,
            'email_bimbel' => $tentor->email_bimbel,
            'email_pribadi' => $tentor->email_pribadi,
            'alamat' => $tentor->alamat
        ];
        
        $this->HistoryPengajar->insert($data);
        $this->LivePengajar->delete($id_pengajar);
    }
    
    public function aktif_tentor(int $id_pengajar): void
    {
        $tentor = $this->HistoryPengajar->find($id_pengajar);
        
        $data = [
            'id_pengajar' => $tentor->id_history_pengajar,
            'nama_pengajar' => $tentor->nama_pengajar,
            'nomor_hp' => $tentor->nomor_hp,
            'email_bimbel' => $tentor->email_bimbel,
            'email_pribadi' => $tentor->email_pribadi,
            'alamat' => $tentor->alamat
        ];
        
        $this->LivePengajar->insert($data);
        $this->HistoryPengajar->delete($id_pengajar);
    }
}