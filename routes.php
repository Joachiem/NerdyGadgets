<?php
/*
* dit zijn de routes van NerdyGadgets
* de get routes zijn voor pagina's
*/

include 'src/functions/core.php';


Route::redirect('/checkout', '/checkout/account');

Route::get('/', function () {
    View::show('index');
});
Route::get('/dutch', function () {
    Lang::nl();
    Route::back();
});
Route::get('/english', function () {
    Lang::eng();
    Route::back();
});
Route::get('/products', function () {
    View::show('product/index');
});
Route::get('/products/view', function () {
    Product::index($_GET['id']);
});
Route::get('/categories', function () {
    Category::index();
});
Route::get('/login', function () {
    View::show('user/login');
});
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
});
Route::post('/checkout/address', function () {
    Checkout::address();
    Route::redirect('/checkout/address', '/checkout/pay');
});
Route::put('/cookie', function () {
    return cookie_clicked();
});
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
Route::error('404', function () {
    View::show('error/404');
});
