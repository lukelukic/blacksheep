<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 28.10.17.
 * Time: 23.04
 */

namespace App\Repository;


use App\ProductCategory;

class CategoryRepository extends AbstractRepository
{
    public function __construct(ProductCategory $model)
    {
        parent::__construct($model);
    }

    public function findAll()
    {
        return $this->model->all();
    }
    
    public function findById($id) {
        return $this->model->find($id);
    }
}