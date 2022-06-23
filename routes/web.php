<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;




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




Route::middleware(['auth','role:admin'])->group(function(){
/** les routes du controleurs user */

        Route::get('adduser',[UserController::class,'GETPAGEADDUSER'])->name('GETPAGEADDUSER');
        Route::post('adduser',[UserController::class,'ADDUSER'])->name('ADDUSER');
        /*** les routes de la boutique  */
        Route::post('/ajouter',[BoutiqueController::class,'CREATEBOUTIQUE'])->name('CREATEBOUTIQUE')
        ->middleware('auth');
        Route::get('/ajouter',[BoutiqueController::class,'GETPAGECREATEBOUTIQUE'])->name('GETPAGECREATEBOUTIQUE')
        ->middleware('auth');
        Route::get('/listeboutique',[BoutiqueController::class,'GETLISTEBOUTIQUE'])->name('GETLISTEBOUTIQUE')
        ->middleware('auth');
        Route::get('/modifierboutique',[BoutiqueController::class,'GETPAGEUPDATEBOUTIQUE'])->name('GETPAGEUPDATEBOUTIQUE')
        ->middleware('auth');

        Route::get('/updateproprietaire',[BoutiqueController::class,'GETPAGEUPDATEPROPRIETAIRE'])->name('GETPAGEUPDATEPROPRIETAIRE')
        ->middleware('auth');
        Route::post('modifierboutique/{id}',[BoutiqueController::class,'UPDATEBOUTIQUE'])->name('UPDATEBOUTIQUE')
        ->middleware('auth');

        Route::post('deleteboutique/{id}',[BoutiqueController::class,'DELETEBOUTIQUE'])->name('DELETEBOUTIQUE')
        ->middleware('auth');

        Route::post('updatepropritaire/{id}',[BoutiqueController::class,'UPDATEPROPRIETAIRE'])->name('UPDATEPROPRIETAIRE')
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


            Route ::get('addpaiement',[PaiementController::class,'GETPAGEADDPAIEMENT'])->name('GETPAGEADDPAIEMENT')
            ->middleware('auth');
            Route::post('addpaiements',[PaiementController::class,'ADDPAIEMENT'])->name('ADDPAIEMENT')
            ->middleware('auth');
            Route::get('liste',[PaiementController::class,'GETPAGELISTECLIENT'])->name('GETPAGELISTECLIENT')
            ->middleware('auth');
            Route::get('modifierpaiement',[PaiementController::class,'GETPAGEMODIFIERPAIEMENT'])->name('GETPAGEMODIFIERPAIEMENT')
            ->middleware('auth');
            Route::post('modifierpaiement/{id}',[PaiementController::class,'UPDATEPAIEMENT'])->name('UPDATEPAIEMENT')
            ->middleware('auth');
            Route::post('deletepaiement/{id}',[PaiementController::class,'DELETEPAIEMENT'])->name('DELETEPAIEMENT')
            ->middleware('auth');
            Route::get('listepaiement',[PaiementController::class,'LISTEPAIEMENTBYCLIENT'])->name('LISTEPAIEMENTBYCLIENT')
            ->middleware('auth');
            



} );

    Route::middleware(['auth','role:client'])->group(function(){

            Route::get('liste-paiement',[ClientController::class,'GETLISTEPAIEMENTBYCLIENT'])->name('GETLISTEPAIEMENTBYCLIENT')
            ->middleware('auth');

            Route::get('Imprimer-recu',[ClientController::class,'GETPAGEIMPRIMERRECU'])->name('GETPAGEIMPRIMERRECU')
            ->middleware('auth');
    });

    

    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/dashboard',[UserController::class,'getdash'])->name('getdash')
    ->middleware('auth');    

    Route::get('/login',[UserController::class,'GOCONNECT'])->name('GOCONNECT');

    Route::get('/redirection',[UserController::class,'Redirection'])->name('Redirection');

    Route::post('/login',[UserController::class,'Authenticate'])->name('Authenticate');

    Route::get('/deconnexion',[UserController::class,'Logout'])->name('Logout');

    Route::get('/update',[UserController::class,'GETPAGEUPDATEINFORMATION'])->name('GETPAGEUPDATEINFORMATION')
    ->middleware('auth');
    Route::post('/updates',[UserController::class,'UpdateUser'])->name('UpdateUser')
    ->middleware('auth');

/** les routes des messages */

    Route::get('add-message',[MessageController::class,'GETPAGEADDMESSAGE'])->name('GETPAGEADDMESSAGE')
    ->middleware('auth');
    Route::get('repondre-message',[MessageController::class,'GETPAGEREPONDREMESSAGE'])->name('GETPAGEREPONDREMESSAGE')
    ->middleware('auth');
    Route::get('list-message',[MessageController::class,'GETLISTEMESSAGE'])->name('GETLISTEMESSAGE')
    ->middleware('auth');
    Route::post('add-message',[MessageController::class,'SENDMESSAGE'])->name('SENDMESSAGE')
    ->middleware('auth');
    Route::post('repondre-message/{id}',[MessageController::class,'REPONDREMESSAGE'])->name('REPONDREMESSAGE')
    ->middleware('auth');