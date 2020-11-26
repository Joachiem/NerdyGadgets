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
        // print $_GET['url'];
        if (!in_array(self::add_slash_url($_GET['url']), self::$validRoutes)) {
            return $callback();
        }
    }


    /**
     * redirect the page or rediret if p1 is met
     * @param string $to/$from
     * @param string $to optioneel 
     */
    public static function redirect($p1, $p2 = false)
    {
        if (!$p2) return self::change_url($p1);

        if (self::add_slash_url($_GET['url']) === $p1) {
            return self::change_url($p2);
        }
    }


    /**
     * change the url of the page
     * @param string $url
     */
    private static function change_url($url)
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '' . $url);
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
            self::change_url(self::add_slash_url($url));
        }

        return self::add_slash_url($url);
    }


    /**
     * get the url of the page
     * @param string $url
     * @return string $url
     */
    private static function add_slash_url($url)
    {
        return '/' . $url;
    }


    /**
     * go one page back
     */
    public static function back()
    {
        if (isset($_SERVER["HTTP_REFERER"])) {
            header('Location: ' . $_SERVER["HTTP_REFERER"]);
        }
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
