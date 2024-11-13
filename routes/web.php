<?php

use App\Http\Controllers\AffectationController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::redirect('/dashboard', '/profils');

    // Profils Routes
    Route::get('/profils', [ProfilController::class, 'index'])->name('profils.index');
    Route::get('/profils/create', [ProfilController::class, 'create'])->name('profils.create');
    Route::post('/profils', [ProfilController::class, 'store'])->name('profils.store');
    Route::get('/profils/{profil}/edit', [ProfilController::class, 'edit'])->name('profils.edit');  

    Route::put('/profils/{profil}', [ProfilController::class, 'update'])->name('profils.update');
    Route::delete('/profils/{profil}', [ProfilController::class, 'destroy'])->name('profils.destroy');

    // Postes Routes
    Route::get('/postes', [PosteController::class, 'index'])->name('postes.index');
    Route::get('/postes/create', [PosteController::class, 'create'])->name('postes.create');
    Route::post('/postes', [PosteController::class, 'store'])->name('postes.store');
    Route::get('/postes/{poste}', [PosteController::class, 'show'])->name('postes.show');
    Route::get('/postes/{poste}/edit', [PosteController::class, 'edit'])->name('postes.edit');
    Route::put('/postes/{poste}', [PosteController::class, 'update'])->name('postes.update');
    Route::delete('/postes/{poste}', [PosteController::class, 'destroy'])->name('postes.destroy');  


    // Personnels Routes
    Route::get('/personnels', [PersonnelController::class, 'index'])->name('personnels.index');
    Route::get('/personnels/create', [PersonnelController::class, 'create'])->name('personnels.create');
    Route::post('/personnels', [PersonnelController::class, 'store'])->name('personnels.store');
    Route::get('/personnels/{personnel}', [PersonnelController::class, 'show'])->name('personnels.show');
    Route::get('/personnels/{personnel}/edit', [PersonnelController::class, 'edit'])->name('personnels.edit');
    Route::put('/personnels/{personnel}', [PersonnelController::class, 'update'])->name('personnels.update');
    Route::delete('/personnels/{personnel}', [PersonnelController::class, 'destroy'])->name('personnels.destroy');

    // Affectations Routes (Assuming they depend on Profil)
    Route::get('/profils/{profil}/affectations', [AffectationController::class, 'index'])->name('affectations.index');
    Route::get('/profils/{profil}/affectations/chart', [AffectationController::class, 'chart'])->name('affectations.chart');
    Route::get('/profils/{profil}/affectations/create', [AffectationController::class, 'create'])->name('affectations.create');
    Route::post('/profils/{profil}/affectations', [AffectationController::class, 'store'])->name('affectations.store');
    Route::get('/profils/{profil}/affectations/{affectation}/edit', [AffectationController::class, 'edit'])->name('affectations.edit');
    Route::put('/profils/{profil}/affectations/{affectation}', [AffectationController::class, 'update'])->name('affectations.update');
    Route::delete('/profils/{profil}/affectations/{affectation}', [AffectationController::class, 'destroy'])->name('affectations.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
