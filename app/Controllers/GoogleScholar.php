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
        return view('/default/datascholar', $data);
    }
}