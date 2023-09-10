<?php

namespace App\Models;

use CodeIgniter\Model;

class LiveSiswa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'live_siswa';
    protected $primaryKey       = 'id_siswa';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
