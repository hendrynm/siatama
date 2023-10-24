<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingSemester extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'setting_semester';
    protected $primaryKey       = 'id_semester';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
