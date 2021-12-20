<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use App\Http\Controllers\PostController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExportUsrController;
use App\Http\Controllers\DeviceExportController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userExport', [ExportUsrController::class, 'usercsv'])->name('user.export');
Route::post('/userImport', [ExportUsrController::class, 'userImport'])->name('user.import');

Route::get('/device/export', [DeviceExportController::class, 'deviceExport'])->name('device.export');
Route::post('/device/import', [DeviceExportController::class, 'deviceImport'])->name('device.import');

Route::get('post', [PostController::class, 'index'])->name('post');

Route::resource('category', CategoryController::class);
Route::post('add-SubCat', [CategoryController::class, 'subcat'])->name('subcat.add');

Route::get('qr-code', [QrController::class, 'index'])->name('qrcode.add');

