<?php

namespace App\Models;

interface ModelInterface
{
    public static function getAll();
    public static function create($data);
    public static function update($id, $data);
    public static function delete($id);
    public static function showOne($id);
}

?>
