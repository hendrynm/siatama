<?php

namespace App\Services;

use App\Models\LivePenilaian;
use App\Models\LivePertemuan;
use App\Models\LivePresensi;
use App\Models\SettingNilai;
use App\Models\SettingSkor;
use Exception;
use http\Params;

class LaporanService
{
    private PresensiService $PresensiService;
    private SiswaService $SiswaService;
    private TentorService $TentorService;
    private LivePertemuan $LivePertemuan;
    private LivePresensi $LivePresensi;
    private LivePenilaian $LivePenilaian;
    private SettingNilai $SettingNilai;
    private SettingSkor $SettingSkor;
    
    public function __construct()
    {
        $this->PresensiService = new PresensiService();
        $this->SiswaService = new SiswaService();
        $this->TentorService = new TentorService();
        $this->LivePertemuan = new LivePertemuan();
        $this->LivePresensi = new LivePresensi();
        $this->LivePenilaian = new LivePenilaian();
        $this->SettingNilai = new SettingNilai();
        $this->SettingSkor = new SettingSkor();
    }
    
    public function ambil_daftar_kelas(): ?array
    {
        return $this->PresensiService->ambil_daftar_kelas();
    }
    
    public function ambil_detail_kelas(int $id_kelas): ?object
    {
        return $this->PresensiService->ambil_detail_kelas($id_kelas);
    }
    
    public function ambil_daftar_siswa_kelas(int $id_kelas): ?array
    {
        return $this->PresensiService->ambil_daftar_siswa_kelas($id_kelas);
    }
    
    public function ambil_detail_siswa(int $id_siswa): ?object
    {
        return $this->SiswaService->ambil_detail_siswa_aktif($id_siswa);
    }
    
    public function ambil_total_hadir(int $id_siswa): ?int
    {
        return $this->LivePresensi
            ->where('id_siswa', $id_siswa)
            ->where('status','H')
            ->countAllResults();
    }
    
    public function ambil_total_sakit(int $id_siswa): ?int
    {
        return $this->LivePresensi
            ->where('id_siswa', $id_siswa)
            ->where('status','S')
            ->countAllResults();
    }
    
    public function ambil_total_izin(int $id_siswa): ?int
    {
        return $this->LivePresensi
            ->where('id_siswa', $id_siswa)
            ->where('status','I')
            ->countAllResults();
    }
    
    public function ambil_total_alfa(int $id_siswa): ?int
    {
        return $this->LivePresensi
            ->where('id_siswa', $id_siswa)
            ->where('status','A')
            ->countAllResults();
    }
    
    public function ambil_total_nilai(int $id_siswa): ?int
    {
        return $this->LivePenilaian
            ->where('id_siswa', $id_siswa)
            ->groupBy('id_pertemuan')
            ->countAllResults();
    }
    
    public function ambil_kalkulasi_nilai(int $id_siswa): ?array
    {
        $nilai_convert = $this->ubah_nilai($id_siswa);
        
        $nilai_min = 100;
        $nilai_max = 0;
        $nilai_avg = 0;
        $nilai_avg_temp = 0;
        $nilai_avg_grup = [];
        $jumlah_avg = 0;
        
        foreach($nilai_convert as $n)
        {
            foreach($n as $i)
            {
                if($nilai_min > $i['nilai'])
                {
                    $nilai_min = $i['nilai'];
                }
                
                if($nilai_max < $i['nilai'])
                {
                    $nilai_max = $i['nilai'];
                }
                
                $nilai_avg += $i['nilai'];
                $nilai_avg_temp += $i['nilai'];
                $jumlah_avg++;
            }
            
            $nilai_avg_grup[] = number_format(($nilai_avg_temp / count($n)), 2);
            $nilai_avg_temp = 0;
        }
        
        $nilai_avg = number_format(($nilai_avg / $jumlah_avg), 2);
        
        return [$nilai_min, $nilai_max, $nilai_avg, $nilai_avg_grup];
    }
    
    public function ambil_catatan(int $id_siswa): ?array
    {
        return $this->LivePresensi
            ->select(['tanggal','selesai','catatan','status'])
            ->where('id_siswa', $id_siswa)
            ->where('status !=', 'N')
            ->join('live_pertemuan', 'live_presensi.id_pertemuan = live_pertemuan.id_pertemuan')
            ->findAll();
    }
    
    public function ambil_komponen(): ?array
    {
        $query = $this->SettingNilai
            ->join('setting_skor', 'setting_nilai.id_nilai = setting_skor.id_nilai')
            ->orderBy('setting_nilai.id_nilai')
            ->orderBy('urut')
            ->findAll();
        
        $data = [];
        foreach ($query as $q)
        {
            $data[$q->id_nilai]['nama'] = $q->nama_nilai;
            $data[$q->id_nilai]['deskripsi'] = $q->deskripsi;
            $data[$q->id_nilai]['skor'][] = $q->skor;
        }
        return $data;
    }
    
