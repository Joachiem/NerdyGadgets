<?php
class Cart
{
    /**
     * index page
     * @param mixed $callback
     */
    public static function index()
    {
        $arg = $_SESSION['cart'];
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
