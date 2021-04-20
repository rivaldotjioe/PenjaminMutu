<?php


namespace App\Controllers;
use App\Models\MasterDosenModel;
use ArrayIterator;
use GScholarProfileParser\DomCrawler\ProfilePageCrawler;
use GScholarProfileParser\Iterator\PublicationYearFilterIterator;
use GScholarProfileParser\Parser\PublicationParser;
use GScholarProfileParser\Entity\Publication;
use Goutte\Client;
use GScholarProfileParser\Entity\Statistics;
use GScholarProfileParser\Parser\StatisticsParser;

class GoogleScholar extends BaseController
{
    protected $masterDosenModel;
    public function __construct()
    {
        $this->masterDosenModel = new MasterDosenModel();
    }

    public function getNbCitationDosen(){
        echo shell_exec("python '.APPPATH.'Controllers\getdosencitationperyear.py '-r-LdjQAAAAJ'");
    }

    public function inputIdScholar(){
        $data =  [
            'validation' => \Config\Services::validation()
        ];
        echo view('/dashboard');
        return view('/default/scholar', $data);
    }

    public function dataScholar(){
        $idgs = $this->masterDosenModel->getIdGs('18082010026');
        $client = new Client();
        $crawler = new ProfilePageCrawler($client,  $idgs['idgs']);
        $parser = new PublicationParser($crawler->getCrawler());
        $publications = $parser->parse();
        $data = [
            'datascholar' => $publications,
          'validation'  =>  \Config\Services::validation()
        ];
        echo view('/dashboard');
        return view('/default/datascholar', $data);
    }

    private function readXlsx($file){
        if (  $xlsx = \SimpleXLSX::parse($file)){
//            dd($xlsx->rows());
            $rows = $xlsx->rows();
            return $rows;
        } else {
            echo \SimpleXLSX::parseError();
            return null;
        }
    }

    public function save(){
        $insert = false;
        if (!is_null($this->request->getVar('idscholar'))) {
            $file = $this->request->getFile('filescholar');
            if (!$file->isvalid()) {
                throw new \RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
            }
            $datarows = $this->readXlsx($file);
            if (!is_null($datarows)) {
                for ($i = 0; $i<count($datarows); $i++){
                    $data = [
                        'id_dosen' => (string)$datarows[$i][0],
                        'idgs'=> $datarows[$i][1]
                    ];
                   $insert = $this->masterDosenModel->save($data);
            }
        } else {
                session()->setflashdata('error', 'Gagal Membaca File');
                return redirect()->to('/inputidscholar');
            }
        } else {
            // input 1 id saja
        }
        if ($insert) {
            session()->setFlashdata('success', 'Data Id Google Scholar Berhasil Ditambahkan');
            return redirect()->to('/inputidscholar');
            unset($_POST);
        } else {
            session()->setflashdata('error', 'Data Id Google Scholar Gagal Ditambahkan');
            return redirect()->to('/inputidscholar');
        }

    }

}