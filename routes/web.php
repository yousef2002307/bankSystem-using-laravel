<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\MyAuth;
use App\Http\Controllers\AuthCon;

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
   
    $notify = DB::select('SELECT * FROM `notice` WHERE userId = ? ORDER BY id DESC LIMIT 1', [session('user_id')]);
    $val =  $notify[0];
    $bal2 = new AuthCon;
    $bal = $bal2->getbalance();
    return view('welcome',compact("val",'bal'));
})->name("welcome")->middleware(MyAuth::class);
Route::get('/acc',[AuthCon::class, 'accsum'])->name("acc")->middleware(MyAuth::class);
Route::get('/fund',[AuthCon::class, 'fund'])->name("fund")->middleware(MyAuth::class);
Route::get('logout', function () {
    Session::forget('user_id');
    return redirect('/');

})->name("logout")->middleware(MyAuth::class);
Route::get('/notify',[AuthCon::class, 'notify'])->name("notify")->middleware(MyAuth::class);
Route::post('/ajax',[AuthCon::class, 'ajax'])->name("ajax")->middleware(MyAuth::class);
Route::post('/ajax2',[AuthCon::class, 'ajax2'])->name("ajax2")->middleware(MyAuth::class);
Route::get('/feedback',[AuthCon::class, 'feedback'])->name("feedback")->middleware(MyAuth::class);
Route::get('/accsta',[AuthCon::class, 'accsta'])->name("accsta")->middleware(MyAuth::class);
Route::post('/feedbackRes',[AuthCon::class, 'feedbackRes'])->name("feedbackRes")->middleware(MyAuth::class);
Route::get('/login', function () {
    if (\Session::has('user_id')) {
        $bal2 = new AuthCon;
        $bal = $bal2->getbalance();
        return view('welcome',compact('bal'));
    }else{
        return view('login');

    }
})->name("login");
////////////////////make authcon controllers/////////////
Route::post('/userlogin', [AuthCon::class, 'userlogin'])->name("userlogin");
