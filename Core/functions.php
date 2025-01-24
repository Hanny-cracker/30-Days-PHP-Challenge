<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] == $value;
}

function abort($code = 404)
{
    // abording current request
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::RORBIDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $heading = [])
{
    extract($heading);
    require base_path('views/' . $path);
}


function redirect($path){
    header("location: {$path}");
    exit();
}

function getId($db){
    return $db->query('SELECT id FROM user WHERE email = :email',[
        'email' => $_SESSION['user']['email']
    ])->fetch();

}

function old($key, $default =''){
    return Core\Session::get('old')[$key] ?? $default;  
}