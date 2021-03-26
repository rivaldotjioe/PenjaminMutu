<?php


namespace App\Models;


class MasterJurusanModel extends \CodeIgniter\Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_jurusan',
        'nama_dosen',
        'bidang_keahlian'
    ];

}