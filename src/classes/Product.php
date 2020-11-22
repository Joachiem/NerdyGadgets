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
        $query_build_result = "";

        $fields = [
            'products_on_page' => [
                'default' => 25,
                'accepted' => [25, 50, 75]
            ],
            'sort_on_page' => [
                'default' => 'price_low_high',
                'accepted' => [
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
        $arg->field_values->search = isset($_GET['search']) ? $_GET['search'] : "";
        $arg->field_values->category_id = isset($_GET['category_id']) ? $_GET['category_id'] : "";


        $offset = $arg->field_values->page_number * $arg->field_values->products_on_page;

        $sort_options = [
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
                    $query_build_result .= "AND ";
                }
                $query_build_result .= "SI.SearchDetails LIKE '%$search_values[$i]%' ";
            }
            if ($query_build_result != "") {
                $query_build_result .= " OR ";
            }
            if ($arg->field_values->search != '' || $arg->field_values->search != null) {
                $query_build_result .= "SI.StockItemID ='" . $arg->field_values->search . "'";
            }
        }


        if ($arg->field_values->category_id  === '') {

            if ($query_build_result !== "") {
                $query_build_result = "WHERE " . $query_build_result;
            }

            $arg->products = DB::execute($GLOBALS['q']['filterd-products'], [$arg->field_values->products_on_page, $offset], [$query_build_result, $sort]);
            $arg->ammount = DB::execute($GLOBALS['q']['count-products'], [], [$query_build_result])[0]->ammount;
        } else {

            if ($query_build_result != "") {
                $query_build_result .= " AND ";
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

        if ($images) {
            $product->images = $images;
        }

        View::show('product/view', $product);
    }
}
