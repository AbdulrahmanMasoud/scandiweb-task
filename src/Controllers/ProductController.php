<?php
namespace Scandiweb\Product\Controllers;

use Scandiweb\Product\Database\DB;
use Scandiweb\Product\Views\View;

class ProductController
{
    public function here($id)
    {
        $x= DB::table('blogs')->where('id', '>', '0')->first();
        echo "<pre>";
        var_dump($x);
        echo "</pre>";
        // return View::render("product", ['name'=>"Abdulrahman"]);
    }
}
