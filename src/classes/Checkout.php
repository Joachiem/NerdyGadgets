<?php
class Checkout
{
    public static function address(){
        
        if (isset($_POST["submit"])) {
            $_SESSION["postcode"] = $_POST["postcode"];
            $_SESSION["huisnummer"] = $_POST["huisnummer"];
            $_SESSION["verzending"] = $_POST["verzending"];
            if (empty($_POST["postcode"])) {
                Route::redirect('/checkout/address', '/checkout/address');
            } elseif (empty($_POST["huisnummer"])) {
                Route::redirect('/checkout/address', '/checkout/address');
            } elseif (empty($_POST["verzending"])) {
                Route::redirect('/checkout/address', '/checkout/address');
            } else {
                Route::redirect('/checkout/address', '/checkout/pay');
            }
        }

        if (isset($_SESSION["postcode"]) == false) {
            $_SESSION["postcode"] = "";
        }
        if (isset($_SESSION["huisnummer"]) == false) {
            $_SESSION["huisnummer"] = "";
        }
        if (isset($_SESSION["verzending"]) == false) {
            $_SESSION["verzending"] = "";
        }
    }
}
