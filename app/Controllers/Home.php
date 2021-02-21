<?php namespace App\Controllers;

use function Composer\Autoload\includeFile;

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

	public function testcurl(){
        include APPPATH.'Libraries/simple_html_dom.php';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://scholar.google.com/citations?view_op=search_authors&mauthors=eka+dyar&hl=id&oi=ao");
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
         $response  = curl_exec($curl);
         curl_close($curl);
         $html = new \simple_html_dom();
         $html->load($response);
        foreach ($html->find('a[class=gs_ai_pho]') as $link){
                echo $link->href."<br>"; //link sitasi dosen
        }

    }

    public function login()
    {
	    return view ('page-login');
    }

	//--------------------------------------------------------------------

}
