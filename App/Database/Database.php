<?php
namespace App\Database;

use PDO;

class Database 
{
    public static $host = "localhost";
    public static $username = "root";
    public static $password = "mr2344";
    public static $dbname = "mvcdata";

    public static function connect()
    {
        return new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname , self::$username , self::$password);
    }
}

?>