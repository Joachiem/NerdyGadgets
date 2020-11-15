<?php
session_start();

require_once "src/includes/querys.php";

require_once "routes.php";

function __autoload($class)
{
    require_once 'src/classes/' . $class . '.php';
}



// print_r(DB::execute($q['categories']));
