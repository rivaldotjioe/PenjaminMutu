<?php 
namespace App\Controllers;

class Test extends BaseController{

    public function testconnection(){
        $dsn = 'mysqli://username:password@localhost/database';
 
// Load database and dbutil
$this->load->database($dsn);
$this->load->dbutil();
 
// check connection details
if(! $this->dbutil->database_exists('database'))
{
    // if connection details incorrect show error
    echo 'Incorrect database information provided';
}
    }

}

?>