<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTE PAIEMENT</title>
</head>
<body>
    @include('layout.header')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des paiements</h4>
                   
                    @if (session()->has('notification.message'))
                        <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                {{session('notification.message')}}
                        </div>
                   @endif
                    <div class="table-responsive">
                                @if ($infopaiement->count()>0)
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th> Numero </th>
                                        <th> Mois </th>
                                        <th> Numero boutique </th>
                                        <th> Prix boutique  </th>
                                        <th> Prix verse </th>
                                        <th>Date</th>
                                        <th>Operation</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                                @foreach ($infopaiement as $infopaiements )
                                                        <tr>
                                                            <td>{{$numero ++}}</td>
                                                                <td>{{$infopaiements->nom_mois}}</td>
                                                        
                                                    
                                                            <td>{{$infopaiements->numero_boutique}}</td>
                                                        
                                                    
                                                            <td>{{$infopaiements->prix}}</td>
                                                        

                                                        
                                                            <td>{{$infopaiements->prixp}}</td>
                                                            <td>{{$infopaiements->date}}</td>


                                                            <td>
                                                                    <div class="parent">
                                                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                                                            <form action="{{route('DELETEPAIEMENT',['id'=>$infopaiements->id])}}" method="post">
                                                                              @csrf  
                                                                              <button class="buton" type="submit"><i  style="color:red"class="mdi mdi-delete-forever"></i>                                                                                 </button>
                                                                            </form>  
                                                                        </div>
        
                                                                          <div class="col-sm-6 col-md-4 col-lg-3">
                                                                              <a href="{{route('GETPAGEMODIFIERPAIEMENT',['id'=>$infopaiements->id])}}"> <i  style =" color:green"class="mdi mdi-marker"></i> </a>

                                                                          </div>
                                                                    </div>
                                                            </td>
                                                    </tr>
                                                @endforeach
                                    </tbody>
                                  </table>

                                  @else
                                        <span>il n'a fait aucun paiement</span>
                                    
                                @endif
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <style>
        .parent{
            display: flex;
        }
    </style>
</body>
</html>