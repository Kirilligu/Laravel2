<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DBController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PollController;

Route::get('/poll', [PollController::class, 'showForm'])->name('poll.show');
Route::post('/poll', [PollController::class, 'submitForm'])->name('poll.submit');

Route::get('/client/{id}', [ClientController::class, 'show']);
Route::get('/results', [PollController::class, 'index']);
Route::get('/api/appforms', [DBController::class, 'getAppFormsJson']);
Route::get('/api/clients', [DBController::class, 'getClientsJson']);
Route::get('/', [FormController::class, 'showForm'])->name('form.show');
Route::post('/submit', [FormController::class, 'submitForm'])->name('form.submit');
Route::get('/data', [FormController::class, 'showData'])->name('data.show');
