<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RoleController;
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

Route::post('customers' , [CustomerController::class , 'create'])->middleware("permission:Create Customer");
Route::delete('customers/{id}' , [CustomerController::class , 'delete'])->middleware("permission:Delete Customer");
Route::patch('customers/{id}' , [CustomerController::class , 'update'])->middleware("permission:Update Customer");
Route::get('customers/{id}' , [CustomerController::class , 'show'])->middleware("permission:Show Customer");
Route::get('customers' , [CustomerController::class , 'index'])->middleware("permission:Show Customer");

//----------- Notes Route --------------------------

Route::get('customers/{customerId}/notes/{noteId}' , [NoteController::class , 'show'])->middleware('permission:Show Note');
Route::post('customers/{customerId}/notes' , [NoteController::class , 'create'])->middleware('permission:Create Note');
Route::patch('customers/{customerId}/notes/{noteId}' , [NoteController::class , 'update'])->middleware('permission:Update Note');
Route::delete('customers/{customerId}/notes/{noteId}' , [NoteController::class , 'delete'])->middleware('permission:Delete Note');
Route::get('customers/{customerId}/notes' , [NoteController::class , 'index'])->middleware('permission:Show Note');


//----------- Invoices Route --------------------------

Route::get('customers/{customerId}/invoices/{invoiceId}' , [InvoiceController::class , 'show'])->middleware('permission:Show Invoice');
Route::post('customers/{customerId}/invoices' , [InvoiceController::class , 'create'])->middleware('permission:Create Invoice');
Route::patch('customers/{customerId}/invoices/{invoiceId}' , [InvoiceController::class , 'update'])->middleware('permission:Update Invoice');
Route::delete('customers/{customerId}/invoices/{invoiceId}' , [InvoiceController::class , 'delete'])->middleware('permission:Delete Invoice');
Route::get('customers/{customerId}/invoices' , [InvoiceController::class , 'index'])->middleware('permission:Show Invoice');

//----------- user Route --------------------------

Route::get('users', [UserController::class, 'all'])->middleware('permission:Show User');
Route::get('users/{id}', [UserController::class, 'show'])->middleware('permission:Show User');
Route::patch('users/{id}', [UserController::class, 'update'])->middleware('permission:Update User');
Route::delete('users/{id}', [UserController::class, 'delete'])->middleware('permission:Delete User');

//----------- Roles Route  --------------------------
Route::post('roles',[RoleController::class, 'create'])->middleware('role:Super Admin');
Route::get('roles', [RoleController::class, 'all'])->middleware('role:Super Admin');
Route::get('roles/{id}', [RoleController::class, 'show'])->middleware('role:Super Admin');
Route::patch('roles/{id}', [RoleController::class, 'update'])->middleware('role:Super Admin');
Route::delete('roles/{id}', [RoleController::class, 'delete'])->middleware('role:Super Admin');
Route::post('roles/{id}/addPermission', [RoleController::class, 'addPermission'])->middleware('role:Super Admin');
Route::post('roles/{id}/{userId}', [RoleController::class, 'addRoleToUser'])->middleware('role:Super Admin');
Route::delete('roles/{id}/{permissionId}', [RoleController::class, 'deletePermissionFormRol'])->middleware('role:Super Admin');


});

Route::post('signup' , [UserController::class , 'signup']);
Route::post('login' , [UserController::class , 'login']);
