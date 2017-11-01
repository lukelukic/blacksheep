<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\ProductToAssoc;
use Illuminate\Http\Request;

class Home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $repo = Product::getRepository();
        $latest = ProductToAssoc::convert($repo->latestProducts());
        $special = ProductToAssoc::convert($repo->specialProducts());
        return view('index', [
            'data' => [
                'latestProducts' => $latest,
                'specialProducts' => $special
            ]
        ]);
    }



}
