<?php
namespace Scandiweb\Product\Controllers;

use Scandiweb\Product\Database\DB;
use Scandiweb\Product\Request\Request;
use Scandiweb\Product\Validation\Validation;
use Scandiweb\Product\Views\View;

class ProductController
{
    public function index()
    {
        $products = DB::table('products')->get();
        return View::render("product", ['products'=>$products]);
    }

    public function create()
    {
        return View::render("add-product");
    }

    public function store()
    {
        $validator =  Validation::validator(['sku','name','price'], ['size','weight','height','width','length']);
        if ($validator != null) {
            return ["status"=>false,"message"=>$validator];
        }
        $product = DB::table('products')->create([
            'sku'           => str_replace(" ", "-", Request::post('sku')),
            'name'          => Request::post('name'),
            'price'         => Request::post('price'),
            'size'          => Request::post('size') ?: null,
            'weight'        => Request::post('weight') ?: null,
            'height'        => Request::post('height') ?: null,
            'width'         => Request::post('width') ?: null,
            'length'        => Request::post('length') ?: null,
        ]);
        return ["status"=>true,"message"=>$product];
    }

    public function delete()
    {
        $deletedProducts = DB::table('products')->delete('id', Request::post('ids'));
        if ($deletedProducts) {
            header("Location: /");
            die();
        }
        return "Pleas Select one item to delete";
    }

}
