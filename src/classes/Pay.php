<?php

class Pay
{
    public static function mollieCreate($price, $ordernr)
    {
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_uGtVRSpdytPa7S86RVAzcT2SeAmc5C");
        try {
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => "{$price}"
                ],
                "description" => "NerdyGadgets - #{$ordernr}",
                "redirectUrl" => "http://localhost/checkout/complete",
                "metadata" => [
                    "order_id" => $ordernr,
                ],
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
