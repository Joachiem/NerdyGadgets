<?php

class User
{
    /**
     * Order history Data, en Orderlines data opvragen
     */
    public static function history()
    {
        //$_SESSION['user']['id'] = 1059;
        $arg = new stdClass();

        if (empty($_SESSION['user']['id'])) return    Route::redirect('/login');

        $arg->orders = DB::execute('SELECT OrderID, OrderDate, CustomerPurchaseOrderNumber FROM orders
        WHERE CustomerID = ? ', [$_SESSION['user']['id']]);


        foreach ($arg->orders as $order) {
            $order->lines = DB::execute('SELECT * FROM orderlines WHERE orderID= ?', [$order->OrderID]);
        }
        View::show('user/history', $arg);
    }
}
