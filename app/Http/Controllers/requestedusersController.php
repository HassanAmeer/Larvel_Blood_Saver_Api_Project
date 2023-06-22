<?php

namespace App\Http\Controllers;

use App\Models\allusers;
use Illuminate\Http\Request;
use App\Models\requestedusers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\requestedusersController;

class requestedusersController extends Controller
{
    ///////// get all posts
    public function getrquestpostsf (){

        $check = requestedusers::all();
        if($check->count() > 0){
            return response()->json([
                "status" => 1,
                "data" => $check,
            ], 200);
        }else{
            return response()->json([
                "status" => 0,
                "Message" => "Request Posts Table Is Empty",
            ], 404);
        }
            
    }
    // for create a bloodgroupdonors post 
    public function inserttorequestf(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'requserid' => 'required',
            // 'requsername' => 'required|string',
            // 'requserprofile' => 'required|string|max:191',
            // 'requserphone' => 'required|string|max:191',
            'donoruserid' => 'required',
            'lasttimedonated' => 'required',
            // 'donorusername' => 'required|string|max:191',
            // 'donoruserprofile' => 'required|string|max:191',
            // 'donoruserphone' => 'required|string|max:191',
            // 'donoruserloc' => 'required|string|max:191',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "Message" => "Required All Fields",
                "validation" => $validator->errors(),
            ], 404);
        }
        $getuser1 = allusers::where('id',$request->requserid)->first();
        $getdonoruser2 = allusers::where('id',$request->donoruserid)->first();
        $check = requestedusers::create([
            "requserid" => $getuser1->id,
            'requsername' => $getuser1->username,
            'requserprofile' => $getuser1->profile_image,
            'requserphone' => $getuser1->phonecode.$getuser1->phone,
            'requserloc' => $getuser1->country,
            "donoruserid" => $getdonoruser2 -> id,
            "donorusername" => $getdonoruser2->username,
            "donoruserprofile" => $getdonoruser2->profile_image,
            "donoruserphone" => $getdonoruser2->phonecode.$getdonoruser2->phone,
            "donoruserloc" => $getdonoruser2->country,
            "donorbloodgroup" => $getdonoruser2->bloodgroup,
            "donatedstatus" => 0,
            "lasttimedonated" => $request->lasttimedonated,
        ]);
    
        if ($check) {
            return response()->json([
                "status" => 1,
                "message" => "Request For Blood Group Is Created",
                "data" => $check,
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Something Went Wrong",
            ], 404);
        }
    }
    ////////
     ///////// delete request by id
     public function deleterequestpostbyidf($id){

        $check = requestedusers::find($id);
        if($check){
        $check -> delete();
            $data = [
                'status' => 200,
                'Deleted By id' => $id,
                'message' => 'Requested Post Deleted'
                // 'message' => 'Request Post Deleted By Id: ' . $id,
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This ID has no Request Post data",
            ], 404);
        }
            
    }
     ///////// changereqpoststatusf request by id
     public function changereqpoststatusf(Request $request, $id){

        $check = requestedusers::find($id);
        if($check){
            $check->update([
                'donatedstatus' => $request->changereqpoststatus,]);
            $data = [
                'status' => 200,
                'message' => 'Requested Status Changed',
                // 'message' => 'Request Status Changed By Id: ' . $id,
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "This ID has no Requested Post data",
            ], 404);
        }
            
    }

}
