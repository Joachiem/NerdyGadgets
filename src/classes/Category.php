<?php

class Category
{
    public static function index()
    {
        $arg = DB::execute($GLOBALS['q']['categories'], [9999]);

        View::show('category/index', $arg);
    }
}
