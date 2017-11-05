<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use App\DTO\ColorDTO;
use App\ModelManager;
use App\Services\DTOValidator;
use App\Services\RequestToObject;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'colors' => Color::all()
        ];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dto = new ColorDTO();
        $status = 201;
        RequestToObject::transform($dto);
        $validator = new DTOValidator($dto);
        if ($validator->isValid()) {
            try {
                ModelManager::saveInstance(Color::class, $dto);
            } catch (QueryException $e) {
                Log::error($e->getMessage());
            }
        } else {
            $status = 400;
        }
        return ['status' => $status];
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = 200;
        $color = Color::find($id);
        if($color) {
            try {
                $result = ModelManager::deleteInstance($color);
            } catch(\PDOException $e) {
                Log::error($e->getMessage());
                $status = 500;
            }
        } else {
            $status = 404;
        }

        return ['status' => $status];
    }
}
