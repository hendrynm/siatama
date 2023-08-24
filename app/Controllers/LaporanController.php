<?php

namespace App\Controllers;

class LaporanController extends BaseController
{
    public function index(): string
    {
        return view('admin/laporan/index');
    }
    
    public function pilih_kelas(): string
    {
        return view('admin/laporan/pilih_kelas');
    }
    
    public function laporan_siswa(): string
    {
        return view('admin/laporan/laporan_siswa');
    }
    
    public function cetak()
    {
        $data['kehadiran'] = $this->request->getVar('kehadiran');
        $data['penilaian'] = $this->request->getVar('penilaian');
        $html = view('admin/laporan/laporan_cetak', $data);
        
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210,297]]);
        $mpdf->SetFont('Poppins');
        $mpdf->SetTitle('Laporan - Hendry Naufal Marbella');
        $mpdf->SetHeader('Laporan Kemajuan Siswa||Siatama Privat');
        $mpdf->SetFooter('Hendry Naufal Marbella|Dicetak pada: {DATE d/m/Y H:i:s}|Halaman {PAGENO} dari {nb}');
        $mpdf->SetDefaultBodyCSS('font-family', 'Poppins, sans-serif');
        $mpdf->SetDefaultBodyCSS('font-size', '1rem');
        $mpdf->WriteHTML($html);
        
        return redirect()->to($mpdf->Output("Laporan Siswa - Hendry Naufal Marbella.pdf", "I"));
    }
}
