<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingNilai extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'setting_nilai';
    protected $primaryKey       = 'id_nilai';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
