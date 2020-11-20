<?php

namespace App\Controllers;

use CodeIgniter\Test\CIDatabaseTestCase;

class TestClass extends CIDatabaseTestCase
{
    protected $refresh  = true;
    protected $seed     = 'TestSeeder';
    protected $basePath = 'C:\Program Files\PostgreSQL\13\bin';

    public function test()
    {
        $criteria = [
            'nama_lembaga'  => 'Google Developer',
            'id_lembagamitra' => 2
        ];
        $this->seeInDatabase('lembagamitra', $criteria);
    }
}
