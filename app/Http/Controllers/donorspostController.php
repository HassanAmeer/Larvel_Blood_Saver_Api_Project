<?php

namespace App\Http\Controllers;

use App\Models\allusers;
use App\Models\donorspost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\donorspostController;

class donorspostController extends Controller
{
    ///////// get all posts
    public function getalldonorspostf (){

        $check = donorspost::all();
        if($check->count() > 0){
            return response()->json([
                "status" => 1,
                "data" => $check,
            ], 200);
        }else{
            return response()->json([
                "status" => 0,
                "Message" => "Donors Table Is Empty",
            ], 404);
        }
            
    }
    ///////// delete all posts
    public function deletepostf ($id){

        $check = donorspost::find($id);
        if($check){
        $check -> delete();
            $data = [
                'status' => 200,
                'Deleted By id' => $id,
                'student' => 'Post Soft Deleted By Id: ' . $id,
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
                "status" => 0,
                "Message" => "This ID has no Post data",
            ], 404);
        }
            
    }





   /* ----------------- Start For Edit -------------------*/
   public function editpostf(Request $request , int $id)
   {
       $validater = Validator::make($request->all(), [
            
        'userid' => 'required',
        'username' => 'required|string|max:191',
        'phone' => 'required',
        'bloodgroup' => 'required|string|max:191',
        'country' => 'required|string|max:191',
        'state' => 'required|string|max:30',
        'city' => 'required|string|max:191',
        'lasttimedonated' => 'required|string|max:191',

       ]
      );
      if($validater->fails()){
          return response()->json([
              'status' => 422,
              'message' => $validater->messages()
          ], 422);
      }else{
          $wheninsertrecored = students::find($id);
          $wheninsertrecored->update([
              'name' => $request->name,
              'email' => $request->email,
              'phone' => $request->phone,
              'password' => $request->password,
          ]);
          if($wheninsertrecored){
              return response()->json([
                  'status' => 200,
                  'message' => 'Data Successfully Updated'
              ], 200);
          }else{
              return response()->json([
                  'status' => 500,
                  'message' => 'Data can not Updated'
              ], 500);
          }
      }
       // return 'here is studentsControllers called';
   }
   /* ----------------- End Of Edit -------------------*/
   



    // for create a bloodgroupdonors post 
    public function insertdonorsf(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userid' => 'required',
            'username' => 'required|string',
            'bloodgroup' => 'required|string|max:191',
            'country' => 'required|string|max:191',
            'state' => 'required|string|max:30',
            'city' => 'required|string|max:191',
            'lasttimedonated' => 'required|string|max:191',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "Message" => "Required All Fields",
                "validation" => $validator->errors(),
            ], 404);
        }
        $getuservalue = AllUsers::where('id',$request->userid)->first();
        $check = donorspost::create([
            "userid" => $request->userid,
            'username' => $request->username,
            'userprofile' => $getuservalue->profile_image,
            'phonecode' => $getuservalue->phonecode,
            "phone" => $getuservalue -> phone,
            "bloodgroup" => $request->bloodgroup,
            "available" => 1,
            "donorstatus" => 0,
            "country" => $request->country,
            "state" => $request->state,
            "city" => $request->city,
            "lasttimedonated" => $request->lasttimedonated,
            "description" => $request->description,
        ]);
    
        if ($check) {
            return response()->json([
                "status" => 1,
                "message" => "Donors Post Is Created",
                "data" => $check,
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Something Went Wrong",
            ], 404);
        }
    }
///////////////////////
    function imageapif (Request $resquest) {
   dd($resquest->all());
    }
}
