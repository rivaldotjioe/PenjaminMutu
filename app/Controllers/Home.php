<?php namespace App\Controllers;

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
	    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://sandbox.rachmat.id/curl/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;

    }

    public function login()
    {
	    return view ('page-login');
    }

	//--------------------------------------------------------------------

}
