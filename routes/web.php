<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

#Companies

Route::get('/company',[CompanyController::class,'index'])->name('company.index');
Route::get('/company-create',[CompanyController::class,'create'])->name('company.create');
Route::get('/company-edit/{id}', [CompanyController::class,'edit'])->name('company.edit');
Route::post('/company-create',[CompanyController::class,'store'])->name('company.store');
Route::put('/company-update/{id}',[CompanyController::class,'update'])->name('company.update');
Route::delete('/company-delete/{id}',[CompanyController::class,'destroy'])->name('company.delete');

#Items

Route::get('/item', [ItemController::class, 'index'])->name('item.index');
Route::get('/item-create', [ItemController::class, 'create'])->name('item.create');
Route::get('/item-edit/{id}', [ItemController::class, 'edit'])->name('item.edit');
Route::post('/item-create', [ItemController::class, 'store'])->name('item.store');
Route::put('/item-update/{id}', [ItemController::class, 'update'])->name('item.update');
Route::delete('/item-delete/{id}', [ItemController::class, 'destroy'])->name('item.delete');

#Document

Route::get('document/{type}', [DocumentController::class, 'index'])->name('document.index');
Route::get('document/{create}/create', [DocumentController::class, 'create'])->name('document.create');
Route::post('document', [DocumentController::class, 'store'])->name('document.store');
Route::get('document/{id}', [DocumentController::class, 'show']);
Route::get('document/edit/{document}', [DocumentController::class, 'edit'])->name('document.edit');
Route::patch('document/{document}', [DocumentController::class, 'update'])->name('document.update');
Route::delete('document/delete/{id}', [DocumentController::class, 'destroy'])->name('document.delete');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
