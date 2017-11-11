<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductCategory;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::getRepository()->exportAll();
        return [
            'products' => $products
        ];
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "EDIT";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::getRepository()->findById($id);
        if($product) {
            try {
                $product->is_active = false;
                $result = $product->save();
                return ['status' => 200];
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return ['status' => 500];
            }

        } else {
            return ['status' => 404];
        }

    }
}
