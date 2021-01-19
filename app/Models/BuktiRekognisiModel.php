<?php

namespace App\Models;

use CodeIgniter\Model;

class BuktiRekognisiModel extends Model
{
    protected $table = 'bukti_rekognisi';
    protected $primaryKey = 'id_buktirekognisi';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_rekognisi',
        'bukti'
    ];
}
