<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\AdvertsModel;

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

Route::get('/', function () 
{
    $categories = [
        ["id" => "1", "name" => "School" ],
        ["id" => "2", "name" => "Sports" ],
        ["id" => "1", "name" => "Music" ],
    ];
    $adverts = AdvertsModel::get();
    return view('guestUserhome')->with(compact('adverts', 'categories'));
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/activate', [AuthController::class, 'activateAccount'])->name('email.activate');
Route::post('/loginPost', [AuthController::class, 'login'])->name('loginPost');
Route::get('/signup', [AuthController::class, 'signForm'])->name('signup');
Route::post('/signupPost', [AuthController::class, 'signUp'])->name('signupPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/advertbooking', [AdvertsController::class, 'booking'])->name('advert.booking');

Route::prefix('admin')->middleware('auth')->group(function ()
{
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/adverts', [AdvertsController::class, 'index'])->name('admin.adverts');
    Route::post('/advertscreate', [AdvertsController::class, 'create'])->name('admin.advertscreate');
    Route::post('/advertsupdate', [AdvertsController::class, 'edit'])->name('admin.advertsupdate');
    Route::get('/bookedadds', [AdvertsController::class, 'getBookedAdverts'])->name('admin.avertsbookings');
});