<?php

namespace App\Models;

use CodeIgniter\Model;

class LivePresensi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'live_presensi';
    protected $primaryKey       = 'id_presensi';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
