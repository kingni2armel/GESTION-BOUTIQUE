<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Fcades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cient;
use App\Models\Boutique;

class BoutiqueController extends Controller
{
    //
    public function GETPAGECREATEBOUTIQUE()
    {
        $infoclient = DB::table('users')
        ->join('clients','users.id','=','clients.user_id')
        ->select('users.nom','users.prenom','clients.id')
        ->where('clients.statut_client',1)
        ->get();
        return view('boutique.addboutique',
        ['infoclient'=>$infoclient]
    );
    }


    public function CREATEBOUTIQUE(Request $request)

    {
            $request->validate([
                    'numero'=>['required'],
                    'client'=>['required'],
                    'prix'=>['required']
            ]);

            $boutique  = Boutique::create([
                'client_id'=>$request->client,
                'numero_boutique'=>$request->numero,
                'prix'=>$request->prix,
                'statut_boutique'=>1
            ]);
            session()->flash('notification.message','Boutique crée avec success');
            session()->flash('notification.type','success');

            return redirect()->route('GETPAGECREATEBOUTIQUE');

    }

    /** FUNCTION QUI RENVOIE A LA PAGE QUI LISTE LES BOUTIQUES */

    public function GETLISTEBOUTIQUE    ()
    {
        $numero=1;
        $infoboutique = DB::table('clients')
        ->join('boutiques','clients.id','=','boutiques.client_id')
        ->join('users','users.id','clients.user_id')
        ->select('users.nom','users.prenom','clients.id','boutiques.prix','boutiques.id','boutiques.numero_boutique','clients.statut_client')
        ->get();
        
  
    //   /  die($infoboutique);

     //   die($infoboutique);
        return view('boutique.listeboutique',[
        'infoboutique'=>$infoboutique,
        'numero'=>$numero
       
    ]);
    }

    /** function qui permet de renvoyer la page de modification d'une boutique */


    public function GETPAGEUPDATEBOUTIQUE()

    {
            $id = $_GET['id'];
            $boutique = Boutique::where('id',$id)
            ->select('boutiques.*')->get();
           // die($boutique);
            return view('boutique.updateboutique',[
                'boutique'=>$boutique
            ]);
 
    }


    /** function qui permet de modifier une boutique  */


    public function  UPDATEBOUTIQUE(Request $request,$id)

    {
            $boutique = Boutique::find($id);

            $request->validate([
                'numeroupdate'=>['required'],
                'prixupdate'=>['required']
            ]);

            $boutique->update([
                'prix'=>$request->prixupdate,
                'numero_boutique'=>$request->numeroupdate
            ]);

            session()->flash('notification.message','Boutique modifié avec success');
            session()->flash('notification.type','success');

            return redirect()->route('GETLISTEBOUTIQUE');
    }

    /*** function qui permet de supprimer une boutique */


    public function DELETEBOUTIQUE(Request $request,$id)

    {
        $boutique = Boutique::find($id);
        $boutique->update([
            'statut_boutique'=>0
        ]);
        session()->flash('notification.message','Boutique désactivé avec success');
        session()->flash('notification.type','danger');
        return redirect()->route('GETLISTEBOUTIQUE');

    }


    /*** function qui permet de modifier le  proprietaire d'une boutique */



    public function GETPAGEUPDATEPROPRIETAIRE()
    {
        $id = $_GET['id'];
        $listeclients = DB::table('users')
        ->join('clients','users.id','=','clients.user_id')
        ->select('clients.id','users.nom','users.prenom')
        ->where('clients.statut_client',1)
        ->orderBy('clients.id','DESC')
        ->get();
        
        $boutique = Boutique::where('boutiques.id',$id)->get();
        return view('boutique.updateproprietaire',[
            'listeclients'=>$listeclients,
            'boutique'=>$boutique
        ]);

    }

    /** function update proprietaire  */


    public function UPDATEPROPRIETAIRE(Request $request,$id)
    {
                $request->validate([
                        'nouveau'=>['required']
                ]);
                $boutique  =  Boutique::find($id);

                $boutique->update([
                        'client_id'=>$request->nouveau
                ]);

                session()->flash('notification.message','Proprietaire modifié avec success');
                session()->flash('notification.type','succces');
                return redirect()->route('GETLISTEBOUTIQUE');

    }

}
