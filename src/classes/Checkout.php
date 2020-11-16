<?php
class Checkout
{
    public static function address()
    {
        if (isset($_POST["submit"])) {
        }
    }

    public static function account()
    {

        if (!isset($_POST["submit"])) return;

        $data = $_POST;
        unset($data['submit']);
        $_SESSION['form'] = $data;

        $error_messages = [];
        $form_fields = [
            'firstname' => 'firstname invullen',
            'lastname' => 'lastname invullen',
            'email' => 'email invullen',
            'phonenumber' => 'phonenumber invullen'
        ];

        if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["phonenumber"])) {
            foreach ($form_fields as $form_field => $error) {
                if (empty($_POST[$form_field])) {
                    $error_messages[$form_field] = $error;
                }
            }
            Route::redirect('/checkout/account', '/checkout/account?error_messages=' . json_encode($error_messages));
        } else {
            print_r($_SESSION['form']);
        }
    }
}
