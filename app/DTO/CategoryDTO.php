<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2.11.17.
 * Time: 02.29
 */

namespace App\DTO;


class CategoryDTo extends ObjectDTO
{
    public $name;
    public $parent_id;

    public function getModelClass()
    {
        return "App\ProductCategory";
    }

    public function getMessages()
    {
        return [];
    }

    public function getRules()
    {
        return  [
            'name' => 'required|min:3',
            'parent_id' => "numeric"
        ];
    }
}