    public function ubah_nilai(int $id_siswa): ?array
    {
        $skor = $this->SettingSkor
            ->orderBy('setting_skor.id_nilai')
            ->orderBy('urut')
            ->findAll();
        
        $nilai = $this->LivePenilaian
            ->join('setting_nilai', 'live_penilaian.id_nilai = setting_nilai.id_nilai')
            ->join('live_pertemuan', 'live_penilaian.id_pertemuan = live_pertemuan.id_pertemuan')
            ->where('id_siswa', $id_siswa)
            ->findAll();
        
        $skor_arr = [];
        $skor_convert = [];
        $nilai_convert = [];
        $id_nilai_temp = 0;
        
        foreach ($skor as $s)
        {
            if($id_nilai_temp !== $s->id_nilai)
            {
                $id_nilai_temp = $s->id_nilai;
            }
            
            $skor_arr[$s->id_nilai][] = (int) $s->skor;
        }
        
        foreach($skor_arr as $k=>$s)
        {
            if(count($s) === 2)
            {
                $beda = $s[1] - $s[0] + 1;
                $skor_level = 100 / $beda;
                
                for($i=$s[0]; $i<=$s[1]; $i++)
                {
                    $skor_convert[$k][$i] = ($i * $skor_level);
                }
            }
            else
            {
                foreach($s as $i)
                {
                    $skor_convert[$k][$i] = $i;
                }
            }
        }
        
        
        foreach($nilai as $n)
        {
            $nilai_convert[$n->id_pertemuan][$n->id_nilai]['tanggal'] = $n->tanggal;
            $nilai_convert[$n->id_pertemuan][$n->id_nilai]['nama'] = $n->nama_nilai;
            $nilai_convert[$n->id_pertemuan][$n->id_nilai]['nilai'] = $skor_convert[$n->id_nilai][$n->nilai];
        }
        
        return $nilai_convert;
    }
    
    public function ambil_nilai(int $id_siswa): ?array
    {
        $nilai_convert = $this->ubah_nilai($id_siswa);
        $nilai_fix = [];
        
        foreach ($nilai_convert as $k=>$n)
        {
            $nilai_fix[] = array_values($n);
        }
        
        return $nilai_fix;
    }
    
    public function ambil_daftar_tentor(): ?array
    {
        return $this->TentorService->ambil_daftar_tentor_aktif();
    }
    
    public function ambil_detail_tentor(int $id_tentor): ?object
    {
        return $this->TentorService->ambil_detail_tentor($id_tentor);
    }
    
    public function ambil_waktu_mengajar(int $id_tentor, string $mulai = null, string $selesai = null): ?array
    {
        if($mulai !== null)
        {
            $query1 = $this->LivePertemuan
                ->join('live_kelas', 'live_pertemuan.id_kelas = live_kelas.id_kelas')
                ->join('setting_tingkat', 'live_kelas.id_tingkat = setting_tingkat.id_tingkat')
                ->join('setting_jenjang', 'setting_tingkat.id_jenjang = setting_jenjang.id_jenjang')
                ->where('id_pengajar', $id_tentor)
                ->where('live_pertemuan.tanggal >=', $mulai)
                ->where('live_pertemuan.tanggal <=', $selesai)
                ->orderBy('setting_jenjang.id_jenjang')
                ->orderBy('jenis')
                ->orderBy('tanggal')
                ->findAll();
        }
        else
        {
            $query1 = $this->LivePertemuan
                ->join('live_kelas', 'live_pertemuan.id_kelas = live_kelas.id_kelas')
                ->join('setting_tingkat', 'live_kelas.id_tingkat = setting_tingkat.id_tingkat')
                ->join('setting_jenjang', 'setting_tingkat.id_jenjang = setting_jenjang.id_jenjang')
                ->where('id_pengajar', $id_tentor)
                ->where('live_pertemuan.tanggal >=', date('Y-m-d', strtotime('-1 month')))
                ->orderBy('setting_jenjang.id_jenjang')
                ->orderBy('jenis')
                ->orderBy('tanggal')
                ->findAll();
        }
        
        // Inisialisasi array untuk hasil pengelompokan
        $groupedData = [];
        foreach ($query1 as $item) {
            $jenjang = $item->id_jenjang;
            $jenis = $item->jenis;
            
            // Tambahkan item ke kelompok berdasarkan jenis
            if (!isset($groupedData[$jenjang][$jenis]))
            {
                $groupedData[$jenjang][$jenis] = [
                    'items' => [],
                    'total_durasi' => 0,
                ];
            }
            
            $groupedData[$jenjang][$jenis]['items'][] = $item;
            
            // Hitung durasi mengajar dan tambahkan ke total_durasi
            $tanggalMulai = strtotime($item->tanggal);
            $tanggalSelesai = strtotime($item->selesai);
            $durasi = $tanggalSelesai - $tanggalMulai;
            $groupedData[$jenjang][$jenis]['total_durasi'] += $durasi;
        }
        
        foreach ($groupedData as $jenjang => $jenjangData)
        {
            foreach ($jenjangData as $jenis => $jenisData)
            {
                $totalDurasi = $jenisData['total_durasi'];
                $totalJam = floor($totalDurasi / 3600); // 3600 detik dalam 1 jam
                $totalSisaDetik = $totalDurasi % 3600;
                $totalMenit = floor($totalSisaDetik / 60); // 60 detik dalam 1 menit
                $groupedData[$jenjang][$jenis]['durasi_jam'] = $totalJam;
                $groupedData[$jenjang][$jenis]['durasi_menit'] = $totalMenit;
            }
        }
        
        return $groupedData;
    }
}