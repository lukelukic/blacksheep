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

        return view('products', [
            'data' => [
                'products' => Product::getRepository()->findAll(),
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



}
