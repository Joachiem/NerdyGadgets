<?php
session_start();

spl_autoload_register(function ($class_name) {
    require_once 'src/classes/' . $class_name . '.php';
});

Lang::getLang();

require_once "src/includes/querys.php";

require_once "routes.php";

// pdo example


// $result = DB::execute($GLOBALS['q']['voorbeeld'], [3], ['where personid in (?)']);

// echo '<pre>';
// print_r($result);
// echo '</pre>';


// $arg = DB::execute($GLOBALS['q']['test'], [2], ['WHERE ImagePath IS NOT NULL']);
// View::show('category/index', $arg);



/**
 * documentatie objecten
 * 
 * Route - Class
 * 
 * Route::back() - gaat één pagina terug
 * 
 * Route::get() - Read - een pagina ophalen
 * Route::post() - Create - een item aanmaken
 * Route::put() - Update - een item aanpassen
 * Route::patch() - Update - een item aanpassen
 * Route::delete() - Delete - een item verwijderen
 * 
 * @param string $route - dit is de route wanneer de $callback moet uitgevoerd word
 * @param fuction $callback - als je op $route zit do dit
 * 
 * 
 * Route::redirect() - gaat van een pagina naar een andere pagina
 * 
 * @param string $from 
 * @param string $to
 * 
 * 
 * DB - Class
 * 
 * DB::execute() - voer een query uit op de database
 * 
 * 1e @param string $query optioneel
 * de sql query die moet worden uitgevoerd. deze query kan gezet worden in 
 * 
 * 2e @param array $values optioneel
 * de waarden die in de query komen die worden aangegeven met ?
 * 
 * @param array $partial_querys de delen van querys die komen op de plekken waar in de query
 * $1 staat de $1 telt door naar $2, $3 enz.
 * 
 * View - Class
 * 
 * View:show() - laat de pagina zien
 */