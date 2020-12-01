<?php

class Checkout
{
    public static function paying()
    {
        self::sendData();
        Pay::mollieCreate(Cart::totalPrice(), 1111);
    }

    public static function storeUserInfo()
    {
        //check if submit button has been pressed
        if (!isset($_POST["submit"])) return;

        //save old data and merge new data
        $data = $_POST;
        unset($data['submit']);
        if (empty($_SESSION['form'])) {
            $_SESSION['form'] = $data;
        } else {
            $_SESSION['form'] = array_merge($_SESSION['form'], $data);
        }

        //generate error messages
        unset($_SESSION['form']['error_messages']);
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

        //delete old error messages
        unset($_SESSION['form']['error_messages']);

        Route::redirect('/checkout/account', '/checkout/address');
    }


    public static function storeShippingInfo()
    {
        //check if submit button has been pressed
        if (!isset($_POST["submit"])) return;

        //save old data and merge new data
        $data = $_POST;
        unset($data['submit']);
        $_SESSION['form'] = array_merge($_SESSION['form'], $data);

        //generate error messages
        unset($_SESSION['form']['error_messages']);
        $error_messages = [];
        $form_fields = [
            'postcode' => 'Postcode invullen',
            'housenmr' => 'Huisnummer invullen',
            'shipping' => 'Verzending invullen',
            'delivery' => 'Bezorging invullen'
        ];

        if (empty($_POST["postcode"]) || empty($_POST["housenmr"]) || empty($_POST["shipping"]) || empty($_POST["delivery"])) {
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

        //delete old error messages
        unset($_SESSION['form']['error_messages']);

        Route::redirect('/checkout/address', '/checkout/pay');
    }


    public static function checkAccountInfo()
    {
        //check if info is not empty
        $form = $_SESSION['form'];
        if (isset($form)) {

            if (empty($form["firstname"]) || empty($form["lastname"]) || empty($form["email"]) || empty($form["phonenumber"])) {
                Route::redirect('/checkout/address', '/checkout/account');
            }
        } else {
            Route::redirect('/checkout/address', '/checkout/account');
        }
    }

    public static function checkaddressInfo()
    {
        //check if info is not empty
        $form = $_SESSION['form'];
        if (isset($form)) {

            if (empty($form["firstname"]) || empty($form["lastname"]) || empty($form["email"]) || empty($form["phonenumber"]) || empty($form["postcode"]) || empty($form["housenmr"]) || empty($form["shipping"])) {
                Route::redirect('/checkout/pay', '/checkout/address');
            }
        } else {
            Route::redirect('/checkout/pay', '/checkout/address');
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
        $arg = [];
        $images = '';

        if (isset($_SESSION['cart']['products'])) {
            $products = $_SESSION['cart']['products'];

            $arg = [];

            foreach ($products as $id => $qty) {

                $product = DB::execute($GLOBALS['q']['product'], [$id]);

                $images = DB::execute($GLOBALS['q']['product-images'], [$id]);

                $arg[$id] = [
                    'qty' => $qty,
                    'product' => $product,
                    'images' => $images
                ];
            }
        }

        View::show('checkout/complete', $arg);
    }

    public static function sendData()
    {
        echo "<pre>";
        //set variables
        $form = $_SESSION['form'];
        $email = $form['email'];
        $fullname = $form['firstname'] . " " . $form['lastname'];
        $phonenumber = $form['phonenumber'];
        $zipcode = $form['postcode'];
        $housenmr = $form['housenmr'];
        $shipping = $form['shipping'];
        $delivery = $form['delivery'];

        $totalitems = array_sum($_SESSION['cart']);
        $totalchilleritems = 0;

        $dateToday = date("d/m/Y") . " " . date("h:i:sa");
        $datetodayonly = date("d/m/Y");
        $deliveryInstructions = $form['postcode'] . " " . $form['housenmr'];

        //check new orderID
        $orderIDMax = DB::execute('SELECT MAX(OrderID)+1 AS orderid FROM Orders')[0]->orderid; //Creer hoogste order ID

        // create new invoice id
        $invoiceIDMax = DB::execute('SELECT MAX(InvoiceID)+1 AS invoiceid FROM Invoices')[0]->invoiceid; //Creer hoogste invoice ID
        
        //add user to db
        $user = DB::execute('SELECT * FROM people WHERE EmailAddress = ?', [$email])[0];
        if (empty($user)) {
            //send account information to people table
            $setPeopleInfo = DB::execute($GLOBALS['q']['set-people-info'], [$fullname, $email, $phonenumber, $dateToday]);
            $user = DB::execute('SELECT PersonID FROM people WHERE EmailAddress = ?', [$email])[0];
            $id = $user->PersonID;
            $setCustomerInfo = DB::execute($GLOBALS['q']['set-customer-info'], [$id, $fullname, $id, $id, $datetodayonly, $phonenumber, $deliveryInstructions, $zipcode, $deliveryInstructions, $zipcode, $dateToday]);
        } else {
            $id = $user->PersonID;
        }

        //add address to db
        $checkaddress = DB::execute('SELECT * FROM peopleaddress WHERE peopleid = ? AND zipcode = ? AND housenmr = ?', [$id, $zipcode, $housenmr]);
        if (empty($checkaddress)) {
            //send address information to peopleaddres table
            $setPeopleAddress = DB::execute($GLOBALS['q']['set-people-address'], [$id, $zipcode, $housenmr]);
        }
        
        //get chiller items
        foreach ($_SESSION['cart']['products'] as $key => $value) {
            $productInfo = DB::execute($GLOBALS['q']['get-product-info'], [$key])[0];

            if ($productInfo->IsChillerStock === 1) {
                $totalchilleritems += $value;
            }
        }
        
        $totaldryitems = $totalitems - $totalchilleritems;

        $setOrderInfo = DB::execute($GLOBALS['q']['set-order-info'], [$orderIDMax, $id, $dateToday, $datetodayonly]);
        $setInvoiceDetails = DB::execute($GLOBALS['q']['set-invoice-details'], [$invoiceIDMax, $id, $id, $orderIDMax, $datetodayonly ,$totaldryitems, $deliveryInstructions, $totalchilleritems, $dateToday]);

        //get info and send info of each product in cart
        foreach ($_SESSION['cart']['products'] as $key => $value) {
            $productInfo = DB::execute($GLOBALS['q']['get-product-info'], [$key])[0];
            $itemname = $productInfo->Stockitemname;
            $package = $productInfo->UnitpackageID;
            $description = $productInfo->SearchDetails;
            $taxrate = $productInfo->Taxrate;
            $recommendedprice = $productInfo->RecommendedRetailPrice;

            //Total amount excluding tax
            $totalpriceexcl = $value * $recommendedprice;

            //Tax amount
            $taxamount = ($totalpriceexcl * $taxrate) / 100;

            //Total amount including tax
            $totalpriceincl = $totalpriceexcl + $taxamount;
            
            //send order information to orderlines table
            $setProductInfo = DB::execute($GLOBALS['q']['set-product-info'], [$orderIDMax, $key, $description, $package, $value, $recommendedprice, $taxrate, $dateToday]);

            //send order information to invoicelines table
            $setProductInfo = DB::execute($GLOBALS['q']['set-invoicelines-details'], [$invoiceIDMax, $key, $description, $package, $value, $recommendedprice, $taxrate, $taxamount, $totalpriceincl, $dateToday]);
        }
    }
}
