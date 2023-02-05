<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;


Route::get('/contact',[ContactsController::class,'index'])->name('contact.index');

Route::post('/contact/confirm',[ContactsController::class,'confirm'])->name('contact.confirm');

Route::post('/contact/thanks',[ContactsController::class,'send'])->name('contact.send');
