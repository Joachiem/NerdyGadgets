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
     * @param mixed $function
     */
    public static function get($route, $function)
    {
        self::call($route, $function, 'GET');
    }

    /**
     * POST - CREATE
     * post route for creating records
     * @param string $route
     * @param mixed $function
     */
    public static function post($route, $function)
    {
        self::call($route, $function, 'POST');
    }

    /**
     * PUT - UPDATE
     * put route for updating records
     * @param string $route
     * @param mixed $function
     */
    public static function put($route, $function)
    {
        self::call($route, $function, 'PUT');
    }

    /**
     * PATCH - UPDATE
     * patch route for updating records
     * @param string $route
     * @param mixed $function
     */
    public static function patch($route, $function)
    {
        self::call($route, $function, 'PATCH');
    }

    /**
     * DELETE - DELETE
     * delete route for deleting records
     * @param string $route
     * @param mixed $function
     */
    public static function delete($route, $function)
    {
        self::call($route, $function, 'DELETE');
    }

    /**
     * show error page on a 404
     * @param string $error
     * @param mixed $function
     * @return mixed $function()
     */
    public static function error($error, $function)
    {
        if (!in_array($_GET['url'], self::$validRoutes)) {
            return $function();
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

        return $url;
    }

    /**
     * check the route and the current page
     * if true return the given function
     * @param string $route
     * @param mixed $function
     * @param string $type
     * @return mixed $function()
     */
    private static function call($route, $function, $type)
    {
        self::$validRoutes[] = $route;
        $url = self::check_url($_GET['url']);
        if ($_SERVER['REQUEST_METHOD'] === $type && $url === $route) return $function();
    }
}
