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
            ->join('jenis_recognisi', 'jenis_recognisi.id_jenis = rekognisi_dosen.id_jenis')
            ->join('tingkat', 'tingkat.id_tingkat = rekognisi_dosen.id_tingkat')
            ->join('master_tahun', 'master_tahun.id_tahun = rekognisi_dosen.id_tahun')
            ->join('bukti_rekognisi', 'bukti_rekognisi.id_rekognisi = rekognisi_dosen.id_rekognisi')
            ->get()->getResultArray();
    }
}
