<?php

// use App\Models\allusers;
use App\Models\allusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\allusersController;
use App\Http\Controllers\donorspostController;
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
Route::post('/imageapi', [donorspostController::class , 'imageapif']);
//// for posts
Route::get('/getrequestposts', [requestedusersController::class , 'getrquestpostsf']);
Route::post('/createrequest', [requestedusersController::class , 'inserttorequestf']);


// Schema::create('donorspost', function (Blueprint $table) {
//     $table->id();
//     $table->integer('userid');
//     $table->string('username');
//     $table->string('userprofile');
//     $table->string('phonecode');
//     $table->string('phone');
//     $table->string('bloodgroup');
//     $table->integer('available');
//     $table->integer('donorstatus');
//     $table->string('country');
//     $table->string('state');
//     $table->string('city');
//     $table->string('lasttimedonated');
//     $table->string('description');
//     $table->timestamps();
// });




// Schema::create('requestedusers', function (Blueprint $table) {
//     $table->id();
//     $table->integer('requserid');
//     $table->string('requsername');
//     $table->string('requserprofile');
//     $table->string('requserloc');
//     $table->string('requserphone');
//     $table->integer('donoruserid');
//     $table->string('donorusername');
//     $table->string('donoruserprofile');
//     $table->string('donoruserphone');
//     $table->string('donoruserloc');
//     $table->integer('donatedstatus');
//     $table->timestamps();
// });