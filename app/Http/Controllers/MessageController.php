<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;




class MessageController extends Controller
{
    //


    /*** function qui renvoie la page d'envoie d'un message */

    public function GETPAGEADDMESSAGE()

    {
            $admin =  'admin';
            $user =  User::where('users.role','admin')->get();

            return view('message.addmessage',[

                'user'=>$user   
            ]);

    }


    public function SENDMESSAGE(Request $request)

    {
            $today = Carbon::today();
            $id = auth()->user()->id;
            $request->validate([
                'message'=>['required','min:1','max:500'],
                'destinataire'=>['required'],
                
            ]);

            $message = Message::create([
                'destinateur_id'=>$id,
                'destinataire_id'=>$request->destinataire,
                'message'=>$request->message,
                'date_envoie'=>$today
            ]);

            session()->flash('notification.message','message envoyé avec success');
            session()->flash('notification.type','success');
            return redirect()->route('GETPAGEADDMESSAGE');
    }


  /*** function qui permet de repondre a un message */

  public function GETPAGEREPONDREMESSAGE()
  {
      $id = $_GET['id'];

      $user = User::where('id',$id)->get();
      return view('message.repondremessage',[
          'user'=>$user
      ]);
  }

    /** fucntion qui permet de repondre au message */

    public function  REPONDREMESSAGE(Request $request,$id)
    {
        $ids = auth()->user()->id;
        $today = Carbon::today();
        $destinataire =  User::where('id',$id)
        ->select('id')
        ->get();
        $destinataire_id = $destinataire->first();
        $destinataire= $destinataire_id->id;
        
        $request->validate([
            'message'=>['required','min:1','max:500'],            
        ]);
        $message = Message::create([
            'destinateur_id'=>$ids,
            'destinataire_id'=>$destinataire,
            'message'=>$request->message,
            'date_envoie'=>$today
        ]);

        session()->flash('notification.message','reponse envoyé avec success');
        session()->flash('notification.type','success');
        return redirect()->route('GETPAGEADDMESSAGE');
        

    }


    public function GETLISTEMESSAGE(){
            $id = auth()->user()->id;
            $row = 1;
            $listeMessage =  DB::table('users')
            ->join('messages','users.id','messages.destinateur_id')
            ->select('users.id','users.nom','users.prenom','messages.date_envoie','messages.message')
            ->where('messages.destinataire_id',$id)
            ->orderBy('messages.id','desc')
            ->get();

            return view('message.listemesmessages',[
                'listemessages'=>$listeMessage,
                'row'=>$row
            ]);

    }

  
}
