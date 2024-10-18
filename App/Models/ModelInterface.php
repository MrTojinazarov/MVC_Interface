<?php

namespace App\Models;

interface ModelInterface
{
    public function getAll();
    public function create($data);
    public function update($id, $data);
    public function delete($id);
    public function showOne($id);
}

?>
