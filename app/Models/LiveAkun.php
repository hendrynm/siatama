<?php

namespace App\Models;

use CodeIgniter\Model;

class LiveAkun extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'live_akun';
    protected $primaryKey       = 'id_akun';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
