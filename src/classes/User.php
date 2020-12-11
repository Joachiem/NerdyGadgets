<?php

class User
{
    /**
     * Order history Data, en Orderlines data opvragen
     */
    public static function history()
    {
        Auth::isLogin();
        $arg = new stdClass();

        $arg->orders = DB::execute('SELECT OrderID, OrderDate, CustomerPurchaseOrderNumber FROM orders
        WHERE CustomerID = ? ', [$_SESSION['user']->PersonID]);


        foreach ($arg->orders as $order) {
            $order->lines = DB::execute('SELECT * FROM orderlines WHERE orderID= ?', [$order->OrderID]);
        }

        View::show('user/history', $arg);
    }
}
