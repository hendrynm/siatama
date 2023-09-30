<?php

namespace App\Models;

use CodeIgniter\Model;

class LiveKelas extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'live_kelas';
    protected $primaryKey       = 'id_kelas';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
