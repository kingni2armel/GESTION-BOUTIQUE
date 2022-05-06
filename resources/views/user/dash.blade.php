<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD</title>
</head>
<body>
        @include('layout.header')

        <div class="main-panel">
            <div class="content-wrapper">


                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card corona-gradient-card">
                        <div class="card-body py-0 px-0 px-sm-3">
                          <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">
                              <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                            </div>
                            <div class="col-5 col-sm-7 col-xl-8 p-0">
                              <h4 class="mb-1 mb-sm-0">Les information sur les boutiques</h4>
                              <p class="mb-0 font-weight-normal d-none d-sm-block">Suivre les operations du paiement du loyer de chaque boutique</p>
                            </div>
                            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                           
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <div class="row">

                                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                              <div class="card-body">
                                                <div class="row">
                                                  <div class="col-9">
                                                    <div class="d-flex align-items-center align-self-start">
                                                        <h3 class="mb-0">
                                                            @if ($nombredeboutique->count()>0)
                                                                    {{$nombredeboutique->count()}}
                                                                    @else   
                                                                    0    
                                                                    
                                                            @endif

                                                      </h3>
                                                      
                                                    </div>
                                                  </div>
                                                  <div class="col-3">
                                                    <div class="icon icon-box-success ">
                                                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                    </div>
                                                  </div>
                                                </div>
                                                <h6 class="text-muted font-weight-normal">Nombre de boutique</h6>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                              <div class="card-body">
                                                <div class="row">
                                                  <div class="col-9">
                                                    <div class="d-flex align-items-center align-self-start">
                                                      <h3 class="mb-0">
                                                            @if ($nombredeclient->count()>0)
                                                                    {{$nombredeclient->count()}}
                                                            @else   
                                                            0     
                                                                    
                                                            @endif

                                                      </h3>
                                                    </div>
                                                  </div>
                                                  <div class="col-3">
                                                    <div class="icon icon-box-success ">
                                                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                    </div>
                                                  </div>
                                                </div>
                                                <h6 class="text-muted font-weight-normal">Nombre de client</h6>
                                              </div>
                                            </div>
                                          </div>


                                          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                              <div class="card-body">
                                                <div class="row">
                                                  <div class="col-9">
                                                    <div class="d-flex align-items-center align-self-start">
                                                        <h3 class="mb-0">
                                                            @if ($nombredemois->count()>0)
                                                                    {{$nombredemois->count()}}
                                                             @else   
                                                                  0  
                                                            @endif

                                                      </h3>
                                                    </div>
                                                  </div>
                                                  <div class="col-3">
                                                    <div class="icon icon-box-success ">
                                                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                    </div>
                                                  </div>
                                                </div>
                                                <h6 class="text-muted font-weight-normal">Nombre de mois</h6>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                              <div class="card-body">
                                                <div class="row">
                                                  <div class="col-9">
                                                    <div class="d-flex align-items-center align-self-start">
                                                        <h3 class="mb-0">
                                                            @if ($nombrepaiement->count()>0)
                                                                    {{$nombrepaiement->count()}}
                                                                    @else   
                                                                    0    
                                                                    
                                                            @endif

                                                      </h3>
                                                    </div>
                                                  </div>
                                                  <div class="col-3">
                                                    <div class="icon icon-box-success ">
                                                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                    </div>
                                                  </div>
                                                </div>
                                                <h6 class="text-muted font-weight-normal">Nombre de paiements</h6>
                                              </div>
                                            </div>
                                          </div>


                                                        
                                        </div>



                                        
                </div>
            </div>


            

</body>
</html>