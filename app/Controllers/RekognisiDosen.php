<?php

namespace App\Controllers;

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

    public function __construct()
    {
        $this->tingkatModel = new TingkatModel();
        $this->masterTahunModel = new MasterTahunModel();
        $this->rekognisiDosenModel = new RekognisiDosenModel();
        $this->buktiRekognisiModel = new BuktiRekognisiModel();
        $this->jenisRekognisiModel = new JenisRekognisiModel();
    }
    public function index()
    {
        $tingkat = $this->tingkatModel->findAll();
        $tahun = $this->masterTahunModel->getYear();
        $data = [
            'tingkat' => $tingkat,
            'tahun' => $tahun,
            'validation' => \Config\Services::validation()
        ];
        return view('/default/rekognisi', $data);
    }

    public function dataRekognisiDosen()
    {
        $datarekognisi = $this->rekognisiDosenModel->getData();
        $data = [
            'datarekognisi' => $datarekognisi
        ];
        return view('/default/datarekognisi', $data);
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
            'buktirekognisi' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            // session()->setFlashdata('error', $validation['errors']);
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
}
