<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::apiResource('/room-category', 'App\Http\Controllers\Api\RoomCategoryController');
Route::apiResource('/room-category-image', 'App\Http\Controllers\Api\RoomCategoryImageController');
Route::apiResource('/customer-type', 'App\Http\Controllers\Api\CustomerTypeController');
Route::apiResource('/customer', 'App\Http\Controllers\Api\customerController');
Route::apiResource('/floor', 'App\Http\Controllers\Api\FloorController');
Route::apiResource('/room', 'App\Http\Controllers\Api\RoomController');
Route::apiResource('/halltype', 'App\Http\Controllers\Api\HallTypeController');
Route::apiResource('/hallreservation', 'App\Http\Controllers\Api\HallReservationController');
Route::apiResource('/company', 'App\Http\Controllers\Api\CompanyController');
Route::apiResource('/roomimage', 'App\Http\Controllers\Api\RoomImageController');
Route::apiResource('/reservation', 'App\Http\Controllers\Api\ReservationController');
Route::apiResource('/service', 'App\Http\Controllers\Api\ServiceController');
Route::apiResource('/serviceprovider', 'App\Http\Controllers\Api\ServiceProviderController');




Route::get('/roomcategory', [App\Http\Controllers\Api\SubroomController::class, 'GetRoomCategory']);

Route::get('/subroom', [App\Http\Controllers\Api\SubroomController::class, 'GetSubcat']);

Route::get('/subfloor', [App\Http\Controllers\Api\SubroomController::class, 'Getfloor']); 

Route::get('/price', [App\Http\Controllers\Api\SubroomController::class, 'GetPrice']);


Route::get('/getroomfloorones', [App\Http\Controllers\Api\SubroomController::class, 'GetRoomsOne']);

Route::get('/getroomfloortwos', [App\Http\Controllers\Api\SubroomController::class, 'GetRoomsTwo']);

Route::get('/getroomfloorthrees', [App\Http\Controllers\Api\SubroomController::class, 'GetRoomsThree']);

Route::get('/getroomfloorfours', [App\Http\Controllers\Api\SubroomController::class, 'GetRoomsFour']);

Route::get('/getroomfloorfives', [App\Http\Controllers\Api\SubroomController::class, 'GetRoomsFive']);


Route::get('/get-room/{id}', [App\Http\Controllers\Api\SubroomController::class, 'ModelFaceRoomInfo']);

Route::get('/serviceget', [App\Http\Controllers\Api\SubroomController::class, 'GetservicesName']);

Route::get('/selectedservicesprice', [App\Http\Controllers\Api\SubroomController::class, 'Getselectedservicesprice']);



