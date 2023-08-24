<?php

namespace App\Controllers;

class RaporController extends BaseController
{
    public function index(): string
    {
        return view('admin/rapor/index');
    }
}
