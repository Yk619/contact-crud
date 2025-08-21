<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('contacts', ContactController::class);
    Route::post('contacts/import-xml', [ContactController::class, 'importXml'])->name('contacts.importXml');
});

require __DIR__.'/auth.php';
