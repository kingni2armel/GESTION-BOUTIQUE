<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Client;
use App\Models\Boutique;
use App\Models\Mois;
use App\Models\Paiement;


class UserController extends Controller
{
    //

    public function getdash()
    {
        $nombredeclient = Client::All();
        $nombredeboutique = Boutique::All();
        $nombredemois= Mois::All();
        $nombrepaiement= Paiement::All();

        return view('user.dash',[
            'nombredeclient'=>$nombredeclient,
            'nombredeboutique'=>$nombredeboutique,
            'nombredemois'=>$nombredemois,
            'nombrepaiement'=>$nombrepaiement   

        ]

    );
    }

  /*

     function qui permet de rediriger a la page de connexion quand tu essaies d'acceder
     a une page sans etre connecte

    */

      public function Redirection(){
        return view('welcome');
       }


       /**
         * page de connexion
        */

    public function GOCONNECT()
    {
        return view('welcome');
    }


        /*
          function d'auhentification
        */



    
        public function Authenticate(Request $request)
        {
                $request->validate([
                    'email'=>['required'],
                    'password'=>['required'],
                ]);

                if(auth()->attempt($request->only('email','password')))
                
                    {
                            return redirect()->route('getdash');
                    }
                return redirect()->back()->WithErrors('Les identifiants ne correspondent pas');
        }   
        
            /*
                    function de deconnexion
            */
        public function Logout()
        {
                    Session::flush();
                    Auth::logout();
                    return redirect()->route('GOCONNECT');
        }

        /** function qui permet de renvoyer a la page de modification des informations */


        public  function GETPAGEUPDATEINFORMATION()
        {
                return view('user.update');
        }

        /**  function qui permet de modifier les informations */
        public function UpdateUser(Request $request)

        {
                 $request->validate([
                    'nom'=>['required'],
                    'prenom'=>['required'],
                    'email'=>['required'],
                    'phone'=>['required'],
                    'password'=>['required']
                ]);

                $id = auth()->user()->id;
                $user = User::find($id);
                $user->update([
                    'nom'=>$request->nom,
                    'prenom'=>$request->prenom,
                    'email'=>$request->email,
                    'numero_telephone'=>$request->phone,
                    'password'=>Hash::make($request->password),
                ]);    
                session()->flash('notification.message','utilisateur modifié avec success');
                session()->flash('notification.type','success');
                return redirect()->route('GETPAGEUPDATEINFORMATION');
    
        }


}
