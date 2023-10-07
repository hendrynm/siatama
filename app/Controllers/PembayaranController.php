<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PembayaranController extends BaseController
{
    public function index()
    {
        return view('admin/pembayaran/index');
    }
}
