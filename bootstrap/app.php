<?php
require "./Routes/router.php";
use Scandiweb\Product\Request\Request;
use Scandiweb\Product\Response\Response;
use Scandiweb\Product\Router\Route;

class Application
{
    
    /**
     * Static: is to access the method or property from class without make new object from this class
     */
    /**
     * Run the application
     * @return void
     */
    public static function run()
    {
        Request::handle();

        $data = Route::handle();

        Response::output($data);
    }
}
