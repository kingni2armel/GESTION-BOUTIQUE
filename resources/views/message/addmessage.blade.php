<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CREER UTILISATEUR</title>
</head>
<body>
        @include('layout.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid page-body-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Envoyer un message</h4>
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



                            <form class="forms-sample" action="{{route('GETPAGEADDMESSAGE')}}" method="POST">

                              @csrf

                              <div class="form-group">
                                <label for="exampleInputName1">Mon message</label>

                                <textarea name="message" id="" class="form-control" cols="30" rows="10"></textarea>

 
                              </div>

                              <div class="form-group">

                                    <label for="">Destinataire</label>
                                    <select name="destinataire" class="form-control" id="">

                                        @foreach ($user as $data)

                                            <option value="{{$data->id}}">{{$data->nom}} {{$data->prenom}}</option>
                                            
                                        @endforeach
                            </select>

                              </div>
                             




                             
                           
                              <button type="submit" class="btn btn-primary mr-2">Envoyer </button>
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