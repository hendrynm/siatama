<?php

namespace App\Cells;

use App\Services\AdminService;
use CodeIgniter\View\Cells\Cell;

class NamaAkunCell extends Cell
{
    public AdminService $AdminService;
    
    public function render(): string
    {
        $this->AdminService = new AdminService();
        return $this->AdminService->ambil_data_akun()->nama_pengajar;
    }
}
