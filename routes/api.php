<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('authors', AuthorController::class);
// Route::get('most-rating', [AuthorController::class, 'findAuthorWithMostRatings']);
Route::post('fetch-author', [AuthorController::class, 'fetchBook']);
Route::post('tambah/data', [AuthorController::class, 'storeRating'])->name('storeRating');
Route::get('list-book', [AuthorController::class, 'listBook'])->name('listBook');
