<?php

use App\Http\Controllers\FactureController;
use App\Models\Devis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\ServiceController;

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

/** la page home : */
Route::get('/', function () {
    return view('auth.login');
})->name('login');

/** Login */
Route::get('login', [SessionController::class, 'index'])->name('login');
Route::post('login', [SessionController::class, 'store'])->name('login.store');
/** Logout */
Route::get('logout', [SessionController::class, 'destroy'])->name('logout');

/** Admin */
Route::middleware('can:admin')->group(function() {
    Route::get('admins', [UserController ::class, 'index'])->name('admins.index');
    Route::get('admins/create-service',[ServiceController::class, 'create'])->name('service.create');
    Route::post('admins/store-service',[ServiceController::class, 'store'])->name('service.store');
    Route::get('admins/All-services',[UserController::class,'Services'])->name('Services');
    Route::delete('/services/{service}',[ServiceController::class,'delete'])->name('services.delete');
     /**Update service */
     Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
     Route::put('/services/{service}/update', [ServiceController::class, 'update'])->name('services.update');

    Route::get('admins/create-client',[UserController::class, 'create'])->name('clients.create');
    Route::post('admins/store-client',[UserController::class, 'store'])->name('clients.store');
    Route::get('admins/all-clients',[UserController::class, 'clients'])->name('clients');

    Route::delete('/clients/{client}/delete',[UserController::class, 'destroy'])->name('clients.destroy');
    Route::get('/clients/{client}/edit',[UserController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}/update',[UserController::class, 'update'])->name('clients.update');
    /**Devis */
    Route::get('admins/devis',[DevisController::class, 'index'])->name('devis.all');
    Route::get('devis/{devis}',[DevisController::class, 'show'])->name('devis.show');
    Route::get('devis/{devis}/facture',[DevisController::class, 'facture'])->name('devis.facture');
    Route::get('admins/create-devis',[DevisController::class, 'create'])->name('devis.create');
    Route::post('admins/store-devis',[DevisController::class, 'store'])->name('devis.store');
    Route::put('devis/{devis}/approve',[DevisController::class, 'approve'])->name('devis.approve');
    Route::delete('/devis/{devis}/delete',[DevisController::class, 'destroy'])->name('devis.destroy');
    /**Facture */
    Route::post('facture/{facture}',[FactureController::class, 'store'])->name('facture.store');
    Route::get('facture/{facture}',[FactureController::class, 'show'])->name('facture.show');


});
