<?php

namespace App\Models;

use CodeIgniter\Model;

class RekognisiDosenModel extends Model
{
    protected $table = 'rekognisi_dosen';
    protected $primaryKey = 'id_rekognisi';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_tingkat', 'id_dosen', 'id_tahun', 'id_jenis', 'keterangan_recognisi'];

    public function getInsertedId()
    {
        $db = \Config\Database::connect();
        return $db->insertID();
    }
    public function getData()
    {
        return $this->db->table($this->table)
            ->join('lembagamitra', 'lembagamitra.id_lembagamitra = kegiatan_kerjasama.id_lembagamitra')
            ->get()->getResultArray();
    }
}
