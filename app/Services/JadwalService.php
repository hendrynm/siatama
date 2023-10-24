<?php

namespace App\Services;

use App\Models\LiveJadwal;

class JadwalService
{
    private PresensiService $PresensiService;
    private TentorService $TentorService;
    private LiveJadwal $LiveJadwal;
    
    public function __construct()
    {
        $this->PresensiService = new PresensiService();
        $this->TentorService = new TentorService();
        $this->LiveJadwal = new LiveJadwal();
    }
    
    public function ambil_daftar_tentor(): ?array
    {
        return $this->TentorService->ambil_daftar_tentor_aktif();
    }
    
    public function ambil_jadwal_tentor(): ?array
    {
        $batas_awal = date('Y-m-d', strtotime('-1 month'));
        return $this->LiveJadwal
            ->join('live_kelas', 'live_kelas.id_kelas = live_jadwal.id_kelas')
            ->join('live_pengajar', 'live_pengajar.id_pengajar = live_jadwal.id_pengajar')
            ->where('live_jadwal.tanggal >=', $batas_awal)
            ->orderBy('tanggal')
            ->findAll();
    }
    
    public function ambil_detail_tentor(int $id_pengajar): ?object
    {
        return $this->TentorService->ambil_detail_tentor($id_pengajar);
    }
    
    public function ambil_detail_jadwal_pengajar(int $id_pengajar): ?array
    {
        $jadwal = $this->LiveJadwal
            ->join('live_kelas', 'live_kelas.id_kelas = live_jadwal.id_kelas')
            ->where('live_jadwal.id_pengajar', $id_pengajar)
            ->where('live_jadwal.tanggal >=', date('Y-m-d'))
            ->orderBy('tanggal')
            ->findAll();
        
        $data = [];
        $id_arr = -1;
        $tanggal_temp = '';
        foreach ($jadwal as $j)
        {
            $tanggal_arr = date('d-m-Y',strtotime($j->tanggal));
            if($tanggal_temp != $tanggal_arr)
            {
                $id_arr++;
                $tanggal_temp = $tanggal_arr;
            }
            
            $kelas = $j->id_kelas == 0 ? 'Tersedia' : 'Kelas ' . $j->nama_kelas;
            $data[$id_arr][] = [
                'id_jadwal' => $j->id_jadwal,
                'id_kelas' => $j->id_kelas,
                'nama_kelas' => $kelas,
                'mulai' => $j->tanggal,
                'selesai' => $j->selesai,
            ];
        }
        
        return $data;
    }
    
    public function ambil_detail_jadwal(int $id_jadwal): ?object
    {
        return $this->LiveJadwal
            ->join('live_kelas', 'live_kelas.id_kelas = live_jadwal.id_kelas')
            ->find($id_jadwal);
    }
    
    public function ambil_daftar_kelas(): ?array
    {
        return $this->PresensiService->ambil_daftar_kelas();
    }
    
    public function simpan_jadwal(int $id_kelas, int $id_pengajar, array $tanggal, array $selesai, int $id_jadwal = null): void
    {
        foreach ($tanggal as $k=>$v)
        {
            $this->LiveJadwal->upsert([
                'id_jadwal' => $id_jadwal,
                'id_kelas' => $id_kelas,
                'id_pengajar' => $id_pengajar,
                'tanggal' => $v,
                'selesai' => $selesai[$k],
            ]);
        }
    }
    
    public function hapus_jadwal(int $id_jadwal): void
    {
        $this->LiveJadwal->delete($id_jadwal);
    }
}