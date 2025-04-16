<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;
use App\Http\Middleware\RoleAdmMiddleware;
use App\Http\Middleware\RoleCliMiddleware;
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
    return view('welcome');
});

Route::get("/login", [AuthController::class, 'showFormLogin'])->name('login');
Route::post("/login", [AuthController::class, 'login']);

Route::middleware("auth")->group(function (){
    Route::post("/logout", [AuthController::class, "logout"]);

    Route::middleware([RoleAdmMiddleware::class])->group(function (){ 
        Route::resource("produtos", ProdutoController::class);
        Route::get('/home-adm', function() {
            return view("home-adm");
        });
    });

    Route::middleware([RoleCliMiddleware::class])->group(function (){ 
        Route::get('/home-cli', function() {
            return view("home-cli");
        });
    });
    
});

