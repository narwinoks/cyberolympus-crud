<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Datacontroller;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('customers',[CustomerController::class,'index'])->name('customer.index');
    Route::get('create',[CustomerController::class,'create'])->name('customer.create');
    Route::get('customer/{id}',[CustomerController::class,'show'])->name('customer.detail');
    Route::get('edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::post('store',[CustomerController::class,'store'])->name('customer.store');
    Route::post('update',[CustomerController::class,'update'])->name('customer.update');
    Route::delete('delete/{id}',[CustomerController::class,'destroy'])->name('customer.destroy');
    Route::controller(Datacontroller::class)->prefix('data')->group(function(){
        Route::get('/customers', 'customers')->name('customers.data');
    });
});
