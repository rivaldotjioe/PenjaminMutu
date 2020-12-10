<?php

namespace App\Models;

use CodeIgniter\Model;

class RekognisiDosenModels extends Model
{

    protected $table = 'rekognisi_dosen';
    protected $primaryKey = 'id_rekognisi';
    protected $useTimestamps = false;
    protected $allowedFields = ['id', 'id_tahun', 'id_jenis', 'keterangan_recognisi'];
}
