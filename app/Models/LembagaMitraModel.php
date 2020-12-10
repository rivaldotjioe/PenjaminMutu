<?php

namespace App\Models;

use CodeIgniter\Model;

class LembagaMitraModel extends Model
{
    protected $table = 'lembagamitra';
    protected $primaryKey = 'id_lembagamitra';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nama_lembaga'];
}
