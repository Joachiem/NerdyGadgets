<?php

class Cart
{
    /**
     * cart page
     * @param mixed $callback
     */
    public static function index()
    {
        if (isset($_SESSION['cart'])) {
            $cart_products = $_SESSION['cart'];

            $ids = implode(', ', array_keys($cart_products));
        }

        if (empty($ids)) return View::show('cart/index');

        $products = DB::execute($GLOBALS['q']['products'], [], [$ids]);

        foreach ($products as $product) {
            $product->qty = $cart_products[$product->StockItemID];
        }

        View::show('cart/index', $products);
    }


    /**
     * increment cart item
     * @param string $id
     */
    public static function increment()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!$data) return;

        if (isset($_SESSION['cart'][$data->id])) $_SESSION['cart'][$data->id] += 1;
        else $_SESSION['cart'][$data->id] = 1;

        http_response_code(201);
        return print json_encode(['title' => $GLOBALS['t']['add-alert-title'], 'message' => $GLOBALS['t']['add-alert-message']]);
    }

    /**
     * increment cart item
     * @param string $id
     */
    public static function decrement()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!$data) return;

        if (isset($_SESSION['cart'][$data->id])) {
            if ($_SESSION['cart'][$data->id] > 0) $_SESSION['cart'][$data->id] -= 1;
        } else $_SESSION['cart'][$data->id] = 0;

        http_response_code(201);
        return print json_encode(['title' => $GLOBALS['t']['add-alert-title'], 'message' => $GLOBALS['t']['add-alert-message']]);
    }


    /**
     * cheange the pruduct ammout of the card
     * @param mixed $callback
     */
    public static function changeProductAmount()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!$data) return;

        if (isset($_SESSION['cart'][$data->id])) $_SESSION['cart'][$data->id] = $data->amount;
        else $_SESSION['cart'][$data->id] = 1;

        http_response_code(201);
        return print json_encode(['type' => 'successful', 'amount' => array_sum($_SESSION['cart'])]);
    }


    /**
     * remove cart item
     * @param string $id
     */
    public static function remove()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!$data) return;

        $cart = $_SESSION['cart'];
        unset($cart[$data->id]);
        $_SESSION['cart'] = $cart;

        http_response_code(201);
        return print json_encode(['type' => 'successful', 'amount' => array_sum($_SESSION['cart'])]);
    }



    /**
     * add discount code
     * @param string $id
     */
    public static function addDiscount()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!$data) return;


        http_response_code(201);
        return print json_encode(['code' => '1234']);
    }

    /**
     * remove discount code
     * @param string $id
     */
    public static function removeDiscount()
    {
        http_response_code(201);
        return print json_encode(['code' => 'ok']);
    }
}
