<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ImageController;

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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('files', FileController::class, ['only' => ['index', 'create', 'store']]);
    Route::get('files/download/{file}', [FileController::class, 'download'])->name('files.download');

    Route::resource('images', ImageController::class, ['only' => ['index', 'create', 'store']]);
});

require __DIR__.'/auth.php';
