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
        $data = \DB::select(\DB::raw("SELECT DISTINCT t.name, t.id FROM types t INNER JOIN products p ON t.id = p.type_id"));
        $types = [];

        foreach ($data as $type) {
            $t = get_object_vars($type);
            array_push($types, $t);
        }

        return view('products', [
            'data' => [
                'products' => $products,
                'categories' => Category::getRepository()->findAll(),
                'brands' => $brands,
                'types' => $types
            ]
        ]);
    }

    public function product($id)
    {
        return [Product::getRepository()->findById($id)];
    }



}
