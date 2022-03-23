<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use App\Http\Controllers\PostController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExportUsrController;
use App\Http\Controllers\DeviceExportController;
use App\Http\Controllers\GetapiData;
use App\Http\Controllers\Products;
use App\Http\Controllers\WebController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//products
Route::get('/', [WebController::class, 'index']);
Route::get('/product{id}', [WebController::class, 'storeProduct'])->name('add.product');

//remove product
Route::get('/remove/{id}', [WebController::class, 'removeProduct'])->name('remove.product');
Route::get('/cart', [WebController::class, 'cart'])->name('cart.index');

//checkout
Route::get('checkout', [WebController::class, 'checkout'])->name('checkout');
Route::post('checkout', [WebController::class, 'confirmOrder'])->name('confirm.order');
Route::get('showorder', [WebController::class, 'showOrder'])->name('s.order');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/devices', [App\Http\Controllers\HomeController::class, 'devices'])->name('devices');
Route::get('/userExport', [ExportUsrController::class, 'usercsv'])->name('user.export');
Route::post('/userImport', [ExportUsrController::class, 'userImport'])->name('user.import');

Route::get('/device/export', [DeviceExportController::class, 'deviceExport'])->name('device.export');
Route::post('/device/import', [DeviceExportController::class, 'deviceImport'])->name('device.import');

Route::get('post', [PostController::class, 'index'])->name('post');

Route::resource('category', CategoryController::class);
Route::post('add-SubCat', [CategoryController::class, 'subcat'])->name('subcat.add');

Route::get('qr-code', [QrController::class, 'index'])->name('qrcode.add');

Route::get('getApi', [GetapiData::class, 'index'])->name('api.data');


//products

Route::get('/products', [Products::class, 'index'])->name('s.product');
Route::post('/proucts', [Products::class, 'store'])->name('p.store');

