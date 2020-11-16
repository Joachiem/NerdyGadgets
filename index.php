<?php
session_start();

spl_autoload_register(function ($class_name) {
    require_once 'src/classes/' . $class_name . '.php';
});

Lang::getLang();

require_once "src/includes/querys.php";

require_once "routes.php";


// pdo example

// $arg = DB::execute($GLOBALS['q']['test'], [5], ['WHERE ImagePath IS NOT NULL']);
// View::show('category/index', $arg);
