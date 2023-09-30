<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingSkor extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'setting_skor';
    protected $primaryKey       = 'id_skor';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
