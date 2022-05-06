<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EFFECTUER PAIMENT</title>
</head>
<body>
        @include('layout.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid page-body-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Modifier le paiement</h4>
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



                            @foreach ($infopaiement as $infopaiements )
                                                        <form class="forms-sample" action="{{route('UPDATEPAIEMENT',['id'=>$id=$_GET['id']])}}" method="POST">

                                                            @csrf
                                                
                            
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">Nom de la boutique</label>
                                                                <select name="boutiqueupdate" class="form-control" id="exampleSelectGender">
                                                                    @foreach ($boutique as $boutiques )
                                                                            <option value="{{$boutiques->id}}">{{$boutiques->numero_boutique}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                            
                                                    
                            
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">Mois</label>
                                                                <select name="moisupdate" class="form-control" id="exampleSelectGender">
                                                                    @foreach ($mois as $infomois )
                                                                            <option value="{{$infomois->id}}">{{$infomois->nom_mois}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                            
                            
                            
                                                            <div class="form-group">
                                                            <label for="exampleInputPassword4">Prix</label>
                                                            <input type="number" name="prixupdate" class="form-control" id="exampleInputPassword4" value="{{$infopaiements->prixp}}">
                                                            </div>
                            
                            
                                                            <div class="form-group">
                                                            <label for="exampleInputPassword4">Date</label>
                                                            <input type="date" name="dateupdate" class="form-control" id="exampleInputPassword4" placeholder="prix">
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