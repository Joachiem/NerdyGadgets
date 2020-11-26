<?php

class Homepage
{
    /**
     * index page
     */
    public static function index()
    {
        $arg = new stdClass();

        $arg->popularProducts = DB::execute($GLOBALS['q']['popular-products'], [6]);
        $arg->popularSaleProducts = DB::execute($GLOBALS['q']['popular-sale-products'], [2]);
        $arg->categories = DB::execute($GLOBALS['q']['categories'], [3]);
        $arg->products = DB::execute($GLOBALS['q']['products'], [], ['102,75,32,4,46,160']);

        View::show('index', $arg);
    }
}
