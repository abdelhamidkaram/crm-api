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

Route::post('customers' , [CustomerController::class , 'create'])->middleware("permission:createCustomer");
Route::delete('customers/{id}' , [CustomerController::class , 'delete'])->middleware("permission:deleteCustomer");
Route::patch('customers/{id}' , [CustomerController::class , 'update'])->middleware("permission:updateCustomer");
Route::get('customers/{id}' , [CustomerController::class , 'show'])->middleware("permission:showCustomer");
Route::get('customers' , [CustomerController::class , 'index'])->middleware("permission:showCustomer");

//----------- Notes Route --------------------------

Route::get('customers/{customerId}/notes/{noteId}' , [NoteController::class , 'show'])->middleware('permission:showNote');
Route::post('customers/{customerId}/notes' , [NoteController::class , 'create'])->middleware('permission:createNote');
Route::patch('customers/{customerId}/notes/{noteId}' , [NoteController::class , 'update'])->middleware('permission:updateNote');
Route::delete('customers/{customerId}/notes/{noteId}' , [NoteController::class , 'delete'])->middleware('permission:deleteNote');
Route::get('customers/{customerId}/notes' , [NoteController::class , 'index'])->middleware('permission:showNote');


//----------- Invoices Route --------------------------

Route::get('customers/{customerId}/invoices/{invoiceId}' , [InvoiceController::class , 'show'])->middleware('permission:showInvoice');
Route::post('customers/{customerId}/invoices' , [InvoiceController::class , 'create'])->middleware('permission:createInvoice');
Route::patch('customers/{customerId}/invoices/{invoiceId}' , [InvoiceController::class , 'update'])->middleware('permission:updateInvoice');
Route::delete('customers/{customerId}/invoices/{invoiceId}' , [InvoiceController::class , 'delete'])->middleware('permission:deleteInvoice');
Route::get('customers/{customerId}/invoices' , [InvoiceController::class , 'index'])->middleware('permission:showInvoice');

//----------- user Route --------------------------

Route::get('users', [UserController::class, 'all'])->middleware('permission:showUser');
Route::get('users/{id}', [UserController::class, 'show'])->middleware('permission:showUser');
Route::patch('users/{id}', [UserController::class, 'update'])->middleware('permission:updateUser');
Route::delete('users/{id}', [UserController::class, 'delete'])->middleware('permission:deleteUser');


});

Route::post('signup' , [UserController::class , 'signup']);
Route::post('login' , [UserController::class , 'login']);
