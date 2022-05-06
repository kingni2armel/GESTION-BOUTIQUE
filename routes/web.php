<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\UserController;



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

Route::get('/dashboard',[UserController::class,'getdash'])->name('getdash')
->middleware('auth');


Route::get('/ajouter',[BoutiqueController::class,'GETPAGECREATEBOUTIQUE'])->name('GETPAGECREATEBOUTIQUE')
->middleware('auth');
Route::post('/ajouter',[BoutiqueController::class,'CREATEBOUTIQUE'])->name('CREATEBOUTIQUE')
->middleware('auth');
Route::get('/listeboutique',[BoutiqueController::class,'GETLISTEBOUTIQUE'])->name('GETLISTEBOUTIQUE')
->middleware('auth');
Route::get('/modifierboutique',[BoutiqueController::class,'GETPAGEUPDATEBOUTIQUE'])->name('GETPAGEUPDATEBOUTIQUE')
->middleware('auth');
Route::post('modifierboutique/{id}',[BoutiqueController::class,'UPDATEBOUTIQUE'])->name('UPDATEBOUTIQUE')
->middleware('auth');


/**les routes du controlleur client */

Route::get('addclient',[ClientController::class,'GETPAGECREATECLIENT'])->name('GETPAGECREATECLIENT')
->middleware('auth');
Route::post('addclient',[ClientController::class,'CREATECLIENT'])->name('CREATECLIENT')
->middleware('auth');
Route::get('listeclient',[ClientController::class,'GETPAGELISTECLIENT'])->name('GETPAGELISTECLIENT')
->middleware('auth');
Route::post('deleteclient/{id}',[ClientController::class,'DELETECLIENT'])->name('DELETECLIENT')
->middleware('auth');
Route::get('modifier',[ClientController::class,'GETPAGEUPDATE'])->name('GETPAGEUPDATE')
->middleware('auth');
Route::post('modifier/{id}/{idu}',[ClientController::class,'UPDATECLIENT'])->name('UPDATECLIENT')
->middleware('auth');


/*** les controlleurs de paiement */


Route::get('addpaiement',[PaiementController::class,'GETPAGEADDPAIEMENT'])->name('GETPAGEADDPAIEMENT')
->middleware('auth');
Route::post('addpaiements',[PaiementController::class,'ADDPAIEMENT'])->name('ADDPAIEMENT')
->middleware('auth');
Route::get('liste',[PaiementController::class,'GETPAGELISTECLIENT'])->name('GETPAGELISTECLIENT')
->middleware('auth');
Route::get('listepaiement',[PaiementController::class,'LISTEPAIEMENTBYCLIENT'])->name('LISTEPAIEMENTBYCLIENT')
->middleware('auth');
Route::get('modifierpaiement',[PaiementController::class,'GETPAGEMODIFIERPAIEMENT'])->name('GETPAGEMODIFIERPAIEMENT')
->middleware('auth');
Route::post('modifierpaiement/{id}',[PaiementController::class,'UPDATEPAIEMENT'])->name('UPDATEPAIEMENT')
->middleware('auth');
Route::post('deletepaiement/{id}',[PaiementController::class,'DELETEPAIEMENT'])->name('DELETEPAIEMENT')
->middleware('auth');




Route::get('/login',[UserController::class,'GOCONNECT'])->name('GOCONNECT');

Route::get('/redirection',[UserController::class,'Redirection'])->name('Redirection');

Route::post('/login',[UserController::class,'Authenticate'])->name('Authenticate');

Route::get('/deconnexion',[UserController::class,'Logout'])->name('Logout')
->middleware('auth');


Route::get('/update',[UserController::class,'GETPAGEUPDATEINFORMATION'])->name('GETPAGEUPDATEINFORMATION')
->middleware('auth');
Route::post('/updates',[UserController::class,'UpdateUser'])->name('UpdateUser')
->middleware('auth');