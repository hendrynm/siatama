<?php

namespace App\Controllers;

use App\Services\PenilaianService;
use App\Services\PresensiService;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\RedirectResponse;
use Config\Database;

class PresensiController extends BaseController
{
    private PresensiService $PresensiService;
    private PenilaianService $PenilaianService;
    
    public function __construct()
    {
        $this->PresensiService = new PresensiService();
        $this->PenilaianService = new PenilaianService();
    }
    
    public function index(): string
    {
        return view('admin/presensi/index');
    }
    
    public function kehadiran_pilih_kelas(): string
    {
        $kelas = $this->PresensiService->ambil_daftar_kelas();
        
        return view('admin/presensi/kehadiran/pilih_kelas', [
            'kelas' => $kelas
        ]);
    }
    
    public function kehadiran_lihat_kelas(int $id_kelas): string
    {
        $kelas = $this->PresensiService->ambil_detail_kelas($id_kelas);
        $pertemuan = $this->PresensiService->ambil_daftar_pertemuan($id_kelas);
        $cek_presensi = $this->PresensiService->cek_presensi_terisi($pertemuan);
        
        return view('admin/presensi/kehadiran/lihat_kelas', [
            'kelas' => $kelas,
            'pertemuan' => $pertemuan,
            'cek_presensi' => $cek_presensi
        ]);
    }
    
    public function kehadiran_tambah_presensi(int $id_kelas): string
    {
        $tatap_muka = $this->PresensiService->ambil_tatap_muka_terakhir($id_kelas);
        $kelas = $this->PresensiService->ambil_detail_kelas($id_kelas);
        $pengajar = $this->PresensiService->ambil_daftar_pengajar();
        
        return view('admin/presensi/kehadiran/tambah_presensi', [
            'tatap_muka' => $tatap_muka,
            'kelas' => $kelas,
            'pengajar' => $pengajar,
        ]);
    }
    
    public function kehadiran_tambah_presensi_post(): RedirectResponse
    {
        $id_kelas = $this->request->getPost('id_kelas');
        $tatap_muka = $this->request->getPost('tatap_muka');
        $tanggal = $this->request->getPost('tanggal');
        $id_pengajar = $this->request->getPost('id_pengajar');
        
        $simpan = $this->PresensiService->simpan_presensi($id_kelas, $tatap_muka, $tanggal, $id_pengajar);
        
        if($simpan)
        {
            return redirect()->to(url_to('PresensiController::kehadiran_lihat_kelas', $id_kelas))
                ->with('success', 'Berhasil menambahkan presensi');
        }
        return redirect()->back()->withInput()
            ->with('error', 'Gagal menambahkan presensi');
    }
    
    public function kehadiran_ubah_presensi(int $id_kelas, int $id_pertemuan): string
    {
        $kelas = $this->PresensiService->ambil_detail_kelas($id_kelas);
        $pertemuan = $this->PresensiService->ambil_detail_pertemuan($id_pertemuan);
        $pengajar = $this->PresensiService->ambil_daftar_pengajar();
        
        return view('admin/presensi/kehadiran/ubah_presensi', [
            'kelas' => $kelas,
            'pertemuan' => $pertemuan,
            'pengajar' => $pengajar
        ]);
    }
    
    public function kehadiran_ubah_presensi_post(): RedirectResponse
    {
        $id_kelas = $this->request->getPost('id_kelas');
        $id_pertemuan = $this->request->getPost('id_pertemuan');
        $tatap_muka = $this->request->getPost('tatap_muka');
        $tanggal = $this->request->getPost('tanggal');
        $id_pengajar = $this->request->getPost('id_pengajar');
        
        $simpan = $this->PresensiService->simpan_presensi($id_kelas, $tatap_muka, $tanggal, $id_pengajar,  $id_pertemuan);
        
        if($simpan)
        {
            return redirect()->to(url_to('PresensiController::kehadiran_lihat_kelas', $id_kelas))
                ->with('success', 'Berhasil mengubah presensi');
        }
        return redirect()->back()->withInput()
            ->with('error', 'Gagal mengubah presensi');
    }
    
