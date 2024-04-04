<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'Home']) -> name('home');
Route::get('/cook', [HomeController::class, 'CookHome']) -> name('cook');


Route::get('/register', [InscriptionController::class,'InscriptionForm'])->name('register');
Route::post('/register', [InscriptionController::class,'Inscription']);
Route::get('/changementMDP', [InscriptionController::class,'ModifierMDPForm'])->name('modifMDP')->middleware('auth');
Route::post('/changementMDP', [InscriptionController::class,'ModifierMDP'])->middleware('auth');
Route::get('/createAdmin', [InscriptionController::class,'formCreateAdmin'])->name('createAdmin')->middleware('auth');
Route::post('/createAdmin', [InscriptionController::class,'createAdmin'])->middleware('auth');
Route::get('/createCook', [InscriptionController::class,'formCreateCook'])->name('createCook')->middleware('auth');
Route::post('/createCook', [InscriptionController::class,'createCook'])->middleware('auth');
Route::get('/utilisateurs', [InscriptionController::class, 'listeUtilisateurs'])->name('utilisateurs.index');
Route::delete('/users/{id}', [InscriptionController::class, 'deleteUser'])->name('users.delete');


Route::get('/login', [ConnexionController::class,'ConnexionForm'])->name('login');
Route::post('/login', [ConnexionController::class,'Connexion']);
Route::get('/logout', [ConnexionController::class,'Déconnexion'])->name('logout');


Route::delete('/delete',[PizzaController::class, 'Supprimer']) -> name("supprimer")-> middleware('isAdmin');
Route::get('/ajout',[PizzaController::class, 'AjouterForm']) -> name('ajouter')-> middleware('isAdmin');
Route::post('/ajout',[PizzaController::class, 'Ajouter'])->middleware('auth')->middleware('isAdmin');
Route::get('/modification',[PizzaController::class, 'ModifierForm']) -> name('modification')-> middleware('isAdmin');
Route::post('/modification',[PizzaController::class, 'Modifier'])-> middleware('isAdmin');


Route::get('/panier', [CommandeController::class, 'voirPanier']) -> name('panier')->middleware('auth');
Route::get('/ajoutPanier', [CommandeController::class, 'ajoutPanier']) -> name('ajoutPanier')->middleware('auth');
Route::get('/ajoutPanierRapide', [CommandeController::class, 'ajoutPanierRapide'])->name('ajoutPanierRapide')->middleware('auth');
Route::get('/deletePanier', [CommandeController::class, 'deletePanier'])->name('deletePanier')->middleware('auth');
Route::get('/creationCommande',[CommandeController::class, 'creationCommande']) -> name("creationCommande")->middleware('auth');
Route::get('/statut', [CommandeController::class, 'statutView']) -> name('statutView');
Route::get('/statutModif', [CommandeController::class, 'statutModif']) -> name('statutModif');
Route::get('/detailCommande', [CommandeController::class, 'detailCommande']) -> name('detailCommande')->middleware('auth');
Route::get('/commandes',[CommandeController::class,'commandes']) -> name('commandeEnv')->middleware('auth');
Route::get('/allCommandes',[CommandeController::class,'allCommandes']) -> name('adminCommande')->middleware('isAdmin');
Route::get('/commandeDate', [CommandeController::class,'commandeForm'])->name('commandeDateForm')->middleware('isAdmin');
Route::post('/commandeDate', [CommandeController::class,'commandeDate'])->name('commandeDate')->middleware('isAdmin');
Route::get('/triCommande', [CommandeController::class,'triCommande'])->name('triCommande')->middleware('isAdmin');
Route::get('/recette', [CommandeController::class, 'recetteDuJour'])->name('recette');
