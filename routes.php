<?php
/*
* dit zijn de routes van NerdyGadgets
* de get routes zijn voor paginas
* 
*/

Route::redirect('checkout', 'checkout/account');

Route::get('', function () {
    View::show('index');
});

Route::get('products', function () {
    View::show('products');
});

Route::get('categories', function () {
    View::show('categories');
});

Route::get('checkout/account', function () {
    View::show('checkout/account');
});

Route::get('checkout/address', function () {
    View::show('checkout/address');
});

Route::get('checkout/pay', function () {
    View::show('checkout/pay');
});



Route::error('404', function () {
    View::show('error/404');
});



// Route::post('test', function () {
//     View::show('index');
// });

// Route::patch('test', function () {
//     View::show('index');
// });

// Route::delete('test', function () {
//     View::show('index');
// });
