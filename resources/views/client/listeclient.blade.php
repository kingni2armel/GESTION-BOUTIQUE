<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTE CLIENT</title>
</head>
<body>
    @include('layout.header')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des clients</h4>

                    @if (session()->has('notification.message'))
                            <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                    {{session('notification.message')}}
                            </div>
                   @endif
                   
                    <div class="table-responsive">
                                @if ($infoclient->count()>0)
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th> Numero </th>
                                        <th> Nom </th>
                                        <th> Prenom </th>
                                        <th> Email </th>
                                        <th> Numero telephone </th>
                                        <th>Operation</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                                @foreach ($infoclient as $infoclients )
                                                        <tr>
                                                            <td>{{$numero ++}}</td>
                                                                <td>{{$infoclients->nom}}</td>
                                                        
                                                    
                                                            <td>{{$infoclients->prenom}}</td>
                                                        
                                                    
                                                            <td>{{$infoclients->email}}</td>
                                                        

                                                        
                                                            <td>{{$infoclients->numero_telephone}}</td>

                                                            <td>
                                                                    <div class="parent">
                                                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                                                            <form action="{{route('DELETECLIENT',['id'=>$infoclients->id])}}" method="post">
                                                                                @csrf
                                                                                <button class="buton" type="submit">
                                                                                    <i  style="color:red"class="mdi mdi-delete-forever"></i> 

                                                                                </button>
                                                                            </form>
                                                                        </div>
        
                                                                          <div class="col-sm-6 col-md-4 col-lg-3">
                                                                                <a href="{{route('GETPAGEUPDATE',['id'=>$infoclients->id])}}"> <i  style =" color:green"class="mdi mdi-marker"></i> </a>
                                                                            
                                                                          </div>
                                                                          <div class="col-sm-6 col-md-4 col-lg-3">
                                                                                <a href="{{route('GETPAGEADDPAIEMENT',['id'=>$infoclients->id])}}">  <i class="mdi mdi-account-multiple-plus"></i>
                                                                                </a>
                                                                                <a href="{{route('LISTEPAIEMENTBYCLIENT',['id'=>$infoclients->id])}}"><i class="mdi mdi-format-list-bulleted"></i>
                                                                                </a>
                                                                          </div>
                                                                    </div>
                                                            </td>
                                                    </tr>
                                                @endforeach
                                    </tbody>
                                  </table>

                                  @else
                                        <span>il n'existe pas de client</span>
                                    
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