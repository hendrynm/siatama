<?php

namespace App\Controllers;

class TentorController extends BaseController
{
    public function index(): string
    {
        return view('admin/mentor/index');
    }
    
    public function mentor_aktif(): string
    {
        return view('admin/mentor/mentor_aktif');
    }
    
    public function mentor_nonaktif(): string
    {
        return view('admin/mentor/mentor_nonaktif');
    }
    
    public function tambah_mentor(): string
    {
        return view('admin/mentor/tambah_mentor');
    }
    
    public function ubah_mentor(): string
    {
        return view('admin/mentor/ubah_mentor');
    }
    
    public function hapus_mentor(): string
    {
        return view('admin/mentor/hapus_mentor');
    }
    
    public function arsip_mentor(): string
    {
        return view('admin/mentor/arsip_mentor');
    }
}
