<?php

class Category
{
    public static function index()
    {
        $arg = DB::execute($GLOBALS['q']['categories']);

        View::show('category/index', $arg);
    }
}
