<?php namespace App\Controllers;

use function Composer\Autoload\includeFile;

use GScholarProfileParser\DomCrawler\ProfilePageCrawler;
use GScholarProfileParser\Iterator\PublicationYearFilterIterator;
use GScholarProfileParser\Parser\PublicationParser;
use GScholarProfileParser\Entity\Publication;
use Goutte\Client;
class Home extends BaseController
{


	public function index()
	{
        $session = session();
        $loggedin = $session->get('logged_in');
        if ($loggedin){
            return view('dashboard');
        } else {
            return view('page-login');
        }

	}

	public function curl($url) {
        $cookie = __DIR__ . '/cookie.txt';
	    $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0');
        curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie);
        curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function parseIdGs($url){
	    $linkdosen = "";
        include APPPATH.'Libraries/simple_html_dom.php';
        $response = $this->curl($url);
        $html = new \simple_html_dom();
        $html->load($response);
        foreach ($html->find('a[class=gs_ai_pho]') as $link){
            $linkdosen =  $link->href; //link sitasi dosen
        }
        return substr(strchr($linkdosen, "user="),5);
    }

	public function testcurl(){
	    $linkdosen = "";
	    $url = "https://scholar.google.com/citations?view_op=search_authors&mauthors=eka+dyar&hl=id&oi=ao";

//        $curl = curl_init();
//        curl_setopt($curl, CURLOPT_URL, "https://scholar.google.com/citations?view_op=search_authors&mauthors=eka+dyar&hl=id&oi=ao");
//        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//         $response  = curl_exec($curl);
//         curl_close($curl);
        $response = $this->curl($url);
         $html = new \simple_html_dom();
         $html->load($response);
        foreach ($html->find('a[class=gs_ai_pho]') as $link){
                $linkdosen =  $link->href; //link sitasi dosen

        }
        $response = null;
        $link = "https://scholar.google.com".$linkdosen;
        $response = $this->curl($link);
        $htm = new \simple_html_dom();
        $htm->load($response);
        echo $htm;

    }

    public function testgs(){
        $client = new Client();
        $crawler = new ProfilePageCrawler($client,  $this->parseIdGs("https://scholar.google.com/citations?view_op=search_authors&mauthors=eka+dyar&hl=id&oi=ao"));
        $parser = new PublicationParser($crawler->getCrawler());
        $publications = $parser->parse();

// hydrates items of $publications into Publication
        foreach ($publications as &$publication) {
            /** @var Publication $publication */
            $publication = new Publication($publication);
        }
        unset($publication);

        /** @var Publication $latestPublication */
        $latestPublication = $publications[0];

// displays latest publication data
        echo $latestPublication->getTitle(), "<br>";
        echo $latestPublication->getPublicationURL(), "<br>";
        echo $latestPublication->getAuthors(), "<br>";
        echo $latestPublication->getPublisherDetails(), "<br>";
        echo $latestPublication->getNbCitations(), "<br>";
        echo $latestPublication->getCitationsURL(), "<br>";
        echo $latestPublication->getYear(), "<br>";

    }

    public function login()
    {
	    return view ('page-login');
    }

	//--------------------------------------------------------------------

}
