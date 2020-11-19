<?php

class Product
{
    /**
     * index page
     */
    public static function index()
    {
        View::show('product/index');
    }

    /**
     * view page
     * @param string $id
     */
    public static function view($id)
    {
        if (!$id) View::show('error/404');

        $product = DB::execute($GLOBALS['q']['product'], [$id])[0];

        $images = DB::execute($GLOBALS['q']['product-images'], [$id]);

        if ($images) {
            $product->images = $images;
        }

        View::show('product/view', $product);
    }
}
