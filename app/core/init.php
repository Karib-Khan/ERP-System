<?php 
spl_autoload_register(function ($classname){
    $filename = "../app/models/" . ucfirst($classname) . ".php";
    if (file_exists($filename)) {
        require $filename;
    }
});

// Load required files
require 'config.php';
require 'Database.php';      // Must come before functions.php
require 'functions.php';     // Now safe to use `Database` trait
require 'Model.php';
require 'Controller.php';
require 'App.php';
?>
