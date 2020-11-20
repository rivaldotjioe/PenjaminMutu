<?php

namespace App\Controllers;

use App\Models\LembagaMitraModel;
use App\Models\KegiatanKerjasamaModel;

class Mitra extends BaseController
{
    protected $lembagaMitraModel;
    protected $kegiatanKerjasama;

    public function __construct()
    {
        $this->lembagaMitraModel = new LembagaMitraModel();
        $this->kegiatanKerjasama = new KegiatanKerjasamaModel();
    }

    public function index()
    {
        return view('mitra_layout');
    }

    public function save()
    {
        $this->lembagaMitraModel->save([
            'nama_lembaga' => $this->request->getVar('nama_lembaga'),
            'deleted' => false
        ]);

        $id_lembagamitra = $this->lembagaMitraModel->where('namalembaga', $this->request->getVar('nama_lembaga'));

        $this->kegiatanKerjasama->save([
            'id_lembagamitra' => $id_lembagamitra,
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'tingkat' => $this->request->getVar('tingkat'),
            'manfaat_kerjasama' => $this->request->getVar('manfaat_kerjasama'),
            'tahun_berakhir' => $this->request->getVar('tahun_berakhir'),
            'tahun_kerjasama' => $this->request->getVar('tahun'),
            'deleted' => false
        ]);
    }
}
