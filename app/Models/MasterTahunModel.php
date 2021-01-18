<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class MasterTahunModel extends Model
{
    protected $table = 'master_tahun';
    protected $primaryKey = 'id_tahun';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_tahun'];

    public function getYear()
    {
        $db = \Config\Database::connect();
        $time = Time::now();
        $year = $time->getYear();
        $query = $db->query("select id_tahun from master_tahun where id_tahun >= $year limit 5");
        return $query->getResultarray();
    }
}
