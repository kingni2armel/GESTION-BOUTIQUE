<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
{

    //
    /** function qui renvoie a la page de d3e creaton du client */
    public function GETPAGECREATECLIENT()
    {
            return view('client.addclient');
    }


    /***  function qui permet de creer un client */

    public function CREATECLIENT(Request $request)

    {
            $request->validate([
                'nom'=>['required'],
                'prenom'=>['required'],
                'email'=>['required'],
                'phone'=>['required'],
                'password'=>['required']
            ]);

            $user = User::create([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'email'=>$request->email,
                'numero_telephone'=>$request->phone,
                'role'=>'client',
                'password'=>Hash::make($request->password),
            ]);
        
            $client = Client::create([
                'user_id'=>$user->id,
                'statut_client'=>1
            ]);

            session()->flash('notification.message','Client crée avec success');
            session()->flash('notification.type','success');
            return redirect()->route('GETPAGECREATECLIENT');

    }

    /*** FUNCTION QUI PERMET DE DONNER LA LISTE DES CLIENTS */


    public   function GETPAGELISTECLIENT()

    {
        $numero = 1;
        $nombreclient = Client::paginate(7);
        $infoclient = DB::table('users')
        ->join('clients','users.id','=','clients.user_id')
        ->select('users.nom','users.prenom','users.email','users.numero_telephone','clients.id')
        ->get();

        dd($infoclient);

        return view('client.listeclient', [

                'infoclient'=>$infoclient,
                'nombreclient'=>$nombreclient,
                'numero'=>$numero
    
    
    ]);
    }

    /*** function qui renvoie a la page de modification du client */

    public function GETPAGEUPDATE()
    
    {
        $id = $_GET['id'];
        $infoclient = DB::table('users')
        ->join('clients','users.id','=','clients.user_id')
        ->select('users.nom','users.prenom','users.email','users.numero_telephone','clients.id','clients.user_id')
        ->where('clients.id',$id)
        ->get();

        

        return view('client.updateclient',[

            'infoclient'=>$infoclient
        ]);
    }

    /** function qui permet de modifier un utilisateur 
     * @param[id] : id du client
     * @param[idu]: som en id d'utilisateur
    */


    public function UPDATECLIENT(Request $request,$id,$idu)
    {
            $request->validate([
                'nomupdate'=>['required'],
                'prenomupdate'=>['required'],
                'emailupdate'=>['required'],
                'phoneupdate'=>['required'],
                
                'passwordupdate'=>['required']
            ]);

             $client = Client::find($id);
             $user = User::find($idu);

            $user->update([
                'nom'=>$request->nomupdate,
                'prenom'=>$request->prenomupdate,
                'email'=>$request->emailupdate,
                'numero_telephone'=>$request->phoneupdate,
                'password'=>$request->passwordupdate

            ]);

            session()->flash('notification.message','Client modifié avec success');
            session()->flash('notification.type','success');
            return redirect()->route('GETPAGELISTECLIENT');


    }

    /*** function qui permet de renvoyer la liste des  paiement d'un client */

    public function   GETLISTEPAIEMENTBYCLIENT()

    {

        $iduser = auth()->user()->id;
        $row = 1;
        $clientid =  Client::where('clients.user_id',$iduser)->get();
        $client = $clientid->first();
        $datId =  $client->id;

        $listepaiement = DB::table('clients')
        ->join('paiements','clients.id','=','paiements.client_id')
        ->join('boutiques','paiements.boutique_id','=','boutiques.id')
        ->join('mois','paiements.mois_id','=','mois.id')
        ->select('paiements.id','paiements.prixp','boutiques.numero_boutique','boutiques.prix','mois.nom_mois')
        ->where('paiements.client_id',$datId)
        ->get();
      
      //  die($listepaiement);
        return view('client.mespaiement',[
            'row'=>$row,
            'listepaiement'=>$listepaiement
        ]);
    }

    /** function qui permet de supprimer un client */

    public function DELETECLIENT(Request $request,$id)
    {
            $client = Client::find($id);
            
            $client->update([
                'statut_client'=>0
            ]);
            session()->flash('notification.message','Client Désactivé avec success');
            session()->flash('notification.type','danger');
            return redirect()->route('GETPAGELISTECLIENT');
    }

    /*** fcuntion qui permet a un client de pouvoir imprimer son recu */

    public function GETPAGEIMPRIMERRECU()

    {
            $idpaiement =  $_GET['id'];

            $informationspaiement = DB::table('users')
            ->join('clients','users.id','=','clients.user_id')
            ->join('paiements','clients.id','=','paiements.client_id')
            ->join('mois','paiements.mois_id','=','mois.id')
            ->join('boutiques','paiements.boutique_id','=','boutiques.id')
            ->select(
                    'boutiques.prix',
                    'boutiques.numero_boutique',
                    'users.nom',
                    'users.prenom',
                    'users.email',
                    'users.numero_telephone',
                    'paiements.prixp',
                    'paiements.date',
                    'mois.nom_mois'
            )
            ->where('paiements.id',$idpaiement)
            ->get();
            //die($informationspaiement);
            return view('client.imprimer',[
                'informationspaiement'=>$informationspaiement
            ]);
    }

}
