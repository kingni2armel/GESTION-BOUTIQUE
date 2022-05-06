<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MODIFIER CLIENT</title>
</head>
<body>
        @include('layout.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid page-body-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            @foreach ($infoclient as $infoclients )
                                       <h4 class="card-title">Modifier le  client {{$infoclients->nom}} {{$infoclients->prenom}}</h4>

                            @endforeach

                        
                            @if($errors->any())
                                {
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                        <div class="text-red-500 ">
                                                    <p> {{$error}}</p>
                                        </div>
                                    @endforeach
                                    </div>
                            
                                } 
            
            
                       @endif

                       @if (session()->has('notification.message'))
                        <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                {{session('notification.message')}}
                        </div>
                   @endif



                                @foreach ($infoclient as $infoclients )
                                            <form class="forms-sample" action="{{route('UPDATECLIENT',['id'=>$id=$_GET['id'],'idu'=>$idu=$infoclients->user_id])}}" method="POST">

                                                @csrf
                
                                                <div class="form-group">
                                                <label for="exampleInputName1">Nom</label>
                                                <input type="text" name="nomupdate" class="form-control" id="exampleInputName1" value="{{$infoclients->nom}}">
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputEmail3">Prenom</label>
                                                <input type="prenom" name="prenomupdate" class="form-control" id="exampleInputEmail3" value="{{$infoclients->prenom}}">
                                                </div>
                
                                                <div class="form-group">
                                                <label for="exampleInputEmail3">Email</label>
                                                <input type="email" name="emailupdate" class="form-control" id="exampleInputEmail3"value="{{$infoclients->email}}">
                                                </div>
                
                                                <div class="form-group">
                                                <label for="exampleInputEmail3">Numero de telephone</label>
                                                <input type="phone" name="phoneupdate" class="form-control" id="exampleInputEmail3" value="{{$infoclients->numero_telephone}}">
                                                </div>
                
                
                                                <div class="form-group">
                                                <label for="exampleInputPassword4">Password</label>
                                                <input type="password" name="passwordupdate" class="form-control" id="exampleInputPassword4" placeholder="Password">
                                                </div>
                                            
                                                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                                                <button class="btn btn-dark">Cancel</button>
                                            </form>
                                @endforeach
                          </div>
                        </div>
                      </div>              
                    </div>
                </div>
            </div>

</body>
</html>