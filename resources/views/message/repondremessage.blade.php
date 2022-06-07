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
                            <h4 class="card-title">Repondre au message</h4>
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



                        @foreach ($user as $data )
                            <form class="forms-sample" action="{{route('REPONDREMESSAGE',['id'=>$data->id])}}" method="POST">

                                @csrf

                                <div class="form-group">
                                <label for="exampleInputName1">Mon message</label>

                                <textarea name="message" id="" class="form-control" cols="30" rows="10"></textarea>


                                </div>


                                <button type="submit" class="btn btn-primary mr-2">Envoyer </button>
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