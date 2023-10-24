<?php

namespace App\Services;

use App\Models\HistorySiswa;
use App\Models\LiveJadwal;
use App\Models\LiveKelas;
use App\Models\LivePembayaran;
use App\Models\LivePenilaian;
use App\Models\LivePertemuan;
use App\Models\LivePresensi;
use App\Models\LiveSiswa;
use App\Models\SettingJenjang;
use App\Models\SettingSemester;
use App\Models\SettingTingkat;

class SemesterService
{
    private SettingSemester $SettingSemester;
    private LivePenilaian $LivePenilaian;
    private LivePertemuan $LivePertemuan;
    private LivePresensi $LivePresensi;
    private LiveJadwal $LiveJadwal;
    private LiveKelas $LiveKelas;
    private LivePembayaran $LivePembayaran;
    private LiveSiswa $LiveSiswa;
    private SettingTingkat $SettingTingkat;
    private SettingJenjang $SettingJenjang;
    private HistorySiswa $HistorySiswa;
    
    public function __construct()
    {
        $this->SettingSemester = new SettingSemester();
        $this->LivePenilaian = new LivePenilaian();
        $this->LivePertemuan = new LivePertemuan();
        $this->LivePresensi = new LivePresensi();
        $this->LiveJadwal = new LiveJadwal();
        $this->LiveKelas = new LiveKelas();
        $this->LivePembayaran = new LivePembayaran();
        $this->LiveSiswa = new LiveSiswa();
        $this->SettingTingkat = new SettingTingkat();
        $this->SettingJenjang = new SettingJenjang();
        $this->HistorySiswa = new HistorySiswa();
    }
    
    public function ambil_semester_aktif(): ?object
    {
        return $this->SettingSemester
            ->where('status', 1)
            ->first();
    }
    
    public function simpan_semester_baru(string $nama_semester_baru, int $id_semester_lama): void
    {
        $this->SettingSemester
            ->where('id_semester', $id_semester_lama)
            ->set([
                'status' => 0
            ])
            ->update();
        
        $this->SettingSemester
            ->insert([
                'nama_semester' => $nama_semester_baru,
                'status' => 1
            ]);
    }
    
    public function aksi_semester_gasal(): void
    {
        $this->LivePenilaian
            ->truncate();
        
        $this->LivePertemuan
            ->truncate();
        
        $this->LivePresensi
            ->truncate();
    }
    
    public function aksi_semester_genap(): void
    {
        $this->LiveJadwal
            ->truncate();
        
        $this->LiveKelas
            ->truncate();
        
        $this->LivePembayaran
            ->truncate();
        
        $this->LivePenilaian
            ->truncate();
        
        $this->LivePertemuan
            ->truncate();
        
        $this->LivePresensi
            ->truncate();
        
        $jenjang = $this->SettingJenjang
            ->findAll();
        
        $tingkat_akhir = [];
        foreach ($jenjang as $j)
        {
            $id_tingkat = $this->SettingTingkat
                ->where('id_jenjang', $j->id_jenjang)
                ->orderBy('nama_tingkat', 'DESC')
                ->first();
            
            $tingkat_akhir[] = $id_tingkat->id_tingkat;
        }
        
        $siswa_akhir = $this->LiveSiswa
            ->whereIn('id_tingkat', $tingkat_akhir)
            ->findAll();
        
        foreach ($siswa_akhir as $s)
        {
            $this->HistorySiswa
                ->insert([
                    'id_history_siswa' => $s->id_siswa,
                    'nama_siswa' => $s->nama_siswa,
                    'id_tingkat' => $s->id_tingkat,
                    'id_history_kelas' => $s->id_kelas,
                    'id_paket' => $s->id_paket,
                    'asal_sekolah' => $s->asal_sekolah,
                    'nama_ortu' => $s->nama_ortu,
                    'telepon_ortu' => $s->telepon_ortu,
                ]);
            
            $this->LiveSiswa
                ->delete($s->id_siswa);
        }
        
        $siswa = $this->LiveSiswa
            ->findAll();
        
        foreach ($siswa as $s)
        {
            $this->LiveSiswa
                ->where('id_siswa', $s->id_siswa)
                ->set([
                    'id_tingkat' => $s->id_tingkat + 1
                ])
                ->update();
        }
    }
}