<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepository;
use App\Services\ProductToAssoc;
use Illuminate\Http\Request;
use App\Product;

class Products extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = Product::getRepository();
    }


    public function index(Request $request)
    {
        
        return view('products', [

        ]);
    }

    public function product($id)
    {
        $product = Product::getRepository()->findById($id);
        return ProductToAssoc::convertOne($product);
    }


}
