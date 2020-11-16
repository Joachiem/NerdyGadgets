<?php
session_start();

require_once "src/includes/querys.php";

require_once "routes.php";

function __autoload($class)
{
    require_once 'src/classes/' . $class . '.php';
}

// pdo example

// $query = DB::prepare($GLOBALS['q']['test'], ['WHERE ImagePath IS NOT NULL']);
// $arg = DB::execute($query, [5]);
// View::show('category/index', $arg);
