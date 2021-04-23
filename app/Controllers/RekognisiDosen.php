<?php

namespace App\Controllers;

use App\Models\MasterDosenModel;
use App\Models\RekognisiDosenModel;
use App\Models\TingkatModel;
use App\Models\MasterTahunModel;
use App\Models\BuktiRekognisiModel;
use App\Models\JenisRekognisiModel;

class RekognisiDosen extends BaseController
{
    protected $tingkatModel;
    protected $masterTahunModel;
    protected $rekognisiDosenModel;
    protected $buktiRekognisiModel;
    protected $jenisRekognisiModel;
    protected $masterDosenModel;

    public function __construct()
    {
        helper(['my_helper']);
        if (checkLogin()){
        } else {
            redirect()->to('/login');
        }
        $this->tingkatModel = new TingkatModel();
        $this->masterTahunModel = new MasterTahunModel();
        $this->rekognisiDosenModel = new RekognisiDosenModel();
        $this->buktiRekognisiModel = new BuktiRekognisiModel();
        $this->jenisRekognisiModel = new JenisRekognisiModel();
        $this->masterDosenModel = new MasterDosenModel();
    }
    public function index()
    {
//        helper(['my_helper']);
//        if (checkLogin()){
//        } else {
//            redirect()->to('/login');
//        }
        $tingkat = $this->tingkatModel->findAll();
        $tahun = $this->masterTahunModel->getYear();
        $dosen = $this->masterDosenModel->findAll();
        $data = [
            'tingkat' => $tingkat,
            'tahun' => $tahun,
            'dosen' => $dosen,
            'validation' => \Config\Services::validation()
        ];
        echo view('dashboard');
        echo view('/default/rekognisi', $data);
    }

    public function dataRekognisiDosen()
    {
        $datarekognisi = $this->rekognisiDosenModel->getData();
        //buat kolom baru untuk nama dosen ke array
        for($i = 0; $i < count($datarekognisi); $i++) {
            $dosenid = $this->masterDosenModel->getDosenName($datarekognisi[$i]['id_dosen']);
            $datarekognisi[$i]['nama_dosen'] = $dosenid['nama_dosen'];
        }
        $data = [
            'datarekognisi' => $datarekognisi
        ];
        echo view('dashboard');
        echo view('/default/datarekognisi', $data);
    }

    public function test()
    {
        $insertJenis = $this->jenisRekognisiModel->save([
            'keterangan_recognisi' => 'coba',
            'nama_recognisi' => 'coba'
        ]);
        $idjenisrekognisi = $this->jenisRekognisiModel->getInsertedId();
        dd($idjenisrekognisi);
    }


    public function save()
    {

        if (!$this->validate([
            'id_dosen' => 'required',
            'bidangkeahlian' => 'required',
            'namarekognisi' => 'required',
            'tingkat' => 'required',
            'id_tahun' => 'required',
            'keterangan' => 'required',
            'buktirekognisi' => 'uploaded[buktirekognisi]'
        ])) {
            $validation = \Config\Services::validation();
            session()->setflashdata('error', 'Data Rekognisi Dosen Gagal Ditambahkan');
            return redirect()->to('/rekognisidosen')->withInput()->with('validation', $validation);
        }

        $file = $this->request->getFile('buktirekognisi');
        $bukti = $file->getRandomName();
        $file->move('buktirekognisi', $bukti);
        //insert
        $insertJenis = $this->jenisRekognisiModel->save([
            'keterangan_recognisi' => $this->request->getVar('keterangan'),
            'nama_recognisi' => $this->request->getVar('namarekognisi')
        ]);
        $idjenisrekognisi = $this->jenisRekognisiModel->getInsertedId();
        $insertRekognisi = $this->rekognisiDosenModel->save([
            'id_dosen' => $this->request->getVar('id_dosen'),
            'id_tingkat' => $this->request->getVar('tingkat'),
            'id_tahun' => $this->request->getVar('id_tahun'),
            'id_jenis' => $idjenisrekognisi,
            'keterangan_recognisi' => $this->request->getVar('keterangan')
        ]);
        $idRekognisi = $this->rekognisiDosenModel->getInsertedId();
        $inserBuktiRekognisi = $this->buktiRekognisiModel->save([
            'id_rekognisi' => $idRekognisi,
            'bukti' => $bukti
        ]);

        if ($insertJenis && $insertRekognisi && $inserBuktiRekognisi) {
            session()->setFlashdata('success', 'Data Rekognisi Dosen Berhasil Ditambahkan');
            return redirect()->to('/rekognisidosen');
            unset($_POST);
        } else {
            session()->setflashdata('error', 'Data Rekognisi Dosen Gagal Ditambahkan');
            return redirect()->to('/rekognisidosen');
        }
    }

    public function delete($id) {
        $this->rekognisiDosenModel->delete($id);

        return redirect()->to('/rekognisidosendata');
    }

    public function edit($id) {
        $tingkat = $this->tingkatModel->findAll();
        $tahun = $this->masterTahunModel->getYear();
        $data = [
            'tingkat' => $tingkat,
            'tahun' => $tahun,
            'validation' => \Config\Services::validation(),
            'rekognisi' => $this->rekognisiDosenModel->getPieceData($id)[0]
        ];

        echo view('/default/rekognisiedit', $data);
        return view('dashboard');
    }
}
