<?php

namespace App\Controllers;

class SemesterController extends BaseController
{
    public function index(): string
    {
        return view('admin/semester/index');
    }
}
