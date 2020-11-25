<?php

class Cart
{
    /**
     * cart page
     * @param mixed $callback
     */
    public static function index()
    {
        $cart_products = $_SESSION['cart'];

        if (isset($cart_products)) $ids = implode(', ', array_keys($cart_products));

        if (!$ids) return View::show('cart/index');


        $products = DB::execute($GLOBALS['q']['products'], [], [$ids]);

        foreach ($products as $product) {
            $product->qty = $cart_products[$product->StockItemID];
        }

        View::show('cart/index', $products);
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

        if (!$data) return;

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
