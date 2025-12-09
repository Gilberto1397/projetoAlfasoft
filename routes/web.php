<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(ContactController::class)->group(function () {
    Route::prefix('/contacts')->group(function () {
        Route::prefix('/form')->group(function () {
            Route::get('/{contactId?}', 'returnContactForm')->name('contact.return-form');
        });
        Route::post('', 'createContact')->name('contact.create');
        Route::put('', 'updateContact')->name('contact.update');
        Route::delete('/{contactId?}', 'deleteContact')->name('contact.delete');
        Route::get('', 'getAll')->name('contact.getall');
        Route::get('/contact/{contactId?}', 'getByid')->name('contact.details');
    });
});
