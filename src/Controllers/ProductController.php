<?php
namespace Scandiweb\Product\Controllers;

use Scandiweb\Product\Database\DB;
use Scandiweb\Product\Views\View;

class ProductController
{
    public function here($id)
    {
        // $x= DB::table('blogs')->where('id', '>', '0')->first();
        // $x = DB::table('blogs')->create([
        //     'title'=>'hello title',
        //     'content'=>'hello content',
        // ]);

        $x=DB::table('blogs')->delete('id', [20,21]);
        echo "<pre>";
        var_dump($x);
        echo "</pre>";
        // return View::render("product", ['name'=>"Abdulrahman"]);
    }
}
