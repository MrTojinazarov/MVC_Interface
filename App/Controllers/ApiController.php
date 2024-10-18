<?php
namespace App\Controllers;
use App\Models\Product;


class ApiController
{
    public function index()
    {
        $models = Product::getAll();
        return api($models);
    }

    public function store()
    {
        return api($_POST);
    }
}

?>