<?php

class Product
{
    /**
     * index page
     */
    public static function index()
    {
        $arg = new stdClass();
        $arg->field_values = new stdClass();
        $query_build_result = '';

        $fields = [
            'products_on_page' => [
                'default' => 25,
                'accepted' => [25, 50, 75]
            ],
            'sort_on_page' => [
                'default' => 'most_clicked',
                'accepted' => [
                    'most_clicked',
                    'price_low_high',
                    'price_high_low',
                    'name_low_high',
                    'name_high_low'
                ]
            ]
        ];

        foreach ($fields as $name => $field) {

            if (isset($_GET[$name])) $_SESSION[$name] = $_GET[$name];
            if (isset($_SESSION[$name])) $val = $_SESSION[$name];

            $val = isset($val) ? $val : $field['default'];
            $arg->field_values->$name = in_array($val, $field['accepted']) ? $val : $field['default'];
        }

        $arg->field_values->page_number = isset($_GET['page_number']) ? $_GET['page_number'] : 0;
        $arg->field_values->search = isset($_GET['search']) ? $_GET['search'] : '';
        $arg->field_values->category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';


        $offset = $arg->field_values->page_number * $arg->field_values->products_on_page;

        $sort_options = [
            'most_clicked' => 'ClickedON',
            'price_low_high' => 'SellPrice',
            'price_high_low' => 'SellPrice DESC',
            'name_low_high' => 'StockItemName',
            'name_high_low' => 'StockItemName DESC'
        ];

        $sort = $sort_options[$arg->field_values->sort_on_page] ?: 'SellPrice';

        $search_values = explode(' ', $arg->field_values->search);


        if ($arg->field_values->search != '') {
            for ($i = 0; $i < count($search_values); $i++) {
                if ($i != 0) {
                    $query_build_result .= 'AND ';
                }
                $search_value = filter_var($search_values[$i], FILTER_SANITIZE_STRING);
                $query_build_result .= "SI.SearchDetails LIKE '%$search_value%' ";
            }
            if ($query_build_result !== '') {
                $query_build_result .= ' OR ';
            }
            if ($arg->field_values->search != '' || $arg->field_values->search != null) {
                $query_build_result .= "SI.StockItemID ='" . $arg->field_values->search . "'";
            }
        }


        if ($arg->field_values->category_id  === '') {

            if ($query_build_result !== '') {
                $query_build_result = 'WHERE ' . $query_build_result;
            }

            $arg->products = DB::execute($GLOBALS['q']['filterd-products'], [$arg->field_values->products_on_page, $offset], [$query_build_result, $sort]);
            $arg->ammount = DB::execute($GLOBALS['q']['count-products'], [], [$query_build_result])[0]->ammount;
        } else {

            if ($query_build_result !== '') {
                $query_build_result .= ' AND ';
            }

            $arg->products = DB::execute($GLOBALS['q']['filterd-products-catagory'], [$arg->field_values->category_id, $arg->field_values->products_on_page, $offset], [$query_build_result, $sort]);
            $arg->ammount = DB::execute($GLOBALS['q']['count-products-catagory'], [$arg->field_values->category_id], [$query_build_result])[0]->ammount;
        }

        if (isset($arg->ammount)) {
            $arg->ammount = ceil($arg->ammount / $arg->field_values->products_on_page);
        }

        View::show('product/index', $arg);
    }

    /**
     * view page
     * @param string $id
     */
    public static function view($id)
    {
        if (!$id) View::show('error/404');

        DB::execute($GLOBALS['q']['product-clicked'], [$id]);

        $product = DB::execute($GLOBALS['q']['product'], [$id])[0];

        $images = DB::execute($GLOBALS['q']['product-images'], [$id]);
        $temp = DB::execute('SELECT Temperature from coldroomtemperatures where ColdRoomSensorNumber = 5');
        $product->reviews = DB::execute('SELECT * from reviews r join people p using(PersonID) where StockItemID = ? order by Date desc', [$id]);
        $product->review = false;
        $product->verified_buyer = true;

        if (isset($_SESSION['user']->PersonID)) {
            $old_review = DB::execute('SELECT * from reviews where PersonID = ? and StockItemID = ?', [$_SESSION['user']->PersonID, $id]);
            $bought_product = DB::execute('SELECT OrderID, OrderDate, CustomerPurchaseOrderNumber FROM orders o join orderlines ol using(OrderID)
        WHERE o.CustomerID = ? and ol.StockItemID = ?', [$_SESSION['user']->PersonID, $id]);

            if (!empty($bought_product) && empty($old_review)) $product->review = true;
        }

        if ($images) $product->images = $images;
        if ($temp) $product->temp = $temp[0]->Temperature;

        View::show('product/view', $product);
    }
}
