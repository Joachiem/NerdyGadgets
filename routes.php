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
    Homepage::index();
});


// auth
Route::get('/login', function () {
    View::show('user/login');
});
Route::get('/register', function () {
    View::show('user/register');
});
Route::post('/login', function () {
    Auth::login();
});
Route::get('/account', function () {
    User::account();
});
Route::post('/register', function () {
    Auth::register();
});
Route::post('/logout', function () {
    Auth::logout();
});
Route::get('/user/delete', function () {
    View::show('user/delete');
});
Route::post('/user/delete', function () {
    Auth::delete();
});
Route::get('/user/delete-succes', function () {
    View::show('user/delete-succes');
});

//user
Route::get('/user/history', function () {
    User::history();
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
    Product::index();
});
Route::get('/products/view', function () {
    Product::view(isset($_GET['id']) ? $_GET['id'] : null);
});
Route::post('/products/view', function () {
    Review::add();
});

Route::get('/reviews', function () {
    Review::show();
});
Route::post('/reviews', function () {
    Review::addToSite();
});

// categories
Route::get('/categories', function () {
    Category::index();
});


// checkout
Route::get('/checkout/login', function () {
    Checkout::login();
});
Route::post('/checkout/login', function () {
    Auth::login();
});
Route::get('/checkout/account', function () {
    Checkout::account();
});
Route::get('/checkout/address', function () {
    Checkout::address();
});
Route::get('/checkout/pay', function () {
    Checkout::pay();
});
Route::get('/checkout/complete', function () {
    Checkout::complete();
});
Route::get('/checkout/paying', function () {
    Checkout::paying();
});
Route::post('/checkout/account', function () {
    Checkout::storeUserInfo();
});
Route::post('/checkout/address', function () {
    Checkout::storeShippingInfo();
});


// cart
Route::get('/cart', function () {
    Cart::index();
});

Route::delete('/cart/remove', function () {
    Cart::remove();
});
Route::put('/cart/increment', function () {
    Cart::increment();
});
Route::put('/cart/decrement', function () {
    Cart::decrement();
});
Route::put('/cart/change-product-amount', function () {
    Cart::changeProductAmount();
});
Route::post('/cart/discount', function () {
    Cart::getDiscount();
});
Route::post('/cart/discount/add', function () {
    Cart::addDiscount();
});
Route::delete('/cart/discount/remove', function () {
    Cart::removeDiscount();
});




//contact tos privacy
Route::get('/contact', function () {
    View::show('footer/contact');
});
Route::get('/tos', function () {
    View::show('footer/tos');
});
Route::get('/privacy', function () {
    View::show('footer/privacy');
});


// cookie
Route::put('/cookie', function () {
    return cookie_clicked();
});


// errors
Route::error('404', function () {
    View::show('error/404');
});
