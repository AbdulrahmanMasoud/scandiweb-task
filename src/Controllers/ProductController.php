<?php
namespace Scandiweb\Product\Controllers;

use Scandiweb\Product\Database\DB;
use Scandiweb\Product\Views\View;

class ProductController
{
    public function here($id)
    {
        return DB::table('blogs')->where('id', '=', '1')->getQuery();
        return View::render("product", ['name'=>"Abdulrahman"]);
    }
}
