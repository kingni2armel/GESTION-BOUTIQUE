<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Fcades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Client;
use App\Models\Boutique;
use App\Models\Mois;
use App\Models\Paiement;




class PaiementController extends Controller
{
    //

    public function GETPAGEADDPAIEMENT()
    {
        $id =$_GET['id'];
        $mois = Mois::all();
        $boutique = DB::table('clients')
        ->join('boutiques','clients.id','=','boutiques.client_id')
        ->select('boutiques.*')
        ->where('clients.id',$id)
        ->get();
        $client = DB::table('utilisateurs')
        ->join('clients','utilisateurs.id','=','clients.user_id')
        ->select('utilisateurs.nom','utilisateurs.prenom','clients.id')
        ->where('clients.id',$id)
        ->get();
        
        return view('paiement.addpaiement',[
            'mois'=>$mois,
            'boutique'=>$boutique,
            'client'=>$client
        ]);
    }

      /**
     * function qui renvoie la liste des clients
     */

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

    /** function qui permet de creer un paiement */

    public function ADDPAIEMENT(Request $request)
    {
            $request->validate([
                'client'=>['required'],
                'boutique'=>['required'],
                'mois'=>['required'],
                'prix'=>['required'],
                'date'=>['date']
            ]);

            $paiement = Paiement::create([
                    'client_id'=>$request->client,
                    'boutique_id'=>$request->boutique,
                    'mois_id'=>$request->mois,
                    'prixp'=>$request->prix,
                    'date'=>$request->date
            ]);

            session()->flash('notification.message','Paiement effectué avec success');
            session()->flash('notification.type','success');
            return redirect()->route('GETPAGELISTECLIENT');

    }

    /** function qui renvoie la liste des paiements de chaque client */

    public function LISTEPAIEMENTBYCLIENT()
    {
        $numero = 1;
        $id = $_GET['id'];
        $infopaiement = DB::table('clients')
        ->join('paiements','clients.id','=','paiements.client_id')
        ->join('mois','paiements.mois_id','=','mois.id')
        ->join('boutiques','paiements.boutique_id','=','boutiques.id')
        ->select('paiements.prixp','paiements.id','paiements.date','boutiques.numero_boutique','boutiques.prix','mois.nom_mois')
        ->where('clients.id',$id)
        ->get();

        return view('paiement.listepaiementparclient',[
            'infopaiement'=>$infopaiement,
            'numero'=>$numero
        ]

    
    );

    }

    public function GETPAGEMODIFIERPAIEMENT()
    {
        $id=$_GET['id'];
        $mois = Mois::all();
        $boutique = Boutique::all();

        $infopaiement = DB::table('clients')
        ->join('paiements','clients.id','=','paiements.client_id')
        ->join('mois','paiements.mois_id','=','mois.id')
        ->join('boutiques','paiements.boutique_id','=','boutiques.id')
        ->select('paiements.prixp','paiements.date','boutiques.numero_boutique','boutiques.prix','mois.nom_mois')
        ->where('paiements.id',$id)
        ->get();

        return view('paiement.updatepaiement',[
            'infopaiement'=>$infopaiement,
            'mois'=>$mois,
            'boutique'=>$boutique
        ]);


    }

    public function UPDATEPAIEMENT(Request $request,$id)
    {

            $paiement= Paiement::find($id);


            $request->validate([
              
                'boutiqueupdate'=>['required'],
                'moisupdate'=>['required'],
                'prixupdate'=>['required'],
                'dateupdate'=>['date']
            ]);
            $paiement->update([
                'boutique_id'=>$request->boutiqueupdate,
                'mois_id'=>$request->moisupdate,
                'prixp'=>$request->prixupdate,
                'date'=>$request->dateupdate
            ]);

            session()->flash('notification.message','Paiement modifié avec success');
            session()->flash('notification.type','success');
            return redirect()->route('GETPAGELISTECLIENT');
     
    }



    /*** function qui permet de supprimer un paiement */


    public function DELETEPAIEMENT(Request $request,$id)

    {
            $paiementdelete = Paiement::find($id);
            $paiementdelete->delete();
            session()->flash('notification.message','Paiement supprimé avec success');
            session()->flash('notification.type','danger');
            return redirect()->route('GETPAGELISTECLIENT');
    }
  
}
