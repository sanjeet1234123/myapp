<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\LibraryController;

use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/books',[BookController::class,'store']);

Route::post('/register', [AuthController::class, 'register']);   
Route::post('/login', [AuthController::class, 'login']);

Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');  //for authenticated users


Route::get('students',[StudentController::class,'index']);
Route::post('students',[StudentController::class,'store']);
Route::get('students/{id}',[StudentController::class,'show']);
Route::get('students/{id}/edit',[StudentController::class,'edit']);
Route::put('students/{id}/edit',[StudentController::class,'update']);
Route::delete('students/{id}/delete',[StudentController::class,'destroy']);

Route::post('/library',[LibraryController::class,'library']);
Route::get('/library',[LibraryController::class,'get_library']);
Route::post('/member',[LibraryController::class,'member']);
Route::get('/member',[LibraryController::class,'get_member']);




