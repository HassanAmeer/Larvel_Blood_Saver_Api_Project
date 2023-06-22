<?php

namespace App\Http\Controllers;

use App\Models\appsettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\appsettingsController;

class appsettingsController extends Controller
{
   public function getappsettingsf (){
        $check = appsettings::all();
        if($check->count() > 0){
            return response()->json([
                "status" => 1,
                "data" => $check,
            ], 200);
        }else{
            return response()->json([
                "status" => 0,
                "Message" => "Settings App Table Is Empty",
            ], 404);
        }
    }
}
