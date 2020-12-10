<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterTahunModel extends Model
{

    protected $table = 'master_tahun';
    protected $primaryKey = 'id_tahun';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_tahun', 'tahun'];
}
