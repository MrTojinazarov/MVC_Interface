<?php

namespace App\Database;

use PDO;

class Database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "mr2344";
    public $dbname = "mvcdata";

    public function connect()
    {
        return new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
    }
}
