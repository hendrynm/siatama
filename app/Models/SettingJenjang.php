<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingJenjang extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'setting_jenjang';
    protected $primaryKey       = 'id_jenjang';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
