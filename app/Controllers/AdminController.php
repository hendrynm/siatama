<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function masuk(): string
    {
        return view('publik/masuk/index');
    }
    
    public function index(): string
    {
        return view('admin/beranda/index');
    }
}
