<?php

use App\Http\Controllers\BoardController;
use Illuminate\Http\Request;
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


Route::prefix('/board')->group(function () {
    Route::get('/columns', [BoardController::class, 'columns'])->name('board.columns.list');
    Route::post('/columns', [BoardController::class, 'addColumn'])->name('board.columns.add');
    Route::put('/columns/re-order', [BoardController::class, 'reOrderColumns'])->name('board.columns.re-order');
});
