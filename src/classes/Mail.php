<?php
    class Mail
    {
        public static function paymentComplete()
        {
            $to = $_SESSION['email'];
            $subject = "Bestelling van nerdygadgets Betaald!";

            $message = "
            <html>
            <head>
            <title>Bestelling van nerdygadgets Betaald!</title>
            </head>
            <body>
            <p>This email contains HTML Tags!</p>
            <table>
            <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            </tr>
            <tr>
            <td>John</td>
            <td>Doe</td>
            </tr>
            </table>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <noreplay@nerdygadgets.nl>' . "\r\n";

            mail($to,$subject,$message,$headers);
        }
    }
?>