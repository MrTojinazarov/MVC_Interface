<?php

namespace App\Models;

use App\Models\ModelInterface;
use PDO;
abstract class ModelAbstract implements ModelInterface
{
    abstract public static function getAll();
    abstract public static function create($data);
    abstract public static function update($id, $data);
    abstract public static function delete($id);
    abstract public static function showOne($id);
}

?>
