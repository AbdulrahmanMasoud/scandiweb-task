<?php

namespace Scandiweb\Product\Validation;

use Scandiweb\Product\Request\Request;

class Validation
{

    /**
     * @param string $key
     * @return void
     *
     */
    public static function required($key, $method="POST")
    {
        if (Request::has($method, $key)) {
            return true;
        }
        return "Please, submit required data";
    }

    /**
     * @param array $keys
     * @return void
     *
     */
    public static function validator(array $keys)
    {
        foreach ($keys as $key) {
            if (empty(Request::post($key))) {
                return "Please, submit required data";
                break;
            }
        }
    }
}
