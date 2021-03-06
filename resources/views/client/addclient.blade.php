<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CREER CLIENT</title>
</head>
<body>
        @include('layout.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid page-body-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Creer un client</h4>
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



                            <form class="forms-sample" action="{{route('CREATECLIENT')}}" method="POST">

                              @csrf

                              <div class="form-group">
                                <label for="exampleInputName1">Nom</label>
                                <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="Entrer le nom">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail3">Prenom</label>
                                <input type="prenom" name="prenom" class="form-control" id="exampleInputEmail3" placeholder="Entrer le prenom">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail3">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Entrer l'email">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail3">Numero de telephone</label>
                                <input type="number" name="phone" class="form-control" id="exampleInputEmail3" placeholder="Entrer le numero de telephone">
                              </div>


                              <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                              </div>
                           
                              <button type="submit" class="btn btn-primary mr-2">Creer</button>
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