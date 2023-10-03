<?php

namespace App\Models;

use CodeIgniter\Model;

class LivePenilaian extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'live_penilaian';
    protected $primaryKey       = 'id_penilaian';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
