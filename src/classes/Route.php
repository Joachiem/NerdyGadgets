<?php
class Route
{
    public static $validRoutes = array();

    public static function get($route, $function)
    {
        self::$validRoutes[] = $route;
        self::call($route, $function, 'GET');
    }

    public static function post($route, $function)
    {
        self::$validRoutes[] = $route;
        self::call($route, $function, 'POST');
    }

    public static function put($route, $function)
    {
        self::$validRoutes[] = $route;
        self::call($route, $function, 'PUT');
    }

    public static function patch($route, $function)
    {
        self::$validRoutes[] = $route;
        self::call($route, $function, 'PATCH');
    }

    public static function delete($route, $function)
    {
        self::$validRoutes[] = $route;
        self::call($route, $function, 'DELETE');
    }

    private static function call($route, $function, $type)
    {
        if ($_SERVER['REQUEST_METHOD'] === $type && $_GET['url'] === $route) return $function();
    }
}
