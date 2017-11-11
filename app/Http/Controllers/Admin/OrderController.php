<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'orders' => Order::getRepository()->newOrders()
        ];
    }

    public function update(Request $request, $id)
    {
        $order = Order::getRepository()->findById($id);
        $status = 400;
        var_dump($request->all());
        return response(null, $status);
    }
    
}
