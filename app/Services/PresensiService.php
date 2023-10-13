<?php

namespace App\Services;

use App\Models\LiveKelas;
use App\Models\LivePengajar;
use App\Models\LivePertemuan;
use App\Models\LivePresensi;
use App\Models\LiveSiswa;
use App\Models\SettingJenjang;
use App\Models\SettingTingkat;
use Config\Services;
use stdClass;

class PresensiService
{
    private LiveKelas $LiveKelas;
    private LivePertemuan $LivePertemuan;
    private LivePengajar $LivePengajar;
    private LivePresensi $LivePresensi;
    private LiveSiswa $LiveSiswa;
    private SettingJenjang $SettingJenjang;
    private SettingTingkat $SettingTingkat;
    
    public function __construct()
    {
        $this->LiveKelas = new LiveKelas();
        $this->LivePertemuan = new LivePertemuan();
        $this->LivePengajar = new LivePengajar();
        $this->LivePresensi = new LivePresensi();
        $this->LiveSiswa = new LiveSiswa();
        $this->SettingJenjang = new SettingJenjang();
        $this->SettingTingkat = new SettingTingkat();
    }
    
    public function ambil_daftar_kelas(): ?array
    {
        return $this->LiveKelas
            ->join('setting_tingkat', 'setting_tingkat.id_tingkat = live_kelas.id_tingkat')
            ->join('setting_jenjang', 'setting_jenjang.id_jenjang = setting_tingkat.id_jenjang')
            ->orderBy('live_kelas.id_tingkat')
            ->orderBy('live_kelas.nama_kelas')
            ->findAll();
    }
    
    public function ambil_detail_kelas(int $id_kelas): ?object
    {
        return $this->LiveKelas
            ->join('setting_tingkat', 'setting_tingkat.id_tingkat = live_kelas.id_tingkat')
            ->join('setting_jenjang', 'setting_jenjang.id_jenjang = setting_tingkat.id_jenjang')
            ->where('id_kelas', $id_kelas)
            ->first();
    }
    
    public function ambil_daftar_pertemuan(int $id_kelas): ?array
    {
        return $this->LivePertemuan
            ->join('live_pengajar', 'live_pengajar.id_pengajar = live_pertemuan.id_pengajar')
            ->where('id_kelas', $id_kelas)
            ->orderBy('tatap_muka')
            ->findAll();
    }
    
    public function ambil_detail_pertemuan(int $id_pertemuan): ?object
    {
        return $this->LivePertemuan
            ->join('live_pengajar', 'live_pengajar.id_pengajar = live_pertemuan.id_pengajar')
            ->where('id_pertemuan', $id_pertemuan)
            ->first();
    }
    
    public function simpan_presensi(int $id_kelas, int $tatap_muka, string $tanggal, string $selesai, int $id_pengajar, int $id_pertemuan = null): bool
    {
        $data = [
            'id_pertemuan' => $id_pertemuan,
            'id_kelas' => $id_kelas,
            'tatap_muka' => $tatap_muka,
            'tanggal' => $tanggal,
            'selesai' => $selesai,
            'id_pengajar' => $id_pengajar
        ];
        
        return $this->LivePertemuan->upsert($data);
    }
    
    public function hapus_presensi(int $id_pertemuan): bool
    {
        return $this->LivePertemuan->delete($id_pertemuan);
    }
    
    public function ambil_daftar_siswa_kelas(int $id_kelas): ?array
    {
        return $this->LiveKelas
            ->join('live_siswa', 'live_siswa.id_kelas = live_kelas.id_kelas')
            ->where('live_kelas.id_kelas', $id_kelas)
            ->orderBy('nama_siswa')
            ->findAll();
    }
    
    public function simpan_foto_presensi(int $id_kelas, int $id_pertemuan, $foto): bool
    {
        $nama_file = $foto->getRandomName();
        
        Services::image()
            ->withFile($foto)
            ->convert(IMAGETYPE_JPEG)
            ->save(ROOTPATH . 'public/uploads/'. $nama_file);
        
        $data = [
            'id_pertemuan' => $id_pertemuan,
            'id_kelas' => $id_kelas,
            'foto' => $nama_file
        ];
        
        return $this->LivePertemuan->upsert($data);
    }
    
