<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
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
}
