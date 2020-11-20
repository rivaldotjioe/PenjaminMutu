<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanKerjasamaModel extends Model
{
    protected $table = 'kegiatan_kerjasama';
    protected $primaryKey = 'id_kegiatankerjasama';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_lembagamitra', 'nama_kegiatan', 'tingkat', 'manfaat_kerjasama', 'tahun_kerjasama', 'tahun_berakhir'];
}
