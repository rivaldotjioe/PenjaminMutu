<?php


namespace App\Models;


class UserModel extends \CodeIgniter\Model
{
    protected $DBGroup = 'helper';
    protected $table = 'User';
    protected $primaryKey = 'username';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['password',];


}