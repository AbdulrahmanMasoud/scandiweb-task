<?php
namespace Scandiweb\Product\Controllers;

use Scandiweb\Product\Views\View;

class ProductController
{
    public function here($id)
    {
        return View::render("product", ['name'=>"Abdulrahman"]);
    }
}
