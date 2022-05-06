<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Utilisateur;
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

            $user = Utilisateur::create([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'email'=>$request->email,
                'numero_telephone'=>$request->phone,
                'password'=>Hash::make($request->password),
            ]);
        
            $client = Client::create([
                'user_id'=>$user->id
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
        $infoclient = DB::table('utilisateurs')
        ->join('clients','utilisateurs.id','=','clients.user_id')
        ->select('utilisateurs.nom','utilisateurs.prenom','utilisateurs.email','utilisateurs.numero_telephone','clients.id')
        ->get();
        return view('client.listeclient',
        ['infoclient'=>$infoclient,
        'nombreclient'=>$nombreclient,
        'numero'=>$numero
    
    
    ]);
    }

    /*** function qui renvoie a la page de modification du client */

    public function GETPAGEUPDATE()
    
    {
        $id = $_GET['id'];
        $infoclient = DB::table('utilisateurs')
        ->join('clients','utilisateurs.id','=','clients.user_id')
        ->select('utilisateurs.nom','utilisateurs.prenom','utilisateurs.email','utilisateurs.numero_telephone','clients.id','clients.user_id')
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
             $user = Utilisateur::find($idu);

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

    /** function qui permet de supprimer un client */

    public function DELETECLIENT(Request $request,$id)
    {
            $client = Client::find($id);
            $client->delete();
            session()->flash('notification.message','Client supprimé avec success');
            session()->flash('notification.type','danger');
            return redirect()->route('GETPAGELISTECLIENT');
    }
}
