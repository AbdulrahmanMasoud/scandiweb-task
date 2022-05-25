<?php

namespace Scandiweb\Product\Router;

use Scandiweb\Product\Request\Request;

class Route
{

     /**
     * All routes
     *
     * @var array $routes
     */
    private static $routes = [];

    /**
     * Add route
     *
     * @param string $method
     * @param string $uri
     * @param object|callback $callback
     */
    public static function add($method, $uri, $callback)
    {
        $uri = trim($uri, '/');
        $uri = $uri ?: '/';

        static::$routes[] = [
            'uri' => $uri,
            'callback'=> $callback,
            'method' => $method,
        ];
    }

    /**
     * add new get route
     *
     * @param string $uri
     * @param object|callback $callback
     */
    public static function get($uri, $callback)
    {
        static::add('GET', $uri, $callback);
    }

    /**
     * add new post route
     *
     * @param string $uri
     * @param object|callback $callback
     */
    public static function post($uri, $callback)
    {
        static::add('POST', $uri, $callback);
    }

    /**
      * Handle
      *
      * @return mixed
      */
    public static function handle()
    {
        $uri = Request::url();
        foreach (static::$routes as $route) {
            $matched = true;
            $route['uri'] = preg_replace('/\/{(.*?)}/', '/(.*?)', $route['uri']);
            $route['uri'] = '#^' . $route['uri'] . '$#';

            if (preg_match($route['uri'], $uri, $matches)) {
                array_shift($matches);
                $params = array_values($matches);
                foreach ($params as $param) {
                    if (strpos($param, '/')) {
                        $matched = false;
                    }
                }
                if ($route['method'] != Request::method()) {
                    $matched = false;
                }

                if ($matched == true) {
                    return static::invoke($route, $params);
                }
            }
        }
        die('not found');
    }

    /**
     * Invokde the route
     *
     * @param array $route
     * @param array $params
     */
    public static function invoke($route, $params = [])
    {
        $callback = $route['callback'];
        if (is_callable($callback)) {
            return call_user_func_array($callback, $params);
        } elseif (strpos($callback, '@') !== false) {
            list($controller, $method) = explode('@', $callback);
            $controller = 'Scandiweb\Product\Controllers\\' . $controller;
            if (class_exists($controller)) {
                $object = new $controller;
                if (method_exists($object, $method)) {
                    return call_user_func_array([$object, $method], $params);
                } else {
                    throw new \Exception("The method " . $method . " is not exists at " . $controller);
                }
            } else {
                throw new \Exception("class " . $controller . " is not found");
            }
        } else {
            throw new \Exception("Please provide valid callback function");
        }
    }
}
