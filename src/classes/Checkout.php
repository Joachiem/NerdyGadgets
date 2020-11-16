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
        print_r($_POST);

        if (isset($_POST["submit"])) {

            if (empty($_POST["firstname"])) {
                Route::redirect('/checkout/account', '/checkout/account');
            } elseif (empty($_POST["lastname"])) {
                Route::redirect('/checkout/account', '/checkout/account');
            } elseif (empty($_POST["email"])) {
                Route::redirect('/checkout/account', '/checkout/account');
            } elseif (empty($_POST["phonenumber"])) {
                Route::redirect('/checkout/account', '/checkout/account');
            }

            $_SESSION['firstname'] = $_POST['firstname'];
            $_SESSION['lastname'] = $_POST['lastname'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['phonenumber'] = $_POST['phonenumber'];
        }

        if (!isset($_SESSION['firstname'])) {
            $_SESSION['firstname'] = "";
        }
        if (!isset($_SESSION['lastname'])) {
            $_SESSION['lastname'] = "";
        }
        if (!isset($_SESSION['email'])) {
            $_SESSION['email'] = "";
        }
        if (!isset($_SESSION['phonenumber'])) {
            $_SESSION['phonenumber'] = "";
        }
    }
}
