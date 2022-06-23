<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MODIFIER LE PROPRITAIRE</title>
</head>
<body>
        @include('layout.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid page-body-wrapper">
                    <div class="col-12 grid-margin stretch-card" style="height: 450px !important">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Modifier le proprietaire</h4>


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
                                    @foreach ($boutique as $boutiques )
                                    
                                                        <form class="forms-sample" action="{{route('UPDATEPROPRIETAIRE',['id'=>$id=$boutiques->id])}}" method="post">

                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Nouveau proprietaire</label>

                                                                <select name="nouveau"  class ="form-control"id="">
                                                                        @foreach ($listeclients as $item )
                                                                                    <option value="{{$item->id}}">{{$item->nom}} {{$item->prenom}}</option>
                                                                        @endforeach
                                                                </select>
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