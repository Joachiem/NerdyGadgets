<?php

class Cart
{
    /**
     * cart page
     */
    public static function index()
    {
        if (isset($_SESSION['cart']['products'])) {
            $cart_products = $_SESSION['cart']['products'];

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
            $cart_products = $_SESSION['cart']['products'];

            $ids = implode(', ', array_keys($cart_products));
        }

        if (empty($ids)) return View::show('cart/index');
        $products = DB::execute($GLOBALS['q']['products'], [], [$ids]);

        $amount = 0;
        foreach ($products as $product) {
            $product->qty = $cart_products[$product->StockItemID];
            $amount = $amount + (sprintf("%.2f", $product->SellPrice) * $product->qty);
        }

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

        if (empty($data->id)) return;

        if (isset($_SESSION['cart']['products'][$data->id])) $_SESSION['cart']['products'][$data->id] += 1;
        else $_SESSION['cart']['products'][$data->id] = 1;

        http_response_code(201);
        return print json_encode(['title' => $GLOBALS['t']['add-alert-title'], 'message' => $GLOBALS['t']['add-alert-message'], 'id' => $data->id]);
    }


    /**
     * increment cart item
     * @return mixed callback
     */
    public static function decrement()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!$data) return;

        if (isset($_SESSION['cart']['products'][$data->id])) {
            if ($_SESSION['cart']['products'][$data->id] > 0) $_SESSION['cart']['products'][$data->id] -= 1;
        } else $_SESSION['cart']['products'][$data->id] = 0;

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

        if (isset($_SESSION['cart']['products'][$data->id])) $_SESSION['cart']['products'][$data->id] = $data->amount;
        else $_SESSION['cart']['products'][$data->id] = 1;

        http_response_code(201);
        return print json_encode(['type' => 'successful', 'amount' => array_sum($_SESSION['cart']['products'])]);
    }


    /**
     * remove cart item
     * @param string $id
     */
    public static function remove()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!$data) return;

        $cart = $_SESSION['cart']['products'];
        unset($cart[$data->id]);
        $_SESSION['cart']['products'] = $cart;

        http_response_code(201);
        return print json_encode(['type' => 'successful', 'amount' => array_sum($_SESSION['cart']['products'])]);
    }


    /**
     * add discount code
     * @param string $id
     */
    public static function addDiscount()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!$data) return;

        $discounts = DB::execute('select * from discount_codes where discount_code = ? and expire >= ?', [$data->value, date('Y-m-d')]);
        if ($discounts) {
            $discount = $discounts[0];

            if (isset($_SESSION['cart'])) $_SESSION['cart']['discount'] = $discount;

            http_response_code(201);
            return print json_encode(['discount' => $discount, 'alert' => ['title' => $GLOBALS['t']['discount-ok-alert-title'], 'message' => $GLOBALS['t']['discount-ok-alert-message']]]);
        }

        return print json_encode(['alert' => ['title' => $GLOBALS['t']['discount-error-alert-title'], 'message' => $GLOBALS['t']['discount-error-alert-message']]]);
    }

    /**
     * remove discount code
     * @param string $id
     */
    public static function removeDiscount()
    {
        $cart = $_SESSION['cart'];
        if (isset($cart['discount'])) unset($cart['discount']);
        $_SESSION['cart'] = $cart;

        http_response_code(201);
        return print json_encode(['alert' => ['title' => $GLOBALS['t']['discount-remove-alert-title'], 'message' => $GLOBALS['t']['discount-remove-alert-message']]]);
    }

    /**
     * get discount code
     * @param string $id
     */
    public static function getDiscount()
    {
        if (empty($_SESSION['cart']['discount'])) return print json_encode(['discount' => '']);

        $discount = $_SESSION['cart']['discount'];

        $discount = DB::execute('select * from discount_codes where discount_code = ? and expire >= ?', [$discount->discount_code, date('Y-m-d')])[0];

        http_response_code(201);
        return print json_encode(['discount' => $discount]);
    }
}
