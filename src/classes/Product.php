<?php
class Product
{
    /**
     * index page
     * @param mixed $callback
     */
    public static function index($id)
    {
        $product = DB::execute($GLOBALS['q']['product'], [$id]);

        $images = DB::execute($GLOBALS['q']['product-images'], [$id]);

        if ($images) {
            $product['images'] = $images;
        }

        View::show('product/view', $product);
    }
}
