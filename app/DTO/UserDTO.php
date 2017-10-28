<?php
/**
 * Created by PhpStorm.
 * User: luka
 * Date: 10/20/2017
 * Time: 3:10 PM
 */

namespace App\DTO;






use App\Services\RequestToObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserDTO extends ObjectDTO
{
    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $phone;

    public function getModelClass()
    {
        return "App\User";
    }

    public function getMessages()
    {
        return [];
    }

    public function getRules()
    {
        return  [
            'firstName' => 'required|max:30|min:3',
            'lastName' => 'required|max:30',
            'email' => 'required|unique:users|email',
            'address' => 'required|max:30',
            'phone' => 'required|numeric'
        ];
    }

}