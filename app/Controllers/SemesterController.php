<?php

namespace App\Controllers;

use App\Services\SemesterService;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\RedirectResponse;

class SemesterController extends BaseController
{
    private SemesterService $SemesterService;
    
    public function __construct()
    {
        $this->SemesterService = new SemesterService();
    }
    
    public function index(): string
    {
        $semester = $this->SemesterService->ambil_semester_aktif();
        
        return view('admin/semester/index', [
            'semester' => $semester
        ]);
    }
    
    public function ganti(): RedirectResponse
    {
        $db = \Config\Database::connect();
        
        try
        {
            $db->transStart();
            
            $semester = $this->SemesterService->ambil_semester_aktif();
            $nama_semester = $semester->nama_semester;
            $id_semester = $semester->id_semester;
            
            $arr_nama = explode(' ', $nama_semester);
            $semester_now = $arr_nama[0];
            $tahun_now = $arr_nama[1];
            $arr_tahun = explode('/', $tahun_now);
            
            if($semester_now == 'Gasal')
            {
                $nama_baru = 'Genap';
                $tahun_baru = $tahun_now;
            }
            else
            {
                $nama_baru = 'Gasal';
                $tahun_baru = $arr_tahun[1] . '/' . intval($arr_tahun[1]) + 1;
            }
            
            $nama_semester_baru = $nama_baru . ' ' . $tahun_baru;
            
            $this->SemesterService->simpan_semester_baru($nama_semester_baru, $id_semester);
            
            ($semester_now == 'Gasal')
                ? $this->SemesterService->aksi_semester_gasal()
                : $this->SemesterService->aksi_semester_genap();
            
            $db->transComplete();
            return redirect()->to(url_to('admin.semester.index'))
                ->with('success', 'Berhasil mengganti semester baru.');
        }
        catch (DatabaseException $e)
        {
            $db->transRollback();
            return redirect()->to(url_to('admin.semester.index'))
                ->with('error', $e->getMessage());
        }
    }
}
