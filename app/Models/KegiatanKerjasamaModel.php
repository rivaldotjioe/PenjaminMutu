<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanKerjasamaModel extends Model
{
    protected $table = 'kegiatan_kerjasama';
    protected $primaryKey = 'id_kegiatankerjasama';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_lembagamitra',
        'id_fakultas',
        'nama_kegiatan',
        'tingkat',
        'manfaat_kerjasama',
        'durasi_kerjasama',
        'bukti_kerjasama',
        'tahun_kerjasama',
        'tahun_berakhir'
    ];

    public function getData()
    {
        return $this->db->table($this->table)
            ->join('lembagamitra', 'lembagamitra.id_lembagamitra = kegiatan_kerjasama.id_lembagamitra')
            ->get()->getResultArray();
    }
}
