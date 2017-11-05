<?php

namespace App\Http\Controllers\Admin;

use App\ModelManager;
use App\ProductCategory;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'categories' => ProductCategory::getRepository()->findAll()
        ];
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ['status' => true];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = 200;
        $product = ProductCategory::getRepository()->findById($id);
        try {
            $result = ModelManager::deleteInstance($product);
        } catch(\PDOException $e) {
            Log::error($e->getMessage());
            $status = 500;
        }
        return ['status' => $status];
    }
}
