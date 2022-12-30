<?php
use App\Http\Controllers\admin\AdminPagesController;
use App\Http\Controllers\user\UserPagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();
//normal routes
Route::get('/', [UserPagesController::class, 'index']);



// authenticated routes
Route::middleware('auth')->group(function () {

});




// admin routes
Route::middleware(['auth', 'isAdmin'])->group(function () {



    Route::get('/admin', [AdminPagesController::class, 'index']);
  });
