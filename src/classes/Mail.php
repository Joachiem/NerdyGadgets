<?php
    class Mail
    {
        public static function paymentComplete()
        {
            $to = "camielvdniet@outlook.com";
            $subject = "Bestelling van nerdygadgets Betaald!";

            $message = " hello my pp small";

            // Always set content-type when sending HTML email
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // // More headers
             $headers = 'From: noreplynerdygadgets@gmail.com';

            mail($to,$subject,$message,$headers);
        }
    }
?>