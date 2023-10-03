<?php

namespace App\Services;

use App\Models\LivePenilaian;
use App\Models\SettingNilai;
use App\Models\SettingSkor;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Config\Database;
use stdClass;

class PenilaianService
{
    private SettingNilai $SettingNilai;
    private SettingSkor $SettingSkor;
    private LivePenilaian $LivePenilaian;
    
    public function __construct()
    {
        $this->SettingNilai = new SettingNilai();
        $this->SettingSkor = new SettingSkor();
        $this->LivePenilaian = new LivePenilaian();
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
    
    public function simpan_komponen(array $id_nilai, array $nama_nilai, array $jenis, array $id_skor, array $skor): void
    {
        foreach ($nama_nilai as $k=>$n)
        {
            $db = Database::connect();
            $db->transStart();
            
            try
            {
                $this->SettingNilai
                    ->upsert([
                        'id_nilai' => $id_nilai[$k] ?? null,
                        'nama_nilai' => $n,
                        'jenis' => $jenis[$k],
                    ]);
                
                $id_nilai_baru = $db->insertID();
                
                foreach ($skor[$k] as $i=>$s)
                {
                    if($s != '')
                    {
                        $this->SettingSkor
                            ->upsert([
                                'id_skor' => $id_skor[$k][$i] ?? null,
                                'urut' => $i+1,
                                'id_nilai' => $id_nilai[$k] ?? $id_nilai_baru,
                                'skor' => $s,
                            ]);
                    }
                }
                
                $db->transCommit();
            }
            catch (DatabaseException $e)
            {
                $db->transRollback();
                throw $e;
            }
        }
    }
    
    public function ambil_nilai_presensi(int $id_nilai): ?array
    {
        return $this->SettingSkor
            ->join('setting_nilai', 'setting_nilai.id_nilai = setting_skor.id_nilai')
            ->where('setting_nilai.id_nilai', $id_nilai)
            ->findAll();
    }
    
    public function ambil_detail_nilai(int $id_pertemuan, int $id_siswa): ?object
    {
        $nilai = $this->LivePenilaian
            ->join('setting_nilai', 'setting_nilai.id_nilai = live_penilaian.id_nilai')
            ->join('setting_skor', 'setting_skor.id_nilai = setting_nilai.id_nilai')
            ->where('id_pertemuan', $id_pertemuan)
            ->where('id_siswa', $id_siswa)
            ->first();
        
        return $nilai ?? null;
    }
    
    public function simpan_nilai(int $id_pertemuan, int $id_siswa, int $id_nilai, int|string $nilai, int $id_penilaian = null): bool
    {
        $nilai = $this->LivePenilaian
            ->upsert([
                'id_penilaian' => $id_penilaian,
                'id_nilai' => $id_nilai,
                'id_pertemuan' => $id_pertemuan,
                'id_siswa' => $id_siswa,
                'nilai' => $nilai,
            ]);
        
        return $nilai;
    }
}