<?php

namespace App\Models;

use CodeIgniter\Model;

class LembagaMitraModel extends Model
{
    protected $table = 'lembagamitra';
    protected $primaryKey = 'id_lembagamitra';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_lembaga', 'deleted'];
}
