<?php

use App\Http\Controllers\AdminpanelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/application', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'applications'], function () {
	Route::controller(HomeController::class)->group(function () {
		Route::get('/add', 'create')
			->name('applications.create');
		Route::post('/store', 'store')
			->name('applications.store');
		Route::get('/{id}', 'show')
			->name('applications.show');
	});
});

Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin'], function () {
	Route::controller(AdminpanelController::class)->group(function () {
		Route::get('/', 'index')
			->name('admin.index');
		Route::get('/confirmed/{statement}', 'confirmed')
			->name('admin.confirmed');
		Route::get('/dismissed/{statement}', 'dismissed')
			->name('admin.dismissed');
	});
});

// Route::get('/add', [StatementController::class, 'create'])->name();