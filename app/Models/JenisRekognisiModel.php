<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisRekognisiModel extends Model
{
    protected $table = 'jenis_recognisi';
    protected $primaryKey = 'id_jenis';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'keterangan_recognisi',
        'nama_recognisi'
    ];
    public function getInsertedId()
    {
        $db = \Config\Database::connect();
        return $db->insertID();
    }
}
