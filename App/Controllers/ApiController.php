<?php
namespace App\Controllers;
use App\Models\Product;


class ApiController
{
    public function index()
    {
        $obj = new Product();

        $models = $obj->getAll();
        return api($models);
    }

    public function store()
    {
        return api($_POST);
    }
}

?>