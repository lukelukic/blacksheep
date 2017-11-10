<?php

namespace App\Http\Controllers;

use App\Category;
use App\Repository\ProductRepository;
use App\Services\ProductToAssoc;
use Illuminate\Database\Eloquent\Collection;
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

        if($request->has("keyword")) {
            $products = Product::getRepository()->search($request->get("keyword"));
        } else {
            $products = Product::getRepository()->findAll();
        }
        return view('products', [
            'data' => [
                'products' => $products,
                'categories' => Category::getRepository()->findAll()
            ]
        ]);
    }

    public function productsByCategory($category)
    {
        $category = Category::getRepository()->findByName($category);
        $brands = $category->brands;
        $products = new Collection();
        foreach ($brands as $brand) {
            foreach ($brand->products as $product) {
                $products->push($product);
            }
        }

        return view('products', [
            'data' => [
                'products' => $products,
                'categories' => Category::getRepository()->findAll(),
                'brands' => $brands
            ]
        ]);
    }

    public function product($id)
    {
        return [Product::getRepository()->findById($id)];
    }



}
