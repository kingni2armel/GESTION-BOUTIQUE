<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMPRIMER MON RECU</title>
</head>
<body>
    @include('layout.header')

    <div class="main-panel">
        <div class="content-wrapper">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Mon recu </h4>

                        <button  class="btn btn-primary mr-2" onClick="imprimer('print')">Imprimer</button>


                            @foreach ($informationspaiement as $data )
                                <div id="print">
                                    <h3 style="text-transform: uppercase">FACTURE DU MOIS DE {{$data->nom_mois}}</h3>

                                    <div class="parentss">
                                    

                                        <div class="parent_item" style="float: left">
                                                        <p class="imp">Nom du client : <strong>{{$data->nom}}</strong></p>
                                                        <p class="imp">Prenom du client : <strong>{{$data->prenom}}</strong></p>
                                                        <p class="imp">Email du client: <strong>{{$data->email}}</strong></p>
                                                        <p class="imp">Numero de  téléphone: <strong>+237 {{$data->numero_telephone}}</strong></p>
                                                        <p class="imp">Numero de boutique : <strong>{{$data->numero_boutique}} </strong></p>
                                                        <p class="imp">Prix de la boutique : <strong>{{$data->prix}}  FCFA </strong></p>

                                           
                                             </div>

                                             <div  style="margin-left:500px;"class="parent_items ">
                                                    <p class="imp">Somme versé: <strong>{{$data->prixp}} FCFA</strong></p>
                                                    <p class="imp">Mois: <strong>{{$data->nom_mois}}</strong></p>
                                                    <p class="imp">Date du versement: <strong>{{$data->date}}</strong></p>
                                                    @if ($data->prix==$data->prixp)
                                                        <strong><p style="">FACTURE COMPLETEMENTE REGLE</p></strong>
                                                        
                                                    @elseif ($data->prixp<$data->prix)
                                                            <p class="color:red">FACTURE PAS COMPLETEMENT REGLE</p>

                                                    @endif

                                             </div>


                                    
                                  </div>
                                </div>
                            @endforeach

                    </div>
                </div>
           </div>
        </div>
    </div>
</body>
</html>