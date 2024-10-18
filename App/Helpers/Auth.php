<?php
namespace App\Helpers;

class Auth
{
    public static function check()
    {
        if(isset($_SESSION['Auth'])){
            return true;
        }else{
            return false;
        }
    }

    public static function user()
    {
        if(self::check()){
            return $_SESSION['Auth'];
        }else{
            return false;
        }
    }

}
?> 