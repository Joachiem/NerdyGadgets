<?php

Route::get('test', function () {
    View::show('browse');
});

Route::post('test', function () {
    View::show('index');
});

Route::patch('test', function () {
    View::show('index');
});

Route::delete('test', function () {
    View::show('index');
});
