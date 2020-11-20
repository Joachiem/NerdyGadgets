<?php

class Product
{
    /**
     * index page
     */
    public static function index()
    {
        $arg = new stdClass();

        View::show('product/index', $arg);
    }

    /**
     * view page
     * @param string $id
     */
    public static function view($id)
    {
        if (!$id) View::show('error/404');

        DB::execute($GLOBALS['q']['product-clicked'], [$id]);

        $product = DB::execute($GLOBALS['q']['product'], [$id])[0];

        $images = DB::execute($GLOBALS['q']['product-images'], [$id]);

        if ($images) {
            $product->images = $images;
        }

        View::show('product/view', $product);
    }
}
