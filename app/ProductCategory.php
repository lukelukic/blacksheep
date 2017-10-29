<?php

namespace App;

use App\Interfaces\Repository;
use App\Repository\CategoryRepository;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model implements Repository
{
    public function parentCategory()
    {
        return $this->belongsTo("App\Category", "parent_id");
    }

    public function subCategories()
    {
        return $this->hasMany("App\Category", "parent_id");
    }

    public function products()
    {
        return $this->hasMany("App\Product", 'product_category_id');
    }

    public static function getRepository()
    {
        return new CategoryRepository(new ProductCategory());
    }


}
