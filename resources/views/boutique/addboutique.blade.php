<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CREER BOUTIQUE</title>
</head>
<body>
        @include('layout.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid page-body-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Creer une boutique</h4>


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
                            <form class="forms-sample" action="{{route('CREATEBOUTIQUE')}}" method="post">

                                @csrf
                              <div class="form-group">
                                <label for="exampleInputName1">Numero</label>
                                <input type="text" name = "numero" class="form-control" id="exampleInputName1" placeholder=" Numero">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputName1">Numero</label>
                                <input type="number" name = "prix" class="form-control" id="exampleInputName1" placeholder=" Prix">
                              </div>
                         
                             
                              <div class="form-group">
                                <label for="exampleSelectGender">Locataire</label>
                                <select name="client" class="form-control" id="exampleSelectGender">
                                        @foreach ($infoclient as $infoclients )
                                                <option value="{{$infoclients->id}}">{{$infoclients->nom}} {{$infoclients->prenom}}</option>
                                        @endforeach
                                </select>
                              </div>
                           
                            
                              <button type="submit" class="btn btn-primary mr-2">Submit</button>
                              <button class="btn btn-dark">Cancel</button>
                            </form>
                          </div>
                        </div>
                      </div>              
                    </div>
                </div>
            </div>

</body>
</html>