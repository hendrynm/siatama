<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryPengajar extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'history_pengajar';
    protected $primaryKey       = 'id_history_pengajar';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}