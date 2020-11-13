<?php
class Route
{
    /**
     * route class for routing
     */
    public static $validRoutes = array();

    /**
     * GET - READ
     * get route for reading records or showing page
     * @param string $route
     * @param mixed $callback
     */
    public static function get($route, $callback)
    {
        // $routeArray = explode('/', $route);
        // print_r($routeArray);
        // return $callback($_GET['url']);

        self::call($route, $callback, 'GET');
    }

    /**
     * POST - CREATE
     * post route for creating records
     * @param string $route
     * @param mixed $callback
     */
    public static function post($route, $callback)
    {
        self::call($route, $callback, 'POST');
    }

    /**
     * PUT - UPDATE
     * put route for updating records
     * @param string $route
     * @param mixed $callback
     */
    public static function put($route, $callback)
    {
        self::call($route, $callback, 'PUT');
    }

    /**
     * PATCH - UPDATE
     * patch route for updating records
     * @param string $route
     * @param mixed $callback
     */
    public static function patch($route, $callback)
    {
        self::call($route, $callback, 'PATCH');
    }

    /**
     * DELETE - DELETE
     * delete route for deleting records
     * @param string $route
     * @param mixed $callback
     */
    public static function delete($route, $callback)
    {
        self::call($route, $callback, 'DELETE');
    }

    /**
     * show error page on a 404
     * @param string $error
     * @param mixed $callback
     * @return mixed $callback()
     */
    public static function error($error, $callback)
    {
        if (!in_array($_GET['url'], self::$validRoutes)) {
            return $callback();
        }
    }

    /**
     * redirect the page if given url is met 
     * @param string $from
     * @param string $to
     */
    public static function redirect($from, $to)
    {
        if ($_GET['url'] === $from) {
            self::change_url($to);
        }
    }

    /**
     * goes one page back
     */
    public static function back()
    {
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    /**
     * change the url of the page
     * @param string $url
     */
    private static function change_url($url)
    {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/" . $url);
        die();
    }

    /**
     * check the given url for end '/'
     * and remove that '/'
     * @param string $url
     * @return string $url
     */
    private static function check_url($url)
    {
        if (substr($url, -1) === '/') {
            $url = substr($url, 0, -1);
            self::change_url($url);
        }

        return '/' . $url;
    }

    /**
     * check the route and the current page
     * if true return the given callback
     * @param string $route
     * @param mixed $callback
     * @param string $type
     * @return mixed $callback()
     */
    private static function call($route, $callback, $type)
    {
        self::$validRoutes[] = $route;
        $url = self::check_url($_GET['url']);
        if ($_SERVER['REQUEST_METHOD'] === $type && $url === $route) return $callback();
    }
}
