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
        $infoclient = DB::table('utilisateurs')
        ->join('clients','utilisateurs.id','=','clients.user_id')
        ->select('utilisateurs.nom','utilisateurs.prenom','clients.id')
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
                'prix'=>$request->prix
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
        ->join('utilisateurs','utilisateurs.id','clients.user_id')
        ->select('utilisateurs.nom','utilisateurs.prenom','clients.id','boutiques.prix','boutiques.numero_boutique')
        ->get();

     //   die($infoboutique);
        return view('boutique.listeboutique',['infoboutique'=>$infoboutique,
        'numero'=>$numero
       
    ]);
    }

    /** function qui permet de renvoyer la page de modification d'une boutique */


    public function GETPAGEUPDATEBOUTIQUE()

    {
            $id = $_GET['id'];
            $boutique = Boutique::where('id',$id)->select('boutiques.*')->get();
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
}
