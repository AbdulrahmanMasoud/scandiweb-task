<?php
namespace Scandiweb\Product\Request;

class Request
{
    /**
     * Base Url
     *
     * @var $base_url
     */
    private static $base_url;

    /**
    * Url
    *
    * @var $url
    */
    private static $url;

    /**
    * Full Url
    *
    * @var $full_url
    */
    private static $full_url;

    /**
    * Query String
    *
    * @var $query_string
    */
    private static $query_string;

    /**
    * Script Name
    *
    * @var $script_name
    */
    private static $script_name;


    /**
     * Handle Request
     *
     *@return void
     */

    public static function handle()
    {
        static::$script_name = str_replace('\\', '', dirname($_SERVER['SCRIPT_NAME']));
        static::setBaseUrl();
        static::setUrl();
    }

    /**
     * Set Base Url
     *
     * @return void
     */
    public static function setBaseUrl()
    {
        $protocol       =  $_SERVER['REQUEST_SCHEME'] . '://';
        $host           =  $_SERVER['HTTP_HOST'];
        $script_name    = static::$script_name;

        static::$base_url = $protocol . $host . $script_name;
    }

    /**
    * get base url
    *
    * @return string
    */
    public static function baseUrl()
    {
        return static::$base_url;
    }

    /**
     * Set Url
     *
     * @return void
     */
    public static function setUrl()
    {
        $request_uri = urldecode($_SERVER['REQUEST_URI']);
        $request_uri = rtrim(preg_replace("#^" . static::$script_name. '#', '', $request_uri), '/');

        $query_string = '';

        static::$full_url = $request_uri;
        if (strpos($request_uri, '?') !== false) {
            list($request_uri, $query_string) = explode('?', $request_uri);
        }

        static::$url = $request_uri?:'/';
        static::$query_string = $query_string;
    }

    /**
    * Get url
    *
    * @return string
    */
    public static function url()
    {
        return static::$url;
    }


    /**
     * get method
     *
     * @return string
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * check the request has key
     *
     * @param array $type
     * @param string $key
     * @return bool
     */
    public static function has($type, $key)
    {
        // array_filter(Request::all())
        return array_key_exists($key, static::all());
    }

    /**
     * get value from the request
     *
     * @param string $key
     * @param array $type
     * @return bool
     */
    public static function value($key, array $type = null)
    {
        $type = $type ?? $_REQUEST;
        return static::has($type, $key) ? $type[$key] : null;
    }


    /**
     * get datat from get request
     *
     * @param string $key
     * @return string $value
     */
    public static function get($key)
    {
        return static::value($key, $_GET);
    }

    /**
     * get datat from post request
     *
     * @param string $key
     * @return string $value
     */
    public static function post($key)
    {
        return static::value($key, $_POST);
    }

    /**
     * set value to the request
     *
     * @param string $key
     * @param string $value
     * @return string $value
     */
    public static function set($key, $value)
    {
        $_REQUEST[$key] = $value;
        $_POST[$key] = $value;
        $_GET[$key] = $value;
        return $value;
    }

    /**
     * get previous page
     *
     * @return string
     */
    public static function previous()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    /**
     * get all request
     *
     * @return array
     */
    public static function all()
    {
        return $_REQUEST;
    }
}
