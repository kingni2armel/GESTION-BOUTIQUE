<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTE DE MES MESSAGES</title>
</head>
<body>
    @include('layout.header')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste de mes messages</h4>
                   
                    @if (session()->has('notification.message'))
                        <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                {{session('notification.message')}}
                        </div>
                   @endif
                    <div class="table-responsive">
                                @if ($listemessages->count()>0)
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th> # </th>
                                        <th> Nom du destinateur </th>
                                        <th> Date d'envoie </th>
                                        <th> Message  </th>
                                       
                                      </tr>
                                    </thead>
                                    <tbody>
                                                @foreach ($listemessages as $data )
                                                        <tr>
                                                            <td>{{$row ++}}</td>

                                                            <td>{{$data->nom}} {{$data->prenom}}</td>
                                                        
                                                    
                                                            <td>{{$data->date_envoie}}</td>
                                                        
                                                    
                                                            <td>{{$data->message}}</td>
                                                        

                                                            <td>
                                                                <div class="parent">
                                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                                        <form action="{{route('DELETEPAIEMENT',['id'=>$data->id])}}" method="post">
                                                                          @csrf  
                                                                          <button class="buton" type="submit"><i  style="color:red"class="mdi mdi-delete-forever"></i>                                                                                 </button>
                                                                        </form>  
                                                                    </div>
    
                                                                      <div class="col-sm-6 col-md-4 col-lg-3">
                                                                          <a href="{{route('GETPAGEREPONDREMESSAGE',['id'=>$data->id])}}"> <i title="repondre"  style =" color:green"class="mdi mdi-marker"></i> </a>

                                                                      </div>
                                                                </div>
                                                        </td>


                                    
                                                    </tr>
                                                @endforeach
                                    </tbody>
                                  </table>

                                  @else
                                        <span> Vous n'avez recu aucun message</span>
                                    
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