<?php

class Cart
{
    /**
     * index page
     * @param mixed $callback
     */
    public static function index()
    {
        $arg = [];
        $images = '';

        if (isset($_SESSION['cart'])) {
            $products = $_SESSION['cart'];

            $arg = [];

            foreach ($products as $id => $qty) {

                $product = DB::execute($GLOBALS['q']['product'], [$id]);

                $images = DB::execute($GLOBALS['q']['product-images'], [$id]);

                $arg[$id] = [
                    'qty' => $qty,
                    'product' => $product,
                    'images' => $images
                ];
            }
        }

        View::show('cart/index', $arg);
    }


    /**
     * remove cart item
     * @param string $id
     */
    public static function remove($id)
    {
        $cart = $_SESSION['cart'];
        unset($cart[$id]);
        $_SESSION['cart'] = $cart;
    }


    /**
     * index page
     * @param mixed $callback
     */
    public static function increment()
    {
        $data = json_decode(file_get_contents('php://input'));

        if (isset($_SESSION['cart'][$data->id])) $_SESSION['cart'][$data->id] += 1;
        else  $_SESSION['cart'][$data->id] = 1;

        http_response_code(201);
        print json_encode(['title' => $GLOBALS['t']['add-alert-title'], 'message' => $GLOBALS['t']['add-alert-message']]);
    }


    /**
     * index page
     * @param mixed $callback
     */
    public static function decrement($id)
    {
        $_SESSION['cart'][$id] -= 1;
    }
}
