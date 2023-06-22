<?php

// use App\Models\allusers;
use App\Models\allusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\allusersController;
use App\Http\Controllers\donorspostController;
use App\Http\Controllers\appsettingsController;
use App\Http\Controllers\requestedusersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alluserslist', [allusersController::class , 'getalluserslistf']);
Route::get('/userprofile/{id}', [allusersController::class , 'userprofilef']);
Route::post('/login', [allusersController::class , 'loginf']);
Route::post('/signup', [allusersController::class , 'signupf']);
Route::post('/updateprofile/{id}', [allusersController::class , 'profileupdatef']);
//// for posts
Route::get('/getallposts', [donorspostController::class , 'getalldonorspostf']);
Route::post('/createdonors', [donorspostController::class , 'insertdonorsf']);
Route::patch('/editpost/{id}', [donorspostController::class , 'editpostf']);
Route::delete('/deletepost/{id}', [donorspostController::class , 'deletepostf']);
Route::patch('/updatestatuspost/{id}', [donorspostController::class , 'updatestatuspostf']);
Route::patch('/updatepostdonationstatus/{id}', [donorspostController::class , 'changepostdonattionstatusf']);
Route::delete('/deleteuserpost/{id}', [donorspostController::class , 'deleteuserpostf']);
//// for request
Route::get('/getrequestposts', [requestedusersController::class , 'getrquestpostsf']);
Route::patch('/changereqpoststatus/{id}', [requestedusersController::class , 'changereqpoststatusf']);
Route::delete('/deletereqpost/{id}', [requestedusersController::class , 'deleterequestpostbyidf']);
Route::post('/createrequest', [requestedusersController::class , 'inserttorequestf']);
//// for APP Settings
Route::get('/getappsettings', [appsettingsController::class , 'getappsettingsf']);