    public function kehadiran_hapus_presensi(): string
    {
        $id_pertemuan = $this->request->getPost('id_pertemuan');
        
        $db = Database::connect();
        try
        {
            $db->transException(true)->transStart();
            $this->PresensiService->hapus_presensi($id_pertemuan);
            $db->transComplete();
            
            return 'sukses';
        }
        catch (DatabaseException $e)
        {
            return $e->getMessage();
        }
    }
    
    public function kehadiran_isi_presensi(int $id_kelas, int $id_pertemuan): string
    {
        $kelas = $this->PresensiService->ambil_detail_kelas($id_kelas);
        $pertemuan = $this->PresensiService->ambil_detail_pertemuan($id_pertemuan);
        $siswa = $this->PresensiService->ambil_daftar_siswa_kelas($id_kelas);
        $presensi = $this->PresensiService->ambil_detail_presensi($id_pertemuan);
        $cek_presensi = $this->PresensiService->cek_presensi_expired($id_pertemuan);
        $nilai = $this->PenilaianService->ambil_daftar_nilai();
        $skor = $this->PenilaianService->ambil_daftar_skor($nilai);
        
        return view('admin/presensi/kehadiran/isi_presensi', [
            'kelas' => $kelas,
            'pertemuan' => $pertemuan,
            'siswa' => $siswa,
            'presensi' => $presensi,
            'cek_presensi' => $cek_presensi,
            'nilai' => $nilai,
            'skor' => $skor
        ]);
    }
    
    public function kehadiran_simpan_foto(): RedirectResponse
    {
        $foto = $this->request->getFile('file_foto');
        $id_kelas = $this->request->getPost('id_kelas');
        $id_pertemuan = $this->request->getPost('id_pertemuan');
        
        $simpan = $this->PresensiService->simpan_foto_presensi($id_kelas, $id_pertemuan, $foto);
        
        if($simpan)
        {
            return redirect()->to(url_to('PresensiController::kehadiran_isi_presensi', $id_kelas, $id_pertemuan))
                ->with('success', 'Berhasil menambahkan foto');
        }
        return redirect()->back()->withInput()
            ->with('error', 'Gagal menambahkan foto');
    }
    
    public function kehadiran_simpan_presensi(): string
    {
        $id_pertemuan = $this->request->getPost('id_pertemuan');
        $id_siswa = $this->request->getPost('id_siswa');
        $status = $this->request->getPost('status');
        
        $simpan = $this->PresensiService->simpan_presensi_siswa($id_pertemuan, $id_siswa, $status);
        
        return ($simpan) ? json_encode(['status' => 'success']) : json_encode(['status' => 'error']);
    }
    
    public function kehadiran_simpan_catatan(): string
    {
        $id_pertemuan = $this->request->getPost('id_pertemuan');
        $id_siswa = $this->request->getPost('id_siswa');
        $catatan = $this->request->getPost('catatan');
        
        $simpan = $this->PresensiService->simpan_catatan_siswa($id_pertemuan, $id_siswa, $catatan);
        
        return ($simpan) ? json_encode(['status' => 'success']) : json_encode(['status' => 'error']);
    }
    
    public function kehadiran_ambil_catatan(): string
    {
        $id_pertemuan = $this->request->getPost('id_pertemuan');
        $id_siswa = $this->request->getPost('id_siswa');
        
        $catatan = $this->PresensiService->ambil_catatan_siswa($id_pertemuan, $id_siswa);
        
        return json_encode(['catatan' => $catatan]);
    }
    
    
    public function pengaturan_pilih_kelas(): string
    {
        $kelas = $this->PresensiService->ambil_daftar_kelas();
        
        return view('admin/presensi/pengaturan/pilih_kelas', [
            'kelas' => $kelas
        ]);
    }
    
