<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AuthorController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthorController::class, 'listBook'])->name('listBook');
Route::get('most-rating', [AuthorController::class, 'findAuthorWithMostRatings'])->name('most-rating');
Route::resource('rating', AuthorController::class);
Route::resource('authors', AuthorController::class);
