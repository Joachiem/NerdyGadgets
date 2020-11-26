<?php
session_start();

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    require_once 'src/classes/' . $class_name . '.php';
});

Lang::getLang();

require_once "src/includes/querys.php";

require_once "routes.php";
// require_once "documentatie.php";
