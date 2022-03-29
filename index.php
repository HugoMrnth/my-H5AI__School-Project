<?php 

    define('URI', rtrim($_SERVER['REQUEST_URI'], '/'));


    $uri = URI;
    
    // var_dump(URI);
    if(URI == "/404") {
        require_once 'View/404.php';
    } else {
        require_once "Model/H5AI.class.php";
        require_once 'Controller/tree.php';
        require_once 'Controller/main.php';
        require_once 'View/home.php';
    }
   