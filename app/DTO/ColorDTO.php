<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2.11.17.
 * Time: 02.29
 */

namespace App\DTO;


class ColorDTO extends ObjectDTO
{
    public $rgb;

    public function getModelClass()
    {
        return "App\Color";
    }

    public function getMessages()
    {
        return [];
    }

    public function getRules()
    {
        return  [
            'rgb' => 'required|hexcolor|unique:colors',
            'parent_id' => "numeric"
        ];
    }
}