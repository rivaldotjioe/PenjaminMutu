<?php


namespace App\Controllers;


class GoogleScholar extends BaseController
{
    public function getNbCitationDosen(){
        echo shell_exec("python '.APPPATH.'Controllers\getdosencitationperyear.py '-r-LdjQAAAAJ'");

    }

    public function inputIdScholar(){
        $data =  [
            'validation' => \Config\Services::validation()
        ];
        return view('/default/scholar', $data);
    }
}