<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <h4 class="card-title">Liste des boutiques</h4>
                   
                    @if (session()->has('notification.message'))
                        <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                {{session('notification.message')}}
                        </div>
                   @endif
                    <div class="table-responsive">
                                @if ($infoboutique->count()>0)
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th> Numero </th>
                                        <th> Nom locataire </th>
                                        <th> Prenom locataire </th>
                                        <th> Prix boutique </th>
                                        <th> Numero boutique </th>
                                        <th>Operation</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                                @foreach ($infoboutique as $infoboutiques )
                                                        <tr>
                                                            <td>{{$numero ++}}</td>
                                                                <td>{{$infoboutiques->nom}}</td>
                                                        
                                                    
                                                            <td>{{$infoboutiques->prenom}}</td>
                                                        
                                                    
                                                            <td>{{$infoboutiques->prix}}</td>
                                                        

                                                        
                                                            <td>{{$infoboutiques->numero_boutique}}</td>

                                                            <td>
                                                                    <div class="parent">
                                                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                                                            <i  style="color:red"class="mdi mdi-delete-forever"></i> 
                                                                          </div>
        
                                                                          <div class="col-sm-6 col-md-4 col-lg-3">
                                                                              <a href="{{route('GETPAGEUPDATEBOUTIQUE',['id'=>$infoboutiques->id])}}"> <i  style =" color:green"class="mdi mdi-marker"></i> </a>

                                                                          </div>
                                                                    </div>
                                                            </td>
                                                    </tr>
                                                @endforeach
                                    </tbody>
                                  </table>

                                  @else
                                        <span>il n'existe pas de boutique</span>
                                    
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