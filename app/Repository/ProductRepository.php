<?php
/**
 * Created by PhpStorm.
 * User: luka
 * Date: 10/21/2017
 * Time: 1:48 PM
 */

namespace App\Repository;


use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends AbstractRepository
{
    public function __construct(Model $model)
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
}