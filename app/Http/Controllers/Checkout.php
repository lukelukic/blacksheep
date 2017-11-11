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
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

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
            try {
                $updated = ModelManager::updateInstance($user, $dto);
                $this->browseOrderItems($user);
            } catch (QueryException $e) {
                return $e->getMessage();
            }
            if($updated) {
                $this->browseOrderItems($user);
                session()->forget('orderItems');
                return ['status' => true];
            }
        } else {
            //Slucaj kada se registruje novi korisnik
            try {
                $user = ModelManager::saveInstance(User::class, $dto);
                $this->browseOrderItems($user);
            } catch(QueryException $e) {
                return $e->getMessage();
            }

            session()->forget('orderItems');
            return ['status' => true];
        }
    }

    private function browseOrderItems(User $user)
    {
        try {
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
                        $customCase->picture_id = $item['item']->picture->id;
                        $customCase->user_id = $user->id;
                        $customCase->order_status_id = 1;
                        $customCase->amount = $item['amount'];
                        $customCase->save();
                    }
                }
            }
        } catch(\Exception $e) {
            return ($e->getMessage());
        }
    }


}
