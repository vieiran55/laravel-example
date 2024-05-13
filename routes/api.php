<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Api\ProductController;

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

Route::get('/test', function () {
    // dd($request->headers->all());
    // dd($request->headers->get());


    $response = new \Illuminate\Http\Response(json_encode(['msg' => 'Minha primeira respta de API']));

    return $response;
});


//Products Route
//Route::resource('products', 'ProductController');

Route::namespace('App\Http\Controllers\Api')->group(function () {

    //Products route
    Route::prefix('products')->group(function(){
        Route::get('/', 'ProductController@index');
        Route::get('/{id}', 'ProductController@show');
        Route::post('/', 'ProductController@save');//->middleware('auth.basic');
        Route::put('/', 'ProductController@update');
        Route::patch('/', 'ProductController@update');
        Route::delete('/{id}', 'ProductController@delete');
    });

    Route::resource('/users', 'UserController');
});
