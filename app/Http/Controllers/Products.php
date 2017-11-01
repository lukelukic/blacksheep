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
        //Dohvatanje svih proizvoda i sortiranje, ako ima potrebe
        $products = $this->repo->sort($request);

        //Ako je radjena pretraga, filtriranje po pretrazi
        $key = false;
        if ($request->get('keyword')) {
            $key = $request->get('keyword');
            $products = $products->filter(function($value, $key) {
                return strpos(strtolower($value->name), strtolower($_GET['keyword']))  !== false;
            });
        }

        //Racunanje broja zapisa
        $pagesNum = (count($products)/15) % 2 == 0 ? count($products)/15 : intval(count($products)/15)+1;

        //Ako je prosledjena stranica, filtriranje po stranicama
        if($request->get('page')) {
            $products = $products->splice(($request->get('page')-1)*15)->take(15);
        } else {
            $products = $products->take(15);
        }

        //Obrazac za pravljenje paginacije
        $url = $request->fullUrl();
        $pgPattern = isset(explode("?", $url)[1]) ? explode("?", $url)[1] : "";
        $pgPattern = str_replace("&page=" . $request->get('page'), "", $pgPattern);
        $pgPattern = str_replace("page=" . $request->get('page'), "", $pgPattern);


        return view('products', [
           'data' => [
               'products' => ProductToAssoc::convert($products),
               'pages' => $pagesNum,
               'sort' => [
                   ['url' => '/products' . ($key ? '?keyword=' . $key : ""), 'text' => 'Prvo noviji'],
                   ['url' => '/products?sort=id_asc' . ($key ? '&keyword=' . $key : ""), 'text' => 'Prvo stariji'],
                   ['url' => '/products?sort=name_asc' . ($key ? '&keyword=' . $key : ""), 'text' => 'Imenu (A - Z)'],
                   ['url' => '/products?sort=name_desc' . ($key ? '&keyword=' . $key : ""), 'text' => 'Imenu (Z - A)'],
                   ['url' => '/products?sort=price_asc' . ($key ? '&keyword=' . $key : ""), 'text' => 'Ceni (Niža &gt; Viša)'],
                   ['url' => '/products?sort=price_desc' . ($key ? '&keyword=' . $key : ""), 'text' => 'Ceni (Viša &gt; Niža)'],
               ],
               'pgPattern' => "/products?" . $pgPattern
           ]
        ]);
    }

    public function product($id)
    {
        $product = Product::getRepository()->findById($id);
        return ProductToAssoc::convertOne($product);
    }


}
