<?php

namespace App\Controllers;

use App\Models\LembagaMitraModel;
use App\Models\KegiatanKerjasamaModel;
use App\Models\TingkatModel;
use App\Models\MasterTahunModel;

class Mitra extends BaseController
{
    protected $lembagaMitraModel;
    protected $kegiatanKerjasama;
    protected $tingkatModel;
    protected $masterTahunModel;

    public function __construct()
    {
        $this->lembagaMitraModel = new LembagaMitraModel();
        $this->kegiatanKerjasama = new KegiatanKerjasamaModel();
        $this->tingkatModel = new TingkatModel();
        $this->masterTahunModel = new MasterTahunModel();
    }

    public function index()
    {
        $lembaga = $this->lembagaMitraModel->findAll();
        $tingkat = $this->tingkatModel->findAll();
        $tahun = $this->masterTahunModel->findAll();
        $data = [
            'lembagamitra' => $lembaga,
            'tingkat' => $tingkat,
            'tahun' => $tahun
        ];
        return view('/default/mitra', $data);
    }



    public function readtest()
    {
        $lembaga = $this->lembagaMitraModel->findAll();
        dd($lembaga);
    }

    public function test()
    {
        $db = \Config\Database::connect();
        $data = $db->query("insert into lembagamitra (id_lembagamitra,nama_lembaga) values (nextval('increment_default'),'Tokopedia')");
        dd($data);
    }

    public function insertlembagatest()
    {
        $insert = $this->lembagaMitraModel->save([
            'nama_lembaga' => "Dicoding"
        ]);
    }

    public function inserttest()
    {


        $this->kegiatanKerjasama->save([
            'id_lembagamitra' => 1,
            'nama_kegiatan' => 'gk eroh jenenge',
            'tingkat' => "Nasional",
            'manfaat_kerjasama' => "gak tau",
            'durasi_kerjasama' => 2,
            'bukti_kerjasama' => 'File e embo nang endi',
            'tahun_berakhir' => '2019',
            'tahun_kerjasama' => '2022'
        ]);
    }

    public function info()
    {
        phpinfo();
    }

    public function saveLembaga()
    {
        $insert = $this->lembagaMitraModel->save([
            'nama_lembaga' => $this->request->getVar('tambah_namamitra')
        ]);
        echo $insert;
        if ($insert) {
            session()->setFlashdata('success', 'Lembaga Berhasil Ditambahkan');
            return redirect()->to('/mitra');
        } else {
            echo $this->session->flashdata('error', 'Lembaga Gagal Ditambahakn');
            return redirect()->to('/mitra');
        }
    }

    public function save()
    {


        $resultlembagamitra = $this->lembagaMitraModel->where('nama_lembaga', $this->request->getVar('nama_lembaga'))->first();
        $durasi = (int)$this->request->getVar('tahun_berakhir') - (int)$this->request->getVar('tahun');

        $this->kegiatanKerjasama->save([
            'id_lembagamitra' => $resultlembagamitra['id_lembagamitra'],
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'tingkat' => $this->request->getVar('tingkat'),
            'manfaat_kerjasama' => $this->request->getVar('manfaat_kerjasama'),
            'durasi_kerjasama' => $durasi,
            'tahun_berakhir' => $this->request->getVar('tahun_berakhir'),
            'tahun_kerjasama' => $this->request->getVar('tahun'),
            'deleted' => false
        ]);
    }
}
