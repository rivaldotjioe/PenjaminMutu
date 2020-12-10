<?php 

namespace App\Models;

use CodeIgniter\Model;

class TingkatModel extends Model
{
    protected $table = 'tingkat';
    protected $primaryKey = 'id_tingkat';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['keterangan'];
}
?>