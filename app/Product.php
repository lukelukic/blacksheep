<?php

namespace App;

use App\Interfaces\Repository;
use App\Repository\ProductRepository;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Repository
{

    public function category() {
        return $this->belongsTo("App\ProductCategory", 'product_category_id');
    }

    public function prices()
    {
        return $this->hasMany("App\Price");
    }

    public function colors()
    {
        return $this->belongsToMany("App\Color");
    }

    public function pictures()
    {
        return $this->belongsTo("App\Picture");
    }

    public static function getRepository()
    {
        return new ProductRepository(new Product());
    }
}
