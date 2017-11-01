<?php
/**
 * Created by PhpStorm.
 * User: luka
 * Date: 10/21/2017
 * Time: 1:48 PM
 */

namespace App\Repository;


use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class ProductRepository extends AbstractRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function getCategoryName(Product $product)
    {
        return $product->category->name;
    }

    public function latestProducts() {
        return $this->model->where('is_active', 1)->orderBy('id', "desc")->take(5)->get();
    }

    public function specialProducts() {
        return $this->model->where(['is_active' => 1, 'special' => 1])->orderBy('id', "desc")->take(5)->get();
    }

    public function latestWithNum($num) {
        return $this->model->where('is_active', 1)->orderBy('id', "desc")->take($num)->get();
    }

    public function sort(Request $request) {
        $products = $this->model->where('is_active', 1)->get();
        switch($request->get("sort")) {
            case "name_asc":
                $products = $products->sortBy('name');
                break;
            case "id_asc":
                $products = $products->sortBy('id');
                break;
            case "name_desc":
                $products = $products->sortByDesc('name');
                break;
            case "price_asc":
                $products = $products->sortBy(function ($product){
                   return  $product->prices->first()->price;
                });
                break;
            case "price_desc":
                $products = $products->sortByDesc(function ($product){
                    return  $product->prices->first()->price;
                });
                break;
            default:
                $products = $products->sortByDesc('id');
                break;
                break;
        }
        return $products;
    }

    public function productsOnSale()
    {
        return $this->model->where(
            [
                'is_active' => 1,
                'is_offer' => 1
            ])->get();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }
}