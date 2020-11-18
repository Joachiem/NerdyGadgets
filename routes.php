<?php
/*
* dit zijn de routes van NerdyGadgets
* de get routes zijn voor pagina's
*/

include 'src/functions/core.php';


// redirects
Route::redirect('/checkout', '/checkout/account');


// index
Route::get('/', function () {
    $arg = DB::execute($GLOBALS['q']['products'], [], ['102,75,32']);

    View::show('index', $arg);
});


// auth
Route::get('/login', function () {
    View::show('user/login');
});


// language
Route::get('/dutch', function () {
    Lang::nl();
    Route::back();
});
Route::get('/english', function () {
    Lang::eng();
    Route::back();
});


// products
Route::get('/products', function () {
    View::show('product/index');
});
Route::get('/products/view', function () {
    if (empty($_GET['id'])) View::show('error/404');
    Product::index($_GET['id']);
});


// categories
Route::get('/categories', function () {
    Category::index();
});


// checkout
Route::get('/checkout/account', function () {
    View::show('checkout/account');
});
Route::get('/checkout/address', function () {
    View::show('checkout/address');
});
Route::get('/checkout/pay', function () {
    View::show('checkout/pay');
});
Route::get('/checkout/complete', function () {
    View::show('checkout/complete');
});
Route::post('/checkout/account', function () {
    Checkout::account();
    Checkout::checkaccount();
    Route::redirect('/checkout/account', '/checkout/address');
});
Route::post('/checkout/address', function () {
    Checkout::address();
    Route::redirect('/checkout/address', '/checkout/pay');
});


// cart
Route::get('/cart', function () {
    Cart::index();
});
Route::post('/cart/add', function () {
    Cart::add($_GET['id']);
});
Route::delete('/cart/remove', function () {
    Cart::remove($_GET['id']);
});
Route::put('/cart/increment', function () {
    Cart::increment($_GET['id']);
});
Route::put('/cart/decrement', function () {
    Cart::decrement($_GET['id']);
});


// cookie
Route::put('/cookie', function () {
    return cookie_clicked();
});


// errors
Route::error('404', function () {
    View::show('error/404');
});
