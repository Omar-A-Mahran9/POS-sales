<?php

use App\Http\Controllers\Admin\Adminpanel;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\LogoutController;
use App\Models\Admin;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Logout;
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

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'], function () {
    Route::get('/', [DashboardController::class,'index'])->name('Dashboardview');
    Route::get('logout', [LogoutController::class,'logout'])->name('admin.logout');
    Route::get('adminpanelsetting/index', [Adminpanel::class,'index'])->name('adminpanelsetting.index');
    Route::get('adminpanelsetting/edit',[Adminpanel::class,'edit'])->name('admin.adminpanelsetting.edit');
    Route::post('adminpanelsetting/update',[Adminpanel::class,'update'])->name('admin.adminpanelsetting.update');

    
});

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'], function () {
    Route::get('login', [LoginController::class,'show_login_view'])->name('admin.showlogin');

    Route::post('login', [LoginController::class,'login'])->name('admin.login');
});
