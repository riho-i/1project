<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Route::get('/phpinfo', function () {
    echo phpinfo();
});


Route::match(['get','post'],[HomeController::class, 'index'])->name('home'); //top

Route::get('/list', [HomeController::class, 'index'])->name('list'); //物件一覧
Route::match(['get','post'], '/heyalist/{bukken}', [HomeController::class, 'heyaList'])->name('heya_list'); //部屋リスト
Route::match(['get','post'], '/aki_list', [HomeController::class, 'akiList'])->name('aki_list'); //空室リスト

Route::match(['get', 'post'], '/regist',  [HomeController::class, 'regist'])->name('regist');//物件登録画面
Route::match(['get', 'post'], '/entry',  [HomeController::class, 'entry'])->name('entry');//物件登録
Route::match(['get', 'post'], '/entry_ajax',  [HomeController::class, 'entryAjax'])->name('entry_ajax');//物件登録ajax

Route::match(['get', 'post'], '/heyalist/{bukken}/heya_regist',  [HomeController::class, 'heyaRegist'])->name('heya_regist');//部屋登録画面
Route::match(['get', 'post'], '/heyalist/{bukken}/heya_regist/heya_entry',  [HomeController::class, 'heyaEntry'])->name('heya_entry');//部屋登録
Route::match(['get', 'post'], '/heyaentry_ajax',  [HomeController::class, 'heyaEntryAjax'])->name('heyaentry_ajax');//物件登録ajax