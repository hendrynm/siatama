<?php

namespace App\Models;

use CodeIgniter\Model;

class LivePengajar extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'live_pengajar';
    protected $primaryKey       = 'id_pengajar';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
