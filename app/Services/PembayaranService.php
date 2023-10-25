<?php

namespace App\Services;

use App\Models\LivePembayaran;
use App\Models\LivePresensi;
use App\Models\LiveSiswa;
use DateTime;

class PembayaranService
{
    private SiswaService $SiswaService;
    private PaketService $PaketService;
    private LivePembayaran $LivePembayaran;
    private LivePresensi $LivePresensi;
    private LiveSiswa $LiveSiswa;
    
    public function __construct()
    {
        $this->SiswaService = new SiswaService();
        $this->PaketService = new PaketService();
        $this->LivePembayaran = new LivePembayaran();
        $this->LivePresensi = new LivePresensi();
        $this->LiveSiswa = new LiveSiswa();
    }
    
    public function ambil_daftar_siswa(): ?array
    {
        $siswa = $this->SiswaService->ambil_siswa_aktif();
        $tatap_muka = $this->ambil_daftar_tatap_muka();
        $bayar = $this->LivePembayaran->findAll();
        
        $data = [];
        $today = new DateTime();
        $today->modify('first day of this month');
        $today->modify('+1 months');
        
        foreach ($siswa as $k1=>$v1) {
            $data[$k1]['siswa'] = $v1;
            $statusPembayaranPerBulan = [];
            $twelveMonthsAgo = new DateTime();
            $twelveMonthsAgo->modify('first day of -2 months');
            $id_bulan = 0;
            
            while ($twelveMonthsAgo <= $today) {
                $bulan = $twelveMonthsAgo->format('Y-m');
                $harga_paket = $v1->harga_paket;
                
                foreach ($tatap_muka as $k2 => $v2) {
                    if ($v1->id_siswa == $v2['id_siswa']) {
                        $detail = json_decode($v2['detail']);
                        $jumlah_tatap_muka = 0;
                        foreach ($detail as $k3 => $v3) {
                            $tanggalBulan = $v3->bulan;
                            
                            if ($bulan == $tanggalBulan) {
                                $jumlah_tatap_muka = $v3->total;
                            }
                        }
                        
                        if($v1->jenis == 1){
                            $harga_paket *= $jumlah_tatap_muka;
                        }
                        else if($v1->jenis == 0 && $jumlah_tatap_muka == 0){
                            $harga_paket = 0;
                        }
                    }
                }
                
                $totalPembayaran = 0;
                foreach ($bayar as $k2=>$v2) {
                    if ($v1->id_siswa == $v2->id_siswa) {
                        $tanggalPembayaran = date_create($v2->periode);
                        $tanggalBulanPembayaran = $tanggalPembayaran->format('Y-m');
                        
                        if ($bulan == $tanggalBulanPembayaran) {
                            $totalPembayaran += intval($v2->nominal);
                        }
                    }
                }
                $statusPembayaran = ($totalPembayaran >= $harga_paket) ? 'Lunas' : 'Tunggak';
                
                $statusPembayaranPerBulan[$id_bulan] = [
                    'periode' => $bulan,
                    'harga' => $harga_paket,
                    'total' => $totalPembayaran,
                    'status' => $statusPembayaran
                ];
                
                $twelveMonthsAgo->modify('+1 month');
                $id_bulan++;
            }
            
            $data[$k1]['status'] = $statusPembayaranPerBulan;
        }
        
        return $data;
    }
    
    public function ambil_detail_siswa($id_siswa): ?object
    {
        return $this->SiswaService->ambil_detail_siswa_aktif($id_siswa);
    }
    
