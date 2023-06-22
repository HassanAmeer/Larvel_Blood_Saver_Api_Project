<?php

namespace App\Http\Controllers;

use App\Models\allusers;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\allusersController;

class allusersController extends Controller
{
    public function getalluserslistf (){

        $check = allusers::all();
        if($check->count() > 0){
            return response()->json([
                "status" => 1,
                "data" => $check,
            ], 200);
        }else{
            return response()->json([
                "status" => 0,
                "Message" => "Users Table Is Empty",
            ], 404);
        }
            
    }
    /// get single user record
    public function userprofilef ($id){

        $check = allusers::find($id);
        if($check->count() > 0){
            return response()->json([
                "status" => 1,
                "data" => $check,
            ], 200);
        }else{
            return response()->json([
                "status" => 0,
                "Message" => "Users Table Is Empty",
            ], 404);
        }
            
    }
    //// login
    public function loginf(Request $request)
    {   
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|string|max:191',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Required All Fields For Login",
                "validation" => $validator->errors(),
            ], 404);
        }
        
        $check = AllUsers::where('phone', $request->phone)
            ->where('password', $request->password)
            ->first();
    
        if($check){
            return response()->json([
                "status" => 1,
                "message" => "Login Successfully",
                "userdetails" => $check,
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Credentials Not Found",
                "validation" => $validator->errors(),
            ], 404);
        }
    }
    
    
    ////// for sign up
    public function signupf(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:191',
            'phonecode' => 'required',
            'phone' => 'required',
            'password' => 'required|string|max:191',
            'bloodgroup' => 'required|string|max:191',
            'role' => 'required|string|max:30',
            'country' => 'required|string|max:191',
            'state' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'address' => 'required|string|max:191',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Required All Fields",
                "validation" => $validator->errors(),
            ], 404);
        }
        $checkreg = AllUsers::where('phone', $request->phone)->exists();
        if ($checkreg) {
            return response()->json([
                "status" => 0,
                "message" => $request->phone . " Phone Number is already registered",
            ], 404);
        }
        $check = AllUsers::create([
            "username" => $request->username,
            'profile_image' => 'public/images/user.png',
            "phonecode" => $request->phonecode,
            "phone" => $request->phone,
            "password" => $request->password,
            "bloodgroup" => $request->bloodgroup,
            "role" => $request->role,
            "country" => $request->country,
            "state" => $request->state,
            "city" => $request->city,
            "address" => $request->address,
        ]);
    
        if ($check) {
            return response()->json([
                "status" => 1,
                "message" => "User Registered",
                "data" => $check,
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Something Went Wrong",
            ], 404);
        }
    }
    
      //// for profile update
      public function profileupdatef(Request $request, $id)
      {
        //   dd( $request->all());

          // dd($id);
        //   dd( $request->all());
          // Get the current user
          $user = AllUsers::find($id);
          if (!$user) {
              return response()->json([
                  'status' => 404,
                  'message' => 'User not found',
              ], 404);
          }
      
          // Handle the profile image upload
          if ($request->hasFile('profile_image')) {
              $request->validate([
                  'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
              ]);
      
              $image = $request->file('profile_image');
              $imagename = time() . '.' . $image->getClientOriginalExtension();
              $image->move(public_path('images'), $imagename);
              $user->profile_image = 'public/images/'.$imagename;
          }
      
          // Update the user data if provided in the request
          if ($request->filled('username')) {
              $user->username = $request->input('username');
          }
          if ($request->filled('phonecode')) {
              $user->phonecode = $request->input('phonecode');
          }
          if ($request->filled('phone')) {
              $user->phone = $request->input('phone');
          }
          if ($request->filled('password')) {
              $user->password = $request->input('password');
          }
          if ($request->filled('bloodgroup')) {
              $user->bloodgroup = $request->input('bloodgroup');
          }
          if ($request->filled('role')) {
              $user->role = $request->input('role');
          }
          if ($request->filled('country')) {
              $user->country = $request->input('country');
          }
          if ($request->filled('state')) {
              $user->state = $request->input('state');
          }
          if ($request->filled('city')) {
              $user->city = $request->input('city');
          }
          if ($request->filled('address')) {
              $user->address = $request->input('address');
          }
      
          $user->save();
      
          return response()->json([
              'status' => 200,
              'message' => 'Profile Successfully Updated',
              'user' => $user, // Optional: Include the updated user data in the response
          ], 200);
      }

}
