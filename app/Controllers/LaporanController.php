<?php

namespace App\Controllers;

use App\Services\LaporanService;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use DivisionByZeroError;
use Mpdf\MpdfException;

class LaporanController extends BaseController
{
    private LaporanService $LaporanService;
    
    public function __construct()
    {
        $this->LaporanService = new LaporanService();
    }
    
    public function index(): string
    {
        return view('admin/laporan/index');
    }
    
    public function pilih_kelas(): string
    {
        $kelas = $this->LaporanService->ambil_daftar_kelas();
        
        return view('admin/laporan/siswa/pilih_kelas',[
            'kelas' => $kelas
        ]);
    }
    
    public function lihat_kelas(int $id_kelas): string
    {
        $kelas = $this->LaporanService->ambil_detail_kelas($id_kelas);
        $siswa = $this->LaporanService->ambil_daftar_siswa_kelas($id_kelas);
        
        return view('admin/laporan/siswa/lihat_kelas',[
            'kelas' => $kelas,
            'siswa' => $siswa
        ]);
    }
    
    public function laporan_siswa(int $id_kelas, int $id_siswa): string|RedirectResponse
    {
        try
        {
            $kelas = $this->LaporanService->ambil_detail_kelas($id_kelas);
            $siswa = $this->LaporanService->ambil_detail_siswa($id_siswa);
            $total_hadir = $this->LaporanService->ambil_total_hadir($id_siswa);
            $total_sakit = $this->LaporanService->ambil_total_sakit($id_siswa);
            $total_izin = $this->LaporanService->ambil_total_izin($id_siswa);
            $total_alfa = $this->LaporanService->ambil_total_alfa($id_siswa);
            $total_nilai = $this->LaporanService->ambil_total_nilai($id_siswa);
            $kalkulasi = $this->LaporanService->ambil_kalkulasi_nilai($id_siswa);
            $catatan = $this->LaporanService->ambil_catatan($id_siswa);
            
            return view('admin/laporan/siswa/laporan_siswa',[
                'kelas' => $kelas,
                'siswa' => $siswa,
                'total_hadir' => $total_hadir,
                'total_sakit' => $total_sakit,
                'total_izin' => $total_izin,
                'total_alfa' => $total_alfa,
                'total_nilai' => $total_nilai,
                'kalkulasi' => $kalkulasi,
                'catatan' => $catatan
            ]);
        }
        catch (DivisionByZeroError)
        {
            return redirect()->to(url_to('LaporanController::lihat_kelas',$id_kelas))
                ->with('error', 'Penilaian siswa <b>belum pernah diisi</b> sehingga Laporan tidak bisa dibuat.');
        }
    }
    
    /**
     * @throws MpdfException
     */
    public function cetak(): ResponseInterface
    {
        $kehadiran = $this->request->getVar('kehadiran');
        $penilaian = $this->request->getVar('penilaian');
        $id_siswa = $this->request->getPost('id_siswa');
        $id_kelas = $this->request->getPost('id_kelas');
        
        $kelas = $this->LaporanService->ambil_detail_kelas($id_kelas);
        $siswa = $this->LaporanService->ambil_detail_siswa($id_siswa);
        $total_hadir = $this->LaporanService->ambil_total_hadir($id_siswa);
        $total_sakit = $this->LaporanService->ambil_total_sakit($id_siswa);
        $total_izin = $this->LaporanService->ambil_total_izin($id_siswa);
        $total_alfa = $this->LaporanService->ambil_total_alfa($id_siswa);
        $total_nilai = $this->LaporanService->ambil_total_nilai($id_siswa);
        $kalkulasi = $this->LaporanService->ambil_kalkulasi_nilai($id_siswa);
        $catatan = $this->LaporanService->ambil_catatan($id_siswa);
        $komponen = $this->LaporanService->ambil_komponen();
        $nilai = $this->LaporanService->ambil_nilai($id_siswa);
        
        $html = view('admin/laporan/siswa/laporan_cetak', [
            'kehadiran' => $kehadiran,
            'penilaian' => $penilaian,
            'kelas' => $kelas,
            'siswa' => $siswa,
            'total_hadir' => $total_hadir,
            'total_sakit' => $total_sakit,
            'total_izin' => $total_izin,
            'total_alfa' => $total_alfa,
            'total_nilai' => $total_nilai,
            'kalkulasi' => $kalkulasi,
            'catatan' => $catatan,
            'komponen' => $komponen,
            'nilai' => $nilai
        ]);
        
        // BUAT FILE PDF
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210,297]]);
        $mpdf->SetFont('Poppins');
        $mpdf->SetTitle('Laporan - ' . $siswa->nama_siswa);
        $mpdf->SetHeader('Laporan Kemajuan Siswa||Siatama Privat');
        $mpdf->SetFooter($siswa->nama_siswa . '||Halaman {PAGENO} dari {nb}');
        $mpdf->SetDefaultBodyCSS('font-family', 'Poppins, sans-serif');
        $mpdf->SetDefaultBodyCSS('font-size', '1rem');
        $mpdf->WriteHTML($html);
        
        $mpdf->Output("Laporan Siswa - " . $siswa->nama_siswa . ".pdf", "D");
        return response()->setHeader('Content-Type', 'application/pdf');
    }
    
    public function daftar_tentor(): string
    {
        $tentor = $this->LaporanService->ambil_daftar_tentor();
        
        return view('admin/laporan/tentor/daftar_tentor',[
            'tentor' => $tentor
        ]);
    }
    
    public function laporan_tentor(int $id_tentor): string
    {
        $tentor = $this->LaporanService->ambil_detail_tentor($id_tentor);
        $waktu = $this->LaporanService->ambil_waktu_mengajar($id_tentor);
        
        return view('admin/laporan/tentor/laporan_tentor',[
            'tentor' => $tentor,
            'waktu' => $waktu
        ]);
    }
}
