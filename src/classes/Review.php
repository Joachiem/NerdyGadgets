<?php

class Review
{
    /**
     * show
     */
    public static function show()
    {
        $reviews = DB::execute('SELECT * from reviews r left join people p using(PersonID) where StockItemID is null order by Date desc');

        View::show('review', $reviews);
    }
    /**
     * show
     */
    public static function addToSite()
    {
        Auth::isLogin();

        $error_messages = [];
        unset($_SESSION['review']['error_messages']);

        $form_fields = [
            'rating' => [
                'fill-rating' => function ($f) {
                    return empty($f);
                },
            ],
            'title' => [
                'fill-title' => function ($f) {
                    return empty($f);
                },
            ],
            'review' => [
                'fill-review' => function ($f) {
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

        $_SESSION['review']['form'] = $_POST;

        if ($error_messages) {
            $_SESSION['review']['error_messages'] = $error_messages;
            return Route::back();
        }

        DB::execute('INSERT INTO `reviews`(`PersonID`, `ReviewTitle`, `Rating`, `Review`, `Date`) VALUES (?,?,?,?,?)', [$_SESSION['user']->PersonID, $_POST['title'], $_POST['rating'], $_POST['review'], date('Y-m-d h:i:sa')]);
        unset($_SESSION['review']);

        return Route::back();
    }
    /**
     * switch the language to nl
     */
    public static function add()
    {
        Auth::isLogin();

        if (empty($_GET['id'])) return;
        $id = $_GET['id'];

        $old_review = DB::execute('SELECT * from reviews where PersonID = ? and StockItemID = ?', [$_SESSION['user']->PersonID, $id]);
        $bought_product = DB::execute('SELECT OrderID, OrderDate, CustomerPurchaseOrderNumber FROM orders o join orderlines ol using(OrderID)
        WHERE o.CustomerID = ? and ol.StockItemID = ?', [$_SESSION['user']->PersonID, $id]);

        if (empty($bought_product) || !empty($old_review)) return Route::back();

        $error_messages = [];
        unset($_SESSION['review']['error_messages']);

        $form_fields = [
            'rating' => [
                'fill-rating' => function ($f) {
                    return empty($f);
                },
            ],
            'title' => [
                'fill-title' => function ($f) {
                    return empty($f);
                },
            ],
            'review' => [
                'fill-review' => function ($f) {
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

        $_SESSION['review']['form'] = $_POST;

        if ($error_messages) {
            $_SESSION['review']['error_messages'] = $error_messages;
            return Route::back();
        }

        DB::execute('INSERT INTO `reviews`(`StockItemID`, `PersonID`, `ReviewTitle`, `Rating`, `Review`, `Date`) VALUES (?,?,?,?,?,?)', [$id, $_SESSION['user']->PersonID, $_POST['title'], $_POST['rating'], $_POST['review'], date('Y-m-d  h:i:sa')]);
        unset($_SESSION['review']);

        return Route::back();
    }
}
