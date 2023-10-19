<?php

namespace App\Models;

use CodeIgniter\Model;

class LivePembayaran extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'live_pembayaran';
    protected $primaryKey       = 'id_pembayaran';
    protected $returnType       = 'object';
    protected $protectFields    = false;
}
