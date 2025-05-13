<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserMainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObjetController;
use App\Http\Controllers\Vitrine\HomeController;
use App\Http\Controllers\CategoryController;
use App\Models\SousCategorie;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;


    Route::get('/administrateur', [AdminHomeController::class, 'index'])->name('admin.index');
    Route::get('/message', [AdminHomeController::class, 'message'])->name('admin.message');
    Route::get('/notification', [AdminHomeController::class, 'notification'])->name('admin.notification');
    Route::get('/partage', [AdminHomeController::class, 'partage'])->name('admin.partage');
    Route::get('/bien', [AdminHomeController::class, 'bien'])->name('admin.bien');
    Route::get('/profile', [AdminHomeController::class, 'profile'])->name('admin.profile');
    Route::get('/signalement', [AdminHomeController::class, 'signalement'])->name('admin.signalement');
    Route::get('/statistique', [AdminHomeController::class, 'statistique'])->name('admin.statistique');
    Route::get('/utilisateur', [AdminHomeController::class, 'utilisateur'])->name('admin.utilisateur');


    Route::get('/', [HomeController::class, 'index'])->name('vitrine.index');
    Route::get('/contact', [HomeController::class, 'contact'])->name('vitrine.contact');
    Route::get('/apropos', [HomeController::class, 'apropos'])->name('vitrine.apropos');
    Route::get('/declarerBienRetrouve', [HomeController::class, 'declarerBienRetrouve'])->name('vitrine.declarerBienRetrouve');
    Route::get('/declarerPerte', [HomeController::class, 'declarerPerte'])->name('vitrine.declarerPerte');
    Route::get('/objetPerdus', [HomeController::class, 'objetPerdus'])->name('vitrine.objetPerdus');
    Route::get('/objetRetrouver', [HomeController::class, 'objetRetrouver'])->name('vitrine.objetRetrouver');
    Route::get('/barkeelou', [HomeController::class, 'barkeelou'])->name('vitrine.barkeelou');

    Route::get('/objets', [ObjetController::class, 'index'])->name('objets.index');
    Route::get('/objets/perdus', [ObjetController::class, 'index'])->name('objets.perdus');
    Route::get('/objets/search', [ObjetController::class, 'search'])->name('objets.search');
    Route::get('/objets-retrouves', [ObjetController::class, 'getObjetsRetrouver'])->name('objets.retrouves');

    Route::post('/ajouter-objet', [ObjetController::class, 'ajouterObjet_traitement'])->name('ajouterObjet.traitement');
    Route::put('/modifier-objet/{id}', [ObjetController::class, 'modifierObjet_traitement'])->name('modifierObjet.traitement');
    Route::delete('/supprimer-objet/{id}', [ObjetController::class, 'supprimerObjet'])->name('supprimerObjet');
    Route::put('/changer-statut-objet/{id}', [ObjetController::class, 'changerStatut'])->name('changerStatut');
    Route::get('/statistiques', [ObjetController::class, 'getStatistiques'])->name('statistiques');

    // Routes pour les sous-catégories
    Route::get('/getSousCategories/{categorie_id}', [HomeController::class, 'getSousCategories']);

    // Routes pour l'authentification
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
   // Route::post('/login', [HomeController::class, 'auth'])->name('login.submit');




    Route::post('/login', [LoginController::class, 'login']);


// Routes pour les objets perdus// Routes pour les objets perdus
Route::get('/objets/{id}/edit', [ObjetController::class, 'edit'])->name('objets.edit');
Route::put('/objets/{id}', [ObjetController::class, 'update'])->name('objets.update');
Route::delete('/objets/{id}', [ObjetController::class, 'destroy'])->name('objets.destroy');
Route::post('/objets/{id}/changer-statut', [ObjetController::class, 'changerStatut'])->name('objets.changerStatut');

Route::post('/addUser/traitement', [UserController::class, 'addUser_traitement']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





