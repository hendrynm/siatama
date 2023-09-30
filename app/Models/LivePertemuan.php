<?php

namespace App\Models;

use CodeIgniter\Model;

class LivePertemuan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'live_pertemuan';
    protected $primaryKey       = 'id_pertemuan';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
