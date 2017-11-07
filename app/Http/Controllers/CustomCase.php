<?php

namespace App\Http\Controllers;

use App\DTO\CustomCaseDTO;
use App\DTO\PictureDTO;
use App\ModelManager;
use App\Picture;
use App\Services\DTOValidator;
use App\Services\RequestToObject;
use Illuminate\Http\Request;

class CustomCase extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('custom_case');
    }

    public function add(Request $request)
    {
        if ($request->has("add")) {
           $dto = new CustomCaseDTO();
           RequestToObject::transform($dto);
           $pictureDTO = new PictureDTO();
           $pictureDTO->file = $request->file("file");
           $validator = new DTOValidator($pictureDTO);
           if(!$validator->isValid()) {

           } else {
               $fileName = $request->file('file')->getFilename() . "_" . mktime(time()) . "." . $request->file('file')->extension();
               $pictureDTO->file = $fileName;
               $picture = new Picture();
               $picture->alt = "custom case";
               $picture->file = $fileName;
               $picture->save();
               $request->file('file')->move(base_path("/public/assets/pages/img/custom_case"), $fileName);
               
               return redirect()->back()->with("success", "Porudzbina uspesno dodata u korpu!");
           }
        }
    }
}
