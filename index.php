<?php
session_start();

require_once "src/includes/querys.php";

require_once "routes.php";

function __autoload($class)
{
    require_once 'src/classes/' . $class . '.php';
}

// pdo example

// $arg = DB::execute($GLOBALS['q']['test'], [5], ['WHERE ImagePath IS NOT NULL']);
// View::show('category/index', $arg);
