<?php

namespace Scandiweb\Product\Validation;

use Scandiweb\Product\Request\Request;

class Validation
{

    /**
     * @param string $key
     * @param string $method
     * @return void
     *
     */
    public static function required($key, $method = "POST")
    {
        if (Request::has($method, $key)) {
            return true;
        }
        return "Please, submit required data";
    }
}
