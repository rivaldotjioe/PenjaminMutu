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

	public  function test(){
	    return view ('dashboard');
    }

    public function login()
    {
	    return view ('page-login');
    }

	//--------------------------------------------------------------------

}
