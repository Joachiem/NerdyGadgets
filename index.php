<?php

/**
 * start the session 
 * nessesery to use $_SESSION
 */
session_start();

require_once 'vendor/autoload.php';


/**
 * load all classes from src/classes/
 * after this you can use all classes
 */
spl_autoload_register(function ($class_name) {
    require_once 'src/classes/' . $class_name . '.php';
});


/**
 * get the correct language file for the translations
 * default to nl
 */
Lang::getLang();


/**
 * load all querys for later use
 * can be accesed by $GLOBALS['q'][key]
 */
require_once 'src/includes/querys.php';


/**
 * the routes file from here the pages will be loaded
 */
require_once 'routes.php';
