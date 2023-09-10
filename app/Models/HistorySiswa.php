<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorySiswa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'history_siswa';
    protected $primaryKey       = 'id_history_siswa';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
