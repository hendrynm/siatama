<?php

namespace App\Controllers;

class MentorController extends BaseController
{
    public function daftar_mentor_aktif(): string
    {
        return view('admin/mentor/daftar_mentor_aktif');
    }
}
