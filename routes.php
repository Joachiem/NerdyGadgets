<?php
/*
* dit zijn de routes van NerdyGadgets
* de get routes zijn voor pagina's
*/

include 'src/functions/cart.php';
include 'src/functions/core.php';


Route::redirect('/checkout', '/checkout/account');

Route::get('/', function () {
    View::show('index');
});

Route::get('/dutch', function () {
    Route::back();
});

Route::get('/english', function () {
    Route::back();
});

Route::get('/products', function () {
    View::show('product/index');
});

Route::get('/products/view', function () {
    Product::index();
});

Route::get('/categories', function () {
    View::show('category/index');
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


Route::put('/cookie', function () {
    return cookie_clicked();
});

Route::get('/cart', function () {
    Cart::index();
});
Route::post('/cart/add', function () {
    Cart::add($_GET['id']);
});
Route::get('/cart/increment', function () {
    Cart::increment($_GET['id']);
});
Route::get('/cart/decrement', function () {
    Cart::decrement($_GET['id']);
});


Route::error('404', function () {
    View::show('error/404');
});