    public function ambil_detail_bayar($id_siswa): ?array
    {
        $siswa = $this->ambil_detail_siswa($id_siswa);
        $tatap_muka = $this->ambil_daftar_tatap_muka();
        $bayar = $this->LivePembayaran
            ->where('id_siswa', $id_siswa)
            ->findAll();
        
        $today = new DateTime();
        $today->modify('first day of this month');
        $today->modify('+1 months');
        
        $statusPembayaranPerBulan = [];
        $twelveMonthsAgo = new DateTime();
        $twelveMonthsAgo->modify('first day of -5 months');
        $id_bulan = 0;
        
        while ($twelveMonthsAgo <= $today) {
            $bulan = $twelveMonthsAgo->format('Y-m');
            $harga_paket = $siswa->harga_paket;
            
            foreach ($tatap_muka as $k2 => $v2) {
                if ($siswa->id_siswa == $v2['id_siswa']) {
                    $detail = json_decode($v2['detail']);
                    $jumlah_tatap_muka = 0;
                    foreach ($detail as $k3 => $v3) {
                        $tanggalBulan = $v3->bulan;
                        
                        if ($bulan == $tanggalBulan) {
                            $jumlah_tatap_muka = $v3->total;
                        }
                    }
                    
                    if($siswa->jenis == 1){
                        $harga_paket *= $jumlah_tatap_muka;
                    }
                    else if($siswa->jenis == 0 && $jumlah_tatap_muka == 0){
                        $harga_paket = 0;
                    }
                }
            }
            
            $totalPembayaran = 0;
            $detailPembayaran = [];
            foreach ($bayar as $k2=>$v2) {
                if ($siswa->id_siswa == $v2->id_siswa) {
                    $tanggalPembayaran = date_create($v2->periode);
                    $tanggalBulanPembayaran = $tanggalPembayaran->format('Y-m');
                    
                    if ($bulan == $tanggalBulanPembayaran) {
                        $totalPembayaran += intval($v2->nominal);
                        $detailPembayaran[] = $v2;
                    }
                }
            }
            $statusPembayaran = ($totalPembayaran >= $harga_paket) ? 'Lunas' : 'Tunggak';
            
            $statusPembayaranPerBulan[$id_bulan] = [
                'periode' => $bulan,
                'harga' => $harga_paket,
                'total' => $totalPembayaran,
                'status' => $statusPembayaran,
                'detail' => $detailPembayaran
            ];
            
            $twelveMonthsAgo->modify('+1 month');
            $id_bulan++;
        }
        
        return array_reverse($statusPembayaranPerBulan);
    }
    
    public function ambil_daftar_tatap_muka(): ?array
    {
        $db = \Config\Database::connect();
        return $db->query("
            SELECT
                live_siswa.id_siswa,
                JSON_ARRAYAGG(
                    JSON_OBJECT(
                        'bulan', tanggal,
                        'total', total_hadir
                    )
                ) AS detail
            FROM
                live_siswa
            JOIN (
                SELECT
                    live_siswa.id_siswa,
                    DATE_FORMAT(live_pertemuan.tanggal, '%Y-%m') AS tanggal,
                    SUM(CASE WHEN live_presensi.status = 'H' THEN 1 ELSE 0 END) AS total_hadir
                FROM
                    live_siswa
                JOIN
                    live_presensi ON live_siswa.id_siswa = live_presensi.id_siswa
                JOIN
                    live_pertemuan ON live_presensi.id_pertemuan = live_pertemuan.id_pertemuan
                WHERE
                    live_presensi.status = 'H'
                GROUP BY
                    live_siswa.id_siswa, DATE_FORMAT(live_pertemuan.tanggal, '%Y-%m')
            ) subquery ON live_siswa.id_siswa = subquery.id_siswa
            GROUP BY
                live_siswa.id_siswa;
            ")
            ->getResultArray();
    }
    
    public function simpan_bayar(int $id_siswa, string $periode, string $tanggal, string $nominal, string $catatan = null, int $id_pembayaran = null): void
    {
        $this->LivePembayaran->upsert([
            'id_pembayaran' => $id_pembayaran,
            'id_siswa' => $id_siswa,
            'periode' => $periode,
            'tanggal' => $tanggal,
            'nominal' => $nominal,
            'catatan' => $catatan
        ]);
    }
    
    public function hapus_bayar(int $id_pembayaran): void
    {
        $this->LivePembayaran->delete($id_pembayaran);
    }
}