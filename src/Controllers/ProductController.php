<?php
namespace Scandiweb\Product\Controllers;

use Scandiweb\Product\Database\DB;
use Scandiweb\Product\Models\Product;
use Scandiweb\Product\Request\Request;
use Scandiweb\Product\Views\View;

class ProductController
{
    public function index()
    {
        $products = DB::table('blogs')->get();
        return View::render("product", ['products'=>$products]);
    }

    public function create()
    {
        return View::render("add-product");
    }

    public function store()
    {
        echo "<pre>";
        var_dump(Request::all());
        echo "</pre>";
    }
}
