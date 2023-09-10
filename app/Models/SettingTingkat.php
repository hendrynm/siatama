<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingTingkat extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'setting_tingkat';
    protected $primaryKey       = 'id_tingkat';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
