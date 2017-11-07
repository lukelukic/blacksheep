<?php

namespace App\Http\Controllers\Admin;

use App\CustomCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'cases' => CustomCase::getRepository()->findAll()
        ];
    }


}
