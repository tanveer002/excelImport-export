<?php

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/brands', function(){
    return Brand::all();
});

Route::post('/brands', function(){
    return Brand::create([
        'Name' => request('brand')
    ]);
});

Route::put('/brands/{brand}', function(Brand $brand){
    $brand->update([
        'Name' => request('brand')
    ]);
    return [
        'update success' => $brand 
    ];
});

Route::delete('/brands/{brand}', function(Brand $brand){
    $brand->delete();
    return [
        'success' => $brand
    ];
});
