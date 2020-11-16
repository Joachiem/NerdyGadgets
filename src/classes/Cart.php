<?php
class Cart
{
    /**
     * index page
     * @param mixed $callback
     */
    public static function index()
    {
        $arg = [];
        $images = '';

        if (isset($_SESSION['cart'])) {
            $products = $_SESSION['cart'];

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

        View::show('cart/index', $arg);
    }

    /**
     * index page
     * @param string $id
     */
    public static function add($id)
    {
        $_SESSION['cart'][$id] = 1;
    }

    /**
     * remove cart item
     * @param string $id
     */
    public static function remove($id)
    {
        $cart = $_SESSION['cart'];
        unset($cart[$id]);
        $_SESSION['cart'] = $cart;
    }

    /**
     * index page
     * @param mixed $callback
     */
    public static function increment($id)
    {
        $_SESSION['cart'][$id] += 1;
    }

    /**
     * index page
     * @param mixed $callback
     */
    public static function decrement($id)
    {
        $_SESSION['cart'][$id] -= 1;
    }
}
