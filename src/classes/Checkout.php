<?php

class Checkout
{
    public static function paying()
    {
        Pay::mollieCreate(Cart::totalPrice(), 1111);
    }

    public static function login()
    {
        self::noItemsInCart();
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $userinfo = $_SESSION['user'];
            $user = DB::execute('SELECT PhoneNumber FROM people WHERE PersonID = ?', [$userinfo->PersonID])[0];
            if (empty($user->PhoneNumber)) {
                Route::redirect('/checkout/account');
            } else {
                Route::redirect('/checkout/address');
            }
        }
        View::show('checkout/login');
    }

    public static function account()
    {
        self::noItemsInCart();
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $userinfo = $_SESSION['user'];
            $user = DB::execute('SELECT FullName, EmailAddress FROM people WHERE PersonID = ?', [$userinfo->PersonID])[0];
            $_SESSION['form']['email'] = $user->EmailAddress;
            $name = explode(' ', $user->FullName, 2);
            $_SESSION['form']['firstname'] = $name[0];
            if (isset($name[1])) $_SESSION['form']['lastname'] = $name[1];
        }
        View::show('checkout/account');
    }

    public static function address()
    {
        self::noItemsInCart();
        self::checkAccountInfo();
        View::show('checkout/address');
    }

    public static function pay()
    {
        self::noItemsInCart();
        self::checkAccountInfo();
        self::checkAddressInfo();
        View::show('checkout/pay');
    }

    public static function storeUserInfo()
    {
        //save old data and merge new data
        $_SESSION['form'] = $_POST;

        //generate error messages
        unset($_SESSION['error_messages']);
        $error_messages = [];
        $form_fields = [
            'firstname' => [
                'fill-firstname' => function ($f) {
                    return empty($f);
                },
            ],
            'lastname' => [
                'fill-lastname' => function ($f) {
                    return empty($f);
                },
            ],
            'email' => [
                'format-email' => function ($f) {
                    $email_pattern = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';

                    return !preg_match($email_pattern, $f);
                },
                'fill-email' => function ($f) {
                    return empty($f);
                },
            ],
            'phonenumber' => [
                'phonenumber-length' => function ($f) {
                    return strlen($f) < 10;
                },
                'fill-phonenumber' => function ($f) {
                    return empty($f);
                },
            ],
        ];

        foreach ($form_fields as $form_field => $validators) {
            foreach ($validators as $error => $validator) {
                if ($validator($_POST[$form_field])) {
                    $error_messages[$form_field] = $error;
                }
            }
        }

        if (!empty($error_messages)) {
            $_SESSION['error_messages'] = $error_messages;
            Route::redirect('/checkout/account');
        }

        //delete old error messages
        unset($_SESSION['error_messages']);

        Route::redirect('/checkout/address');
    }


    public static function storeShippingInfo()
    {
        //save old data and merge new data
        $data = $_POST;
        unset($data['submit']);
        $_SESSION['form'] = array_merge($_SESSION['form'], $data);

        //generate error messages
        unset($_SESSION['error_messages']);
        $error_messages = [];
        $form_fields = [
            'postcode' => [
                'fill-postcode' => function ($f) {
                    return empty($f);
                },
            ],
            'housenmr' => [
                'fill-housenmr' => function ($f) {
                    return empty($f);
                },
            ],
            'shipping' => [
                'fill-shipping' => function ($f) {
                    return empty($f);
                },
            ],
            'delivery' => [
                'fill-delivery' => function ($f) {
                    return empty($f);
                },
            ],
        ];

        foreach ($form_fields as $form_field => $validators) {
            foreach ($validators as $error => $validator) {
                if ($validator($_POST[$form_field])) {
                    $error_messages[$form_field] = $error;
                }
            }
        }

        if (empty($_POST["postcode"]) || empty($_POST["housenmr"]) || empty($_POST["shipping"]) || empty($_POST["delivery"])) {
            $_SESSION['error_messages'] = $error_messages;
            Route::redirect('/checkout/address');
        }

        //delete old error messages
        unset($_SESSION['error_messages']);

        Route::redirect('/checkout/pay');
    }


    public static function checkAccountInfo()
    {
        //check if info is not empty
        $form = $_SESSION['form'];
        if (empty($form)) return;
        if (empty($form['firstname']) || empty($form['lastname']) || empty($form['email']) || empty($form['phonenumber'])) {
            return Route::redirect('/checkout/account');
        }
    }

    public static function checkAddressInfo()
    {
        //check if info is not empty
        $form = $_SESSION['form'];
        if (isset($form)) {
            if (empty($form["firstname"]) || empty($form["lastname"]) || empty($form["email"]) || empty($form["phonenumber"]) || empty($form["postcode"]) || empty($form["housenmr"]) || empty($form["shipping"])) {
                Route::redirect('/checkout/address');
            }
        } else {
            Route::redirect('/checkout/account');
        }
    }


    public static function noItemsInCart()
    {
        //test if there are items in cart and redirect if necessery 
        if (!isset($_SESSION['cart']['products']) || empty($_SESSION['cart']['products']) || array_sum($_SESSION['cart']['products']) < 1) {
            Route::redirect('/cart');
        }
    }

    public static function complete()
    {
        self::noItemsInCart();
        self::checkAccountInfo();
        self::checkAddressInfo();
        if (!isset($_SESSION['payment_id'])) return Route::redirect('/cart');

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_uGtVRSpdytPa7S86RVAzcT2SeAmc5C");
        $payment_id = $_SESSION['payment_id'];
        try {
            $payment = $mollie->payments->get($payment_id);
            if ($payment->isPaid()) {
                self::sendData();
                Checkout::CompletePage();
            } else {
                Route::redirect('/index');
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }

    public static function CompletePage()
    {
        $arg = [];
        $images = '';

        $products = $_SESSION['cart']['products'];

        foreach ($products as $id => $qty) {

            $product = DB::execute($GLOBALS['q']['product'], [$id]);

            $images = DB::execute($GLOBALS['q']['product-images'], [$id]);

            $arg[$id] = [
                'qty' => $qty,
                'product' => $product,
                'images' => $images
            ];
        }
        unset($_SESSION['cart']);

        View::show('checkout/complete', $arg);
    }


    public static function sendData()
    {
        //set variables
        $form = $_SESSION['form'];
        $email = $form['email'];
        $fullname = $form['firstname'] . " " . $form['lastname'];
        $phonenumber = $form['phonenumber'];
        $zipcode = $form['postcode'];
        $housenmr = $form['housenmr'];
        $shipping = $form['shipping'];
        $delivery = $form['delivery'];

        $totalitems = array_sum($_SESSION['cart']['products']);
        $totalchilleritems = 0;

        $dateToday = date("Y-m-d") . " " . date("h:i:sa");
        $datetodayonly = date("Y-m-d");
        $deliveryInstructions = $form['postcode'] . " " . $form['housenmr'];

        //check new orderID
        $orderIDMax = DB::execute('SELECT MAX(OrderID)+1 AS orderid FROM Orders')[0]->orderid; //Creer hoogste order ID

        // create new invoice id
        $invoiceIDMax = DB::execute('SELECT MAX(InvoiceID)+1 AS invoiceid FROM Invoices')[0]->invoiceid; //Creer hoogste invoice ID

        //add user to db
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $id = $_SESSION['user']->PersonID;
        } else {
            $user = isset(DB::execute('SELECT * FROM people WHERE EmailAddress = ?', [$email])[0]);
            if (empty($user)) {
                //send account information to people table
                DB::execute($GLOBALS['q']['set-people-info'], [$fullname, $fullname, $fullname, $email, $phonenumber, $dateToday]);
                $user = DB::execute('SELECT PersonID FROM people WHERE EmailAddress = ?', [$email])[0];
                $id = $user->PersonID;
                DB::execute($GLOBALS['q']['set-customer-info'], [$id, $fullname, $id, $id, $datetodayonly, $phonenumber, $deliveryInstructions, $zipcode, $deliveryInstructions, $zipcode, $dateToday]);
            } else {
                $user = DB::execute('SELECT * FROM people WHERE EmailAddress = ?', [$email])[0];
                if (empty($user->PhoneNumber)) {
                    DB::execute('UPDATE people SET FullName = ?, PhoneNumber = ? WHERE EmailAddress = ?', [$fullname, $phonenumber, $email]);
                    print($user);
                    $id = $user->PersonID;
                } else {
                    $id = $user->PersonID;
                }
            }
        }

        //add address to db
        $checkaddress = DB::execute('SELECT * FROM peopleaddress WHERE peopleid = ? AND zipcode = ? AND housenmr = ?', [$id, $zipcode, $housenmr]);
        if (empty($checkaddress)) {
            //send address information to peopleaddres table
            DB::execute($GLOBALS['q']['set-people-address'], [$id, $zipcode, $housenmr]);
        }

        //get chiller items
        foreach ($_SESSION['cart']['products'] as $key => $value) {
            $productInfo = DB::execute($GLOBALS['q']['get-product-info'], [$key])[0];

            if ($productInfo->IsChillerStock === 1) {
                $totalchilleritems += $value;
            }
        }

        $totaldryitems = $totalitems - $totalchilleritems;
        DB::execute($GLOBALS['q']['set-order-info'], [$orderIDMax, $id, $dateToday, $deliveryInstructions, $delivery, $datetodayonly]);
        DB::execute($GLOBALS['q']['set-invoice-details'], [$invoiceIDMax, $id, $id, $orderIDMax, $datetodayonly, $deliveryInstructions, $totaldryitems, $totalchilleritems, $dateToday]);

        //get info and send info of each product in cart
        foreach ($_SESSION['cart']['products'] as $key => $value) {
            $productInfo = DB::execute($GLOBALS['q']['get-product-info'], [$key])[0];
            $itemname = $productInfo->Stockitemname;
            $package = $productInfo->UnitpackageID;
            $description = $productInfo->SearchDetails;
            $taxrate = $productInfo->Taxrate;
            if (!empty($productInfo->DiscountPrice)) {
                $recommendedprice = $productInfo->DiscountPrice;
            } else {
                $recommendedprice = $productInfo->RecommendedRetailPrice;
            }

            //Total amount excluding tax
            $totalpriceexcl = $value * $recommendedprice;

            //Tax amount
            $taxamount = ($totalpriceexcl * $taxrate) / 100;

            //Total amount including tax
            $totalpriceincl = $totalpriceexcl + $taxamount;

            //send order information to orderlines table
            DB::execute($GLOBALS['q']['set-product-info'], [$orderIDMax, $key, $description, $package, $value, $recommendedprice, $taxrate, $dateToday]);

            //send order information to invoicelines table
            $InvoiceLineIDMax = DB::execute('SELECT MAX(InvoiceLineID)+1 AS invoicelineid FROM invoicelines')[0]->invoicelineid; //Creer hoogste invoiceline ID
            DB::execute($GLOBALS['q']['set-invoicelines-details'], [$InvoiceLineIDMax, $invoiceIDMax, $key, $description, $package, $value, $recommendedprice, $taxrate, $taxamount, $totalpriceincl, $dateToday]);

            //update product stock
            DB::execute($GLOBALS['q']['set-new-stock'], [$value, $key, $key]);
        }
    }
}
