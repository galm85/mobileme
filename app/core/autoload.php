<?php

    require_once '../app/core/config.php';
    require_once '../app/core/app.php';
    require_once '../app/controllers/MainController.php';





    // autoload Models

    spl_autoload_register(function($class_name){
        
         require_once '../app/models/'.ucfirst($class_name).".model.php";
    });

     