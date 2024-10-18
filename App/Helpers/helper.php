<?php

use App\Helpers\Auth;
use App\Helpers\View;


if(!function_exists('dd'))
{
    function dd(...$data)
    {
        echo "<body bgcolor='gray'>";
        echo "<pre style='background-color:black; color:#0dbb2a; font-familiy: monospace;'>";
        print_r($data);
        echo '</pre>';
        exit(); 
    }
}

if(!function_exists('view')){
    function view($view, $title, $models = [])
    {
        View::make($view, $title, $models);
    }
}
if(!function_exists('layout')){
    function layout($view)
    {
        View::$main = $view;
    }
}

if(!function_exists('check')){
    function check()
    {
        Auth::check();
    }
}

if(!function_exists('api')){
    function api($data, $status = 200)
    {
        header("Content_Type: aplication/json");
        http_response_code($status);

        echo json_encode([
            'status' => $status,
            'data' => $data
        ], JSON_PRETTY_PRINT);
        exit();

    }

}
?>