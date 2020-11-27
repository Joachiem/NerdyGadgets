<?php

class Category
{
    /**
     * category page
     */
    public static function index()
    {
        $arg = DB::execute($GLOBALS['q']['categories'], [9999]);

        View::show('category/index', $arg);
    }
}
