<?php

use App\Http\Controllers\Api\TaskController as ApiTaskController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('tasks')
    ->name('tasks.')
    ->group(function () {
        Route::get('/', [ApiTaskController::class, 'index'])->name('index');
        Route::post('/', [ApiTaskController::class, 'store'])->name('store');
        Route::get('/{task}', [ApiTaskController::class, 'show'])->name('show');
        Route::put('/{task}', [ApiTaskController::class, 'update'])->name('update');
        Route::delete('/{task}', [ApiTaskController::class, 'destroy'])->name('destroy');
    });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
