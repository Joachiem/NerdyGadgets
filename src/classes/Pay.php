<?php

class Pay
{
    public static function mollieCreate($price, $ordernr, $redir)
    {
        try {
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => "{$price}"
                ],
                "description" => "Uw bestelling #{$ordernr} bij NerdyGadgets",
                "redirectUrl" => "{$redir}",
                "webhookUrl" => "https://webshop.example.org/mollie-webhook/",
            ]);

            header("Location: " . $payment->getCheckoutUrl(), true, 303);
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            return "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }

    public static function paymentComplete()
    {

    }
}

?>