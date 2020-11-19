<?php

/**
 * voorbeelden
 *
 * DB
 *
 * $result = DB::execute(query, values, delen van querys);
 *
 * goede voorbeelden:
 *
 */

$result = DB::execute('select * from stockitems');
$result = DB::execute('select * from stockitems where stockitemid = ?', [1]);
$result = DB::execute('select * from stockitems $1', [], ['where stockitemid = 1']);
$result = DB::execute('select * from stockitems $1', [1], ['where stockitemid = ?']);

/**
 * als de query te lang word kun je hem in querys.php zetten en in de query gebruiken:
 *
 * dit doe je met $GLOBALS['q']
 * de q staat voor querys
 *
 * $result = DB::execute($GLOBALS['q']['test']);
 *
 * View
 *
 * goede voorbeelden:
 *
 * View::show('index'); gaat naar index.php
 * View::show('cart/index'); gaat naar cart/index.php
 *
 * $arg = 'test';
 * View::show('index', $arg); gaat naar index en je kunt nu in index $arg gebruiken
 *
 *
 *
 *
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
