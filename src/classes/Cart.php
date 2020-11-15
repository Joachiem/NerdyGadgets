<?php
class Cart
{
    /**
     * index page
     * @param mixed $callback
     */
    public static function index()
    {
        View::show('/cart')
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
