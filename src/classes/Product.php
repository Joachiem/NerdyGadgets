<?php

class Product
{
    /**
     * index page
     */
    public static function index()
    {
        $arg = new stdClass();

        $query_build_result = "";

        $arg->page_number = isset($_GET['page_number']) ? $_GET['page_number'] : 0;
        $search_string = isset($_GET['search']) ? $_GET['search'] : "";
        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : "";


        if (isset($_GET['sort'])) {
            $sort_on_page = $_GET['sort'];
            $_SESSION["sort"] = $_GET['sort'];
        } elseif (isset($_SESSION["sort"])) {
            $sort_on_page = $_SESSION["sort"];
        } else {
            $sort_on_page = "price_low_high";
            $_SESSION["sort"] = "price_low_high";
        }

        if (isset($_GET['products_on_page'])) {
            $products_on_page = $_GET['products_on_page'];
            $_SESSION['products_on_page'] = $_GET['products_on_page'];
        } elseif (isset($_SESSION['products_on_page'])) {
            $products_on_page = $_SESSION['products_on_page'];
        } else {
            $products_on_page = 25;
            $_SESSION['products_on_page'] = 25;
        }

        $offset = $arg->page_number * $products_on_page;

        $sort_options = [
            'price_low_high' => 'SellPrice',
            'price_high_low' => 'SellPrice DESC',
            'name_low_high' => 'StockItemName',
            'name_high_low' => 'StockItemName DESC'
        ];

        $sort = $sort_options[$sort_on_page] ?: 'SellPrice';

        $search_values = explode(' ', $search_string);




        if ($search_string != '') {
            for ($i = 0; $i < count($search_values); $i++) {
                if ($i != 0) {
                    $query_build_result .= "AND ";
                }
                $query_build_result .= "SI.SearchDetails LIKE '%$search_values[$i]%' ";
            }
            if ($query_build_result != "") {
                $query_build_result .= " OR ";
            }
            if ($search_string != '' || $search_string != null) {
                $query_build_result .= "SI.StockItemID ='$search_string'";
            }
        }


        if ($category_id === '') {

            if ($query_build_result !== "") {
                $query_build_result = "WHERE " . $query_build_result;
            }

            $arg->products = DB::execute($GLOBALS['q']['filterd-products'], [$products_on_page, $offset], [$query_build_result, $sort]);
            $arg->ammount = DB::execute($GLOBALS['q']['count-products'], [], [$query_build_result])[0]->ammount;
        } else {

            if ($query_build_result != "") {
                $query_build_result .= " AND ";
            }

            $arg->products = DB::execute($GLOBALS['q']['filterd-products-catagory'], [$category_id, $products_on_page, $offset], [$query_build_result, $sort]);
            $arg->ammount = DB::execute($GLOBALS['q']['count-products-catagory'], [$category_id], [$query_build_result])[0]->ammount;
        }

        if (isset($arg->ammount)) {
            $arg->ammount = ceil($arg->ammount / $products_on_page);
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
