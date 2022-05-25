<?php
namespace Scandiweb\Product\Controllers;

use Scandiweb\Product\Database\DB;
use Scandiweb\Product\Views\View;

class ProductController
{
    public function index()
    {
        $x= DB::table('blogs')->where('id', '>', '0')->first();
        // $x = DB::table('blogs')->create([
        //     'title'=>'hello title',
        //     'content'=>'hello content',
        // ]);

        // $x=DB::table('blogs')->delete('id', [20,21]);
       
        return View::render("product", ['x'=>$x]);
    }

    public function addProduct()
    {
        return View::render("add-product");
    }
}
