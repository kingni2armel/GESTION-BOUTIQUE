<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTE DE MES PAIEMENTS</title>
</head>
<body>
    @include('layout.header')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste de mes paiements</h4>

                    @if (session()->has('notification.message'))
                            <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                    {{session('notification.message')}}
                            </div>
                   @endif
                   
                    <div class="table-responsive">
                                @if ($listepaiement->count()>0)
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th> # </th>
                                        <th> Nom boutique</th>
                                        <th> Prix de la boutique</th>
                                        <th> Somme verse </th>
                                        <th> Mois </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                                @foreach ($listepaiement as $data )
                                                        <tr>
                                                            <td>{{$row ++}}</td>
                                                                <td>{{$data->numero_boutique}}</td>
                                                        
                                                    
                                                            <td>{{$data->prix}} FCFA</td>
                                                        
                                                    
                                                            <td>{{$data->prixp}} FCFA</td>
                                                        

                                                        
                                                            <td>{{$data->nom_mois}}</td>

                                                     
                                                    </tr>
                                                @endforeach
                                    </tbody>
                                  </table>

                                  @else
                                        <span>Vous n'avez pas encore effectue de paiement</span>
                                    
                                @endif
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <style>
       
    </style>
</body>
</html>