<?php

class Checkout
{
    public static function paying()
    {
        Pay::mollieCreate(69.69, 1111);
    }

    public static function storeUserInfo()
    {
        if (!isset($_POST["submit"])) return;

        $data = $_POST;
        unset($data['submit']);
        if (empty($_SESSION['form'])) {
            $_SESSION['form'] = $data;
        } else {
            $_SESSION['form'] = array_merge($_SESSION['form'], $data);
        }

        unset($_SESSION['form']['error_messages']);
        $error_messages = [];
        $form_fields = [
            'firstname' => 'Firstname invullen',
            'lastname' => 'Lastname invullen',
            'email' => 'Email invullen',
            'phonenumber' => 'Phonenumber invullen'
        ];

        if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["phonenumber"])) {
            foreach ($form_fields as $form_field => $error) {
                if (empty($_POST[$form_field])) {
                    $error_messages[$form_field] = $error;
                }
            }

            $_SESSION['form']['error_messages'] = $error_messages;

            Route::redirect('/checkout/account', '/checkout/account');
        }

        unset($_SESSION['form']['error_messages']);

        Route::redirect('/checkout/account', '/checkout/address');
    }


    public static function storeShippingInfo()
    {
        if (!isset($_POST["submit"])) return;

        $data = $_POST;
        unset($data['submit']);
        $_SESSION['form'] = array_merge($_SESSION['form'], $data);

        unset($_SESSION['form']['error_messages']);
        $error_messages = [];
        $form_fields = [
            'postcode' => 'Postcode invullen',
            'housenmr' => 'Huisnummer invullen',
            'shipping' => 'Verzending invullen',
            'delivery' => 'Bezorging invullen'
        ];

        if (empty($_POST["postcode"]) || empty($_POST["housenmr"]) || empty($_POST["shipping"]) || empty($_POST["delivery"])) {
            foreach ($form_fields as $form_field => $error) {
                if (empty($_POST[$form_field])) {
                    $error_messages[$form_field] = $error;
                }
            }

            $_SESSION['form']['error_messages'] = $error_messages;

            Route::redirect('/checkout/address', '/checkout/address');
        } else {
            print_r($_SESSION['form']);
        }

        unset($_SESSION['form']['error_messages']);

        Route::redirect('/checkout/address', '/checkout/pay');
    }


    public static function checkAccountInfo()
    {
        $form = $_SESSION['form'];
        if (isset($form)) {

            if (empty($form["firstname"]) || empty($form["lastname"]) || empty($form["email"]) || empty($form["phonenumber"])) {
                Route::redirect('/checkout/address', '/checkout/account');
            }
        } else {
            Route::redirect('/checkout/address', '/checkout/account');
        }
    }

    public static function checkaddressInfo()
    {
        $form = $_SESSION['form'];
        if (isset($form)) {

            if (empty($form["firstname"]) || empty($form["lastname"]) || empty($form["email"]) || empty($form["phonenumber"]) || empty($form["postcode"]) || empty($form["housenmr"]) || empty($form["shipping"])) {
                Route::redirect('/checkout/pay', '/checkout/address');
            }
        } else {
            Route::redirect('/checkout/pay', '/checkout/address');
        }
    }


    public static function noItemsInCart()
    {
        if (!isset($_SESSION['cart'])) {
            Route::redirect('/checkout/address', '/cart');
            Route::redirect('/checkout/account', '/cart');
            Route::redirect('/checkout/loginorguest', '/cart');
        }
    }

    public static function complete()
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

        View::show('checkout/complete', $arg);
    }
}
