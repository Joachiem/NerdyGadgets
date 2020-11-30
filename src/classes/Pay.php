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
            $_SESSION['payment_id'] = $payment->id;
            header("Location: " . $payment->getCheckoutUrl(), true, 303);
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            return "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }

    public static function checkPayment()
    {
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_uGtVRSpdytPa7S86RVAzcT2SeAmc5C");
        $payment_id = $_SESSION['payment_id'];
        try {
            $payment = $mollie->payments->get($payment_id);
            if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {

                return 'PAID';

            } elseif ($payment->isOpen()) {

                return 'OPEN';

            } elseif ($payment->isPending()) {

                return 'PENDING';

            } elseif ($payment->isFailed()) {

                return 'FAILED';

            } elseif ($payment->isExpired()) {

                return 'EXPIRED';

            } elseif ($payment->isCanceled()) {

                return 'CANCELED';

            } elseif ($payment->hasRefunds()) {
                /*
                 * The payment has been (partially) refunded.
                 * The status of the payment is still "paid"
                 */
                return 'REFUNDED';
            } elseif ($payment->hasChargebacks()) {
                /*
                 * The payment has been (partially) charged back.
                 * The status of the payment is still "paid"
                 */
                return 'CHARGEBACK';
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }
}
