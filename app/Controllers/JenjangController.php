<?php

namespace App\Controllers;

class JenjangController extends BaseController
{
    public function index(): string
    {
        return view('admin/jenjang/index');
    }
}
