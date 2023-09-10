<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingPaket extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'setting_paket';
    protected $primaryKey       = 'id_paket';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
