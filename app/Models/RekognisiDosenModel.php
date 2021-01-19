<?php

namespace App\Models;

use CodeIgniter\Model;

class RekognisiDosenModel extends Model
{
    protected $table = 'rekognisi_dosen';
    protected $primaryKey = 'id_rekognisi';
    protected $useTimestamps = false;
    protected $allowedFields = ['id', 'id_dosen', 'id_tahun', 'id_jenis', 'keterangan_recognisi'];

    public function getInsertedId()
    {
        $db = \Config\Database::connect();
        return $db->insertID();
    }
}
