<?php
class Checkout
{
    public static function address()
    {

        if (!isset($_POST["submit"])) return;

        $data = $_POST;
        unset($data['submit']);
        $_SESSION['form'] = $data;

        $error_messages = [];
        $form_fields = [
            'postcode' => 'Postcode invullen',
            'housenmr' => 'Huisnummer invullen',
            'shipping' => 'Verzending invullen',
        ];

        if (empty($_POST["postcode"]) || empty($_POST["housenmr"]) || empty($_POST["shipping"])) {
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
    }

    public static function checkaccount()
    {
        if (isset($_SESSION['form'])) {
            print_r($_SESSION['form']);
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
    }
}
