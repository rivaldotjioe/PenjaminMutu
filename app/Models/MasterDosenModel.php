<?php


namespace App\Models;


use CodeIgniter\Model;

class MasterDosenModel extends Model
{
    protected $DBGroup = 'helper';
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_jurusan',
        'nama_dosen',
        'bidang_keahlian',
        'idgs'
    ];

    public function getDosenName($id_dosen){
        return $this->db->table($this->table)
            ->select('nama_dosen')
            ->where('id_dosen', $id_dosen)
            ->get()->getRowArray();
    }

    public function getDosenBidang($id_dosen){
        return $this->db->table($this->table)
            ->select('bidang_keahlian')
            ->where('id_dosen', $id_dosen)
            ->get()->getRowArray();
    }

    public function getIdGs($id_dosen){
        return $this->db->table($this->table)
            ->select('idgs')
            ->where('id_dosen', $id_dosen)
            ->get()->getRowArray();
    }

}