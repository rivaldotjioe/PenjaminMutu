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

//        if ($loginstate){
//
//        }else {
//            redirect()->to('/login');
//
//        }
        $this->lembagaMitraModel = new LembagaMitraModel();
        $this->kegiatanKerjasama = new KegiatanKerjasamaModel();
        $this->tingkatModel = new TingkatModel();
        $this->masterTahunModel = new MasterTahunModel();

    }

    public function index()
    {
        $lembaga = $this->lembagaMitraModel->findAll();
        $tingkat = $this->tingkatModel->findAll();
        $tahun = $this->masterTahunModel->getYear();
        $data = [
            'lembagamitra' => $lembaga,
            'tingkat' => $tingkat,
            'tahun' => $tahun,
            'validation' => \Config\Services::validation()
        ];
        echo view('dashboard');
        echo view('/default/mitra', $data);
    }

    public function datakerjasama()
    {
        $datakerjasamamitra = $this->kegiatanKerjasama->getData();
        $data = [
            'kerjasamamitra' => $datakerjasamamitra
        ];
        echo view('dashboard');
        echo view('/default/datamitra', $data);
    }

    public function readtest()
    {
        $lembaga = $this->lembagaMitraModel->findAll();
        dd($lembaga);

    }

    public function test()
    {
        $tahun = $this->masterTahunModel->getYear();
        dd($tahun);
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

    public function delete($id){
        $this->kegiatanKerjasama->delete($id);
        session()->setFlashdata('success', 'Data Berhasil Di Hapus');
        return redirect()->to('/mitradata');
    }

    public function saveLembaga()
    {
        $insert = $this->lembagaMitraModel->save([
            'nama_lembaga' => $this->request->getVar('tambah_namamitra')
        ]);

        if ($insert) {
            session()->setFlashdata('success', 'Lembaga Berhasil Ditambahkan');
            return redirect()->to('/mitra');
        } else {
            echo $this->session->flashdata('error', 'Lembaga Gagal Ditambahakan');
            return redirect()->to('/mitra');
        }
    }

    public function save()
    {
        if (!$this->validate([
            'lembagamitra' => 'required',
            'namakegiatan' => 'required',
            'tingkat' => 'required',
            'tahunmulai' => 'required',
            'tahunberakhir' => 'required',
            'manfaat' => 'required',
            'buktikerjasama' => 'uploaded[buktikerjasama]'
        ])) {
            $validation = \Config\Services::validation();
            session()->setflashdata('error', 'Data Kerjasama Mitra Gagal Ditambahkan');
            return redirect()->to('/mitra')->withInput()->with('validation', $validation);
        }
        // $resultlembagamitra = $this->lembagaMitraModel->where('nama_lembaga', $this->request->getVar('nama_lembaga'))->first();
        $durasi = (int)$this->request->getVar('tahunberakhir') - (int)$this->request->getVar('tahunmulai');
        $file = $this->request->getFile('buktikerjasama');
        if (!$file->isvalid()) {
            throw new \RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
        }
        $bukti = $file->getRandomName();
        $file->move('buktikerjasama', $bukti);

        $insert = $this->kegiatanKerjasama->save([
            'id_lembagamitra' => $this->request->getVar('lembagamitra'),
            'nama_kegiatan' => $this->request->getVar('namakegiatan'),
            'tingkat' => $this->request->getVar('tingkat'),
            'manfaat_kerjasama' => $this->request->getVar('manfaat'),
            'durasi_kerjasama' => $durasi,
            'tahun_berakhir' => $this->request->getVar('tahunberakhir'),
            'tahun_kerjasama' => $this->request->getVar('tahunmulai'),
            'bukti_kerjasama' => $bukti
        ]);
        if ($insert) {
            session()->setFlashdata('success', 'Data Kerjasama Mitra Berhasil Ditambahkan');
            return redirect()->to('/mitra');
            unset($_POST);
        } else {
            session()->setflashdata('error', 'Data Kerjasama Mitra Gagal Ditambahkan');
            return redirect()->to('/mitra');
        }
    }

    public function edit($id) {
        $lembaga = $this->lembagaMitraModel->findAll();
        $tingkat = $this->tingkatModel->findAll();
        $tahun = $this->masterTahunModel->getYear();
        $data = [
            'lembagamitra' => $lembaga,
            'tingkat' => $tingkat,
            'tahun' => $tahun,
            'validation' => \Config\Services::validation(),
            'kerjasama' => $this->kegiatanKerjasama->find($id)
        ];


        echo view('/default/mitraedit', $data);
        return view('dashboard');
    }

    public function update($id){
        $update = false;
        $durasi = (int)$this->request->getVar('tahunberakhir') - (int)$this->request->getVar('tahunmulai');
        $file = $this->request->getFile('buktikerjasama');
        if ($file->getSize()==0){
            $update = $this->kegiatanKerjasama->save([
                'id_kegiatankerjasama' => $id,
                'id_lembagamitra' => $this->request->getVar('lembagamitra'),
                'nama_kegiatan' => $this->request->getVar('namakegiatan'),
                'tingkat' => $this->request->getVar('tingkat'),
                'manfaat_kerjasama' => $this->request->getVar('manfaat'),
                'durasi_kerjasama' => $durasi,
                'tahun_berakhir' => $this->request->getVar('tahunberakhir'),
                'tahun_kerjasama' => $this->request->getVar('tahunmulai')
            ]);
        } else {
            $bukti = $file->getRandomName();
            $file->move('buktikerjasama', $bukti);
            $update = $this->kegiatanKerjasama->save([
                'id_kegiatankerjasama' => $id,
                'id_lembagamitra' => $this->request->getVar('lembagamitra'),
                'nama_kegiatan' => $this->request->getVar('namakegiatan'),
                'tingkat' => $this->request->getVar('tingkat'),
                'manfaat_kerjasama' => $this->request->getVar('manfaat'),
                'durasi_kerjasama' => $durasi,
                'tahun_berakhir' => $this->request->getVar('tahunberakhir'),
                'tahun_kerjasama' => $this->request->getVar('tahunmulai'),
                'bukti_kerjasama' => $bukti
            ]);
        }
        if ($update) {
            session()->setFlashdata('success', 'Data Kerjasama Mitra Berhasil Diupdate');
            return redirect()->to('/mitra');
            unset($_POST);
        } else {
            session()->setflashdata('error', 'Data Kerjasama Mitra Gagal Diupdate');
            return redirect()->to('/mitra/edit'.$id);
        }
    }
}