    public function ambil_daftar_pengajar(): ?array
    {
        return $this->LivePengajar
            ->orderBy('nama_pengajar', 'ASC')
            ->findAll();
    }
    
    public function ambil_detail_presensi($id_pertemuan): ?array
    {
        return $this->LivePresensi
            ->where('id_pertemuan', $id_pertemuan)
            ->findAll();
    }
    
    public function simpan_presensi_siswa(int $id_pertemuan, int $id_siswa, string $status): bool
    {
        $cek = $this->LivePresensi
            ->where('id_pertemuan', $id_pertemuan)
            ->where('id_siswa', $id_siswa)
            ->first();
        
        $data = [
            'id_pertemuan' => $id_pertemuan,
            'id_siswa' => $id_siswa,
            'status' => $status
        ];
        
        return ($cek != null) ?
            $this->LivePresensi->update($cek->id_presensi, $data) :
            $this->LivePresensi->insert($data);
    }
    
    public function simpan_catatan_siswa(int $id_pertemuan, int $id_siswa, string $catatan): bool
    {
        $cek = $this->LivePresensi
            ->where('id_pertemuan', $id_pertemuan)
            ->where('id_siswa', $id_siswa)
            ->first();
        
        $data = [
            'catatan' => $catatan
        ];
        
        return $this->LivePresensi->update($cek->id_presensi, $data);
    }
    
    public function ambil_catatan_siswa(int $id_pertemuan, int $id_siswa): ?string
    {
        $cek = $this->LivePresensi
            ->where('id_pertemuan', $id_pertemuan)
            ->where('id_siswa', $id_siswa)
            ->first();
        
        return $cek->catatan;
    }
    
    public function ambil_daftar_siswa_aktif_nonkelas(int $id_kelas): ?array
    {
        return $this->LiveKelas
            ->select(['id_siswa','nama_siswa','nama_tingkat'])
            ->join('live_siswa', 'live_siswa.id_kelas = live_kelas.id_kelas')
            ->join('setting_tingkat', 'setting_tingkat.id_tingkat = live_kelas.id_tingkat')
            ->where('live_siswa.id_kelas !=', $id_kelas)
            ->orderBy('live_siswa.id_tingkat')
            ->orderBy('nama_siswa')
            ->findAll();
    }
    
    public function simpan_siswa_kelas(int $id_kelas, int $id_siswa): bool
    {
        $data = [
            'id_kelas' => $id_kelas
        ];
        
        return $this->LiveSiswa->update($id_siswa, $data);
    }
    
    public function ambil_daftar_jenjang(): ?array
    {
        return $this->SettingJenjang
            ->findAll();
    }
    
    public function ambil_daftar_tingkat(int $id_jenjang): ?array
    {
        return $this->SettingTingkat
            ->where('id_jenjang', $id_jenjang)
            ->findAll();
    }
    
    public function simpan_kelas(int $id_tingkat, int $jenis, string $nama_kelas, int $id_kelas = null): bool
    {
        $data = [
            'id_kelas' => $id_kelas,
            'id_tingkat' => $id_tingkat,
            'jenis' => $jenis,
            'nama_kelas' => $nama_kelas
        ];
        
        return $this->LiveKelas->upsert($data);
    }
    
    public function cek_presensi_terisi(array $pertemuan): stdClass
    {
        $cek = new stdClass();
        
        foreach ($pertemuan as $k=>$p)
        {
            $query = $this->LivePresensi
                ->where('id_pertemuan', $p->id_pertemuan)
                ->countAllResults();
            
            $cek->{$k} = $query <= 0;
        }
        
        return $cek;
    }
    
    public function ambil_tatap_muka_terakhir(int $id_kelas): int
    {
        $tatap_muka = $this->LivePertemuan
            ->where('id_kelas', $id_kelas)
            ->orderBy('tatap_muka', 'DESC')
            ->findColumn('tatap_muka');
        
        $nomor = $tatap_muka[0] ?? 0;
        
        return ++$nomor;
    }
    
    public function cek_presensi_expired(int $id_pertemuan): bool
    {
        $cek = $this->LivePertemuan
            ->where('id_pertemuan', $id_pertemuan)
            ->first();
        
        $sekarang = strtotime(date('Y-m-d H:i:s'));
        $tanggal = strtotime($cek->selesai);
        $tanggal = strtotime("+2 days", $tanggal);
        
        return $sekarang < $tanggal;
    }
}