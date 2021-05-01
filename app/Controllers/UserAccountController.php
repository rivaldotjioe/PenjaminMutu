<?php


namespace App\Controllers;


use App\Models\MasterDosenModel;
use App\Models\UserModel;

class UserAccountController extends BaseController
{
    protected $userModel;
    protected $dosenModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dosenModel = new MasterDosenModel();
    }

    public function index(){
        $dosen = $this->dosenModel->findAll();
        $data = [
            'dosen' => $dosen,
            'validation' => \Config\Services::validation()
        ];
        echo view('/default/akun', $data);
        return view('dashboard');
    }

    public function createAccount(){

        if (!$this->validate([
            'id_dosen' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'user_level' => 'required'
        ])){
            $validation = \Config\Services::validation();
            session()->setFlashdata('error', 'Akun Gagal Di Tambahkan');
            return redirect()->to('/akun')->withInput()->with('validation', $validation);
        }
        $id_dosen = $this->request->getVar('id_dosen');
        $password = password_hash($this->request->getVar('password'),PASSWORD_DEFAULT);
        $insertUser = $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'id_dosen_fk' => $this->request->getVar('id_dosen'),
            'user_level' => $this->request->getVar('user_level')
        ]);

        if ($insertUser) {
            session()->setFlashdata('success', 'Akun Berhasil Di Buat');
            return redirect()->to('/akun');
            unset($_POST);
        } else {
            session()->setflashdata('error', 'Akun Gagal Di Buat');
            return redirect()->to('/akun');
        }
    }
}