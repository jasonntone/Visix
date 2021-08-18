<?php
session_start();
require 'Core/Controller.php';
require 'Core/View.php';
require 'Core/Model.php';

$url = $_GET['url'] ?? null;
$url = rtrim($url, '/');
$uri = explode('/', $url);

if (empty($url[0])) {
    require 'Controller/index.php';
    $controller = new index();
    return false;
}
    $file = 'Controller/'.$uri[0].'.php';
    if(file_exists($file)){
        require $file;
    }else{
        require 'Controller/errorHandler.php';
        $controller = new errorHandler();
        return false;
    }
    $controller = new $uri[0];
    if(isset($uri[1]) && method_exists($controller,$uri[1])){

        $controller->{$uri[1]}();
    }elseif(isset($uri[1]) && !method_exists($controller,$uri[1])){
        require 'Controller/errorHandler.php';
        $controller = new errorHandler();
        return false;
    }else{
        $controller->{'index'}();
    }
//print_r ($uri);




