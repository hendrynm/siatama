<?php

namespace App\Models;

use CodeIgniter\Model;

class LiveJadwal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'live_jadwal';
    protected $primaryKey       = 'id_jadwal';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
