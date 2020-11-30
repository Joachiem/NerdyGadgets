<?php

class Cart
{
    /**
     * cart page
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

    public static function totalPrice()
    {
        if (isset($_SESSION['cart'])) {
            $cart_products = $_SESSION['cart'];

            $ids = implode(', ', array_keys($cart_products));
        }

        if (empty($ids)) return View::show('cart/index');

        $products = DB::execute($GLOBALS['q']['products'], [], [$ids]);

        $amount = 0;
        foreach ($products as $product) {
            $product->qty = $cart_products[$product->StockItemID];
            $amount = $amount + (sprintf("%.2f", $product->SellPrice) * $product->qty);
        }

        // Als bedrag onder €50, dan vereken ook verzendkosten!
        if ($amount < 50) {
            $amount = $amount + 6.75;
        }
        return $amount;
    }

    /**
     * increment cart item
     * @return mixed callback
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
     * @return mixed callback
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
     * @return mixed callback
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
}
