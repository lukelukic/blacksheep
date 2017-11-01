<?php
/**
 * Created by PhpStorm.
 * User: luka
 * Date: 10/21/2017
 * Time: 2:17 PM
 * Klasa za upravljanje modelima.
 * saveInstance - pravi instacu modela na osnovu imena klase i DTO-a i cuva ga u bazi
 * updateInstance - menja vrednosti modela na osnovu DTO-a i cuva izmene u bazi
 * deleteInstance - brise zapis iz baze koji odgovara prosledjenom modelu
 *
 */

namespace App;


use App\DTO\ObjectDTO;
use App\Services\DTOValidator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ModelManager
{
    /**
     * @param $className
     * @param ObjectDTO $dto
     * @return Model|null
     */
    public static function saveInstance($className, ObjectDTO $dto)
    {
        $model = null;
        if(ModelManager::isCompatible($className, $dto)){
            $validator = new DTOValidator($dto);
            if($validator->isValid()) {
                $model = new $className;
                foreach($dto as $key => $value) {
                    $model->$key = $value;
                }
                $model->token = ModelManager::generateRandomString();
                $model->save();
            }
        }
        return $model;
    }

    private static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * @param Model $model
     * @param ObjectDTO $dto
     * @return Model|null
     */
    public static function updateInstance(Model $model, ObjectDTO $dto)
    {
        $updated = null;
        if(get_class($model) == $dto->getModelClass()) {
            $validator = new DTOValidator($dto);
            if($validator->isValid()) {
                foreach($dto as $key => $value) {
                    $model->$key = $value;
                }
                $model->save();
                $updated = $model;
            }
        }
        return $updated;
    }

    /**
     * @param Model $model
     * @return bool|null
     */
    public static function deleteInstance(Model $model)
    {
        $deleted = false;
        try {
            $deleted = $model->delete();
        } catch(QueryException $e)
        {
            echo $e->getMessage();
        }
        return $deleted;
    }


    /**
     * @param $class
     * @param ObjectDTO $dto
     * @return bool
     */
    private static function isCompatible($class, ObjectDTO $dto)
    {
        return $class == $dto->getModelClass();
    }
}