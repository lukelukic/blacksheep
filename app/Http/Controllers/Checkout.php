<?php

namespace App\Http\Controllers;

use App\CustomCase;
use App\DTO\UserDTO;
use App\ModelManager;
use App\Order;
use App\OrderStatus;
use App\Product;
use App\Services\DTOValidator;
use App\Services\RequestToObject;
use App\User;
use Illuminate\Http\Request;

class Checkout extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has("orderItems"))
            return redirect(route("home"));
        return view('checkout');
    }

    public function buy(Request $request)
    {
        $dto = new UserDTO();
        RequestToObject::transform($dto);
        //Ako je postojeci korisnik, vrsi se update na osnovu prosledjenih podataka
        if($request->has('userId')) {
            $repo = User::getRepository();
            $user = $repo->findById($request->get("userId"));
            $updated = ModelManager::updateInstance($user, $dto);
            if($updated) {
                $status = OrderStatus::find(1);
                $hasProducts = false;
                $hasCustom = false;
                foreach(session()->get('orderItems') as $item) {
                    if($item['type'] == 'product') {
                        $hasProducts = true;
                        break;
                    }
                }
                foreach(session()->get('orderItems') as $item) {
                    if($item['type'] == 'custom') {
                        $hasCustom = true;
                        break;
                    }
                }

                if($hasProducts) {
                    $order = new Order();
                    $order->user()->associate($user);
                    $order->status()->associate($status);
                    $order->save();
                    foreach(session()->get('orderItems') as $item)
                    {
                        if($item['type'] == 'product') {
                            $order->products()->attach($item['item']->id, [
                                'amount' => $item['amount']
                            ]);
                        }
                    }
                }

                if($hasCustom) {
                    foreach(session()->get('orderItems') as $item)
                    {
                        if($item['type'] == 'custom') {
                            $customCase = new CustomCase();
                            $customCase->picture_id = $item['item']->id;
                            $customCase->user_id = $user->id;
                            $customCase->order_status_id = 1;
                            $customCase->amount = $item['amount'];
                            $customCase->save();
                        }
                    }
                }

                session()->forget('orderItems');
                return ['status' => true];
            }
        } else {
            $user = ModelManager::saveInstance(User::class, $dto);
            $status = OrderStatus::find(1);
            $order = new Order();
            $order->user()->associate($user);
            $order->status()->associate($status);
            $order->save();
            foreach(session()->get('orderItems') as $item)
            {
                $order->products()->attach($item['item']->id, [
                    'amount' => $item['amount']
                ]);
            }
            session()->forget('orderItems');
            return ['status' => true];
        }
    }


}
