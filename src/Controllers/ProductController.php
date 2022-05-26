<?php
namespace Scandiweb\Product\Controllers;

use LDAP\Result;
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
        $validator =  $this->validator(['sku','name','price']);

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
        return $product ?: ["error"=>$validator];
    }

    public function delete()
    {
        $deletedProducts = DB::table('products')->delete('id', Request::post('ids'));
        return $deletedProducts;
    }

    public function validator(array $keys)
    {
        foreach ($keys as $key) {
            return Validation::required($key, 'POST');
        }
        return true;
    }
}
