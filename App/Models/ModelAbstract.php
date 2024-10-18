<?php

namespace App\Models;
use App\Database\Database;
use App\Models\ModelInterface;
use PDO;
abstract class ModelAbstract extends Database implements ModelInterface 
{
    abstract public function getAll();
    abstract public function create($data);
    abstract public function update($id, $data);
    abstract public function delete($id);
    abstract public function showOne($id);
}

?>
