<?php

require_once "routes.php";

function __autoload($class_name)
{
    require_once 'src/classes/' . $class_name . '.php';
}
?>
