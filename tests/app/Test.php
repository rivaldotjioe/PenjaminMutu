<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use CodeIgniter\Test\CIUnitTestCase;

class Test extends CIUnitTestCase
{

    public function __construct()
    {
    }

    public function getYear()
    {
        $time = Time::now();
        $year = $time->getYear();
        return $year;
    }

    public function index()
    {
        echo "Using Unit Testing Library";
        $test = $this->getYear();
        $expected = 2021;
        $testname = "Get Year Functions";
        echo $this->unit->run($test, $expected, $testname);
    }
}