    public function pengaturan_lihat_kelas(int $id_kelas): string
    {
        $kelas = $this->PresensiService->ambil_detail_kelas($id_kelas);
        $siswa = $this->PresensiService->ambil_daftar_siswa_kelas($id_kelas);
        $siswa_aktif = $this->PresensiService->ambil_daftar_siswa_aktif_nonkelas($kelas->id_tingkat, $id_kelas);
        
        return view('admin/presensi/pengaturan/lihat_kelas', [
            'kelas' => $kelas,
            'siswa' => $siswa,
            'siswa_aktif' => $siswa_aktif
        ]);
    }
    
    public function pengaturan_tambah_siswa_post(): RedirectResponse
    {
        $id_kelas = $this->request->getPost('id_kelas');
        $id_siswa = $this->request->getPost('id-siswa');
        
        $simpan = $this->PresensiService->simpan_siswa_kelas($id_kelas, $id_siswa);
        
        if($simpan)
        {
            return redirect()->to(url_to('PresensiController::pengaturan_lihat_kelas', $id_kelas))
                ->with('success', 'Berhasil menambahkan siswa');
        }
        return redirect()->back()->withInput()
            ->with('error', 'Gagal menambahkan siswa');
    }
    
    public function pengaturan_tambah_kelas(): string
    {
        $jenjang = $this->PresensiService->ambil_daftar_jenjang();
        
        return view('admin/presensi/pengaturan/tambah_kelas', [
            'jenjang' => $jenjang
        ]);
    }
    
    public function pengaturan_tambah_kelas_post(): RedirectResponse
    {
        $id_tingkat = $this->request->getPost('id_tingkat');
        $jenis = $this->request->getPost('jenis');
        $nama_kelas = $this->request->getPost('nama_kelas');
        
        $simpan = $this->PresensiService->simpan_kelas($id_tingkat, $jenis, $nama_kelas);
        
        if($simpan)
        {
            return redirect()->to(url_to('PresensiController::pengaturan_pilih_kelas'))
                ->with('success', 'Berhasil menambahkan kelas');
        }
        return redirect()->back()->withInput()
            ->with('error', 'Gagal menambahkan kelas');
    }
    
    public function pengaturan_ubah_kelas(int $id_kelas): string
    {
        $kelas = $this->PresensiService->ambil_detail_kelas($id_kelas);
        $jenjang = $this->PresensiService->ambil_daftar_jenjang();
        $tingkat = $this->PresensiService->ambil_daftar_tingkat($kelas->id_jenjang);
        
        return view('admin/presensi/pengaturan/ubah_kelas', [
            'kelas' => $kelas,
            'jenjang' => $jenjang,
            'tingkat' => $tingkat
        ]);
    }
    
    public function pengaturan_ubah_kelas_post(): RedirectResponse
    {
        $id_kelas = $this->request->getPost('id_kelas');
        $id_tingkat = $this->request->getPost('id_tingkat');
        $jenis = $this->request->getPost('jenis');
        $nama_kelas = $this->request->getPost('nama_kelas');
        
        $simpan = $this->PresensiService->simpan_kelas($id_tingkat, $jenis, $nama_kelas, $id_kelas);
        
        if($simpan)
        {
            return redirect()->to(url_to('PresensiController::pengaturan_lihat_kelas', $id_kelas))
                ->with('success', 'Berhasil mengubah kelas');
        }
        return redirect()->back()->withInput()
            ->with('error', 'Gagal mengubah kelas');
    }
    
    public function pengaturan_daftar_tingkat(): string
    {
        $id_jenjang = $this->request->getPost('id_jenjang');
        
        $tingkat = $this->PresensiService->ambil_daftar_tingkat($id_jenjang);
        
        return json_encode($tingkat);
    }
}
