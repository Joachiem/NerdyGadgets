<?php

require_once "routes.php";

function __autoload($class)
{
    require_once 'src/classes/' . $class . '.php';
}
