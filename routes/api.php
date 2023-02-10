<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
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



Route::middleware('auth:sanctum')->group( function(){

Route::post('customers' , [CustomerController::class , 'create']);
Route::delete('customers/{id}' , [CustomerController::class , 'delete']);
Route::patch('customers/{id}' , [CustomerController::class , 'update']);
Route::get('customers/{id}' , [CustomerController::class , 'show']);
Route::get('customers' , [CustomerController::class , 'index']);

//----------- Notes Route --------------------------

Route::get('customers/{customerId}/notes/{noteId}' , [NoteController::class , 'show']);
Route::post('customers/{customerId}/notes' , [NoteController::class , 'create']);
Route::patch('customers/{customerId}/notes/{noteId}' , [NoteController::class , 'update']);
Route::delete('customers/{customerId}/notes/{noteId}' , [NoteController::class , 'delete']);
Route::get('customers/{customerId}/notes' , [NoteController::class , 'index']);


//----------- Invoices Route --------------------------

Route::get('customers/{customerId}/invoices/{invoiceId}' , [InvoiceController::class , 'show']);
Route::post('customers/{customerId}/invoices' , [InvoiceController::class , 'create']);
Route::patch('customers/{customerId}/invoices/{invoiceId}' , [InvoiceController::class , 'update']);
Route::delete('customers/{customerId}/invoices/{invoiceId}' , [InvoiceController::class , 'delete']);
Route::get('customers/{customerId}/invoices' , [InvoiceController::class , 'index']);

//----------- user Route --------------------------

Route::get('users', [UserController::class, 'all']);
Route::patch('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'delete']);


});

Route::post('signup' , [UserController::class , 'signup']);
Route::post('login' , [UserController::class , 'login']);
