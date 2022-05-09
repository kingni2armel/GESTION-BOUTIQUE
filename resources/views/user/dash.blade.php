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
                              <h4 class="mb-1 mb-sm-0">Les informations sur les boutiques</h4>
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
                                                      <span class="mdi mdi-arrow-top-right icon-item btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"></span>
                                                    </div>
                                                  </div>
                                                </div>
                                                <h6 class="text-muted font-weight-normal">Nombre de paiements</h6>

                                                
                                             
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
                                                           {{$prixtotalpaiement}} FCFA

                                                      </h3>
                                                      
                                                    </div>
                                                  </div>
                                                  <div class="col-3">
                                                    <div class="icon icon-box-success ">
                                                    </div>
                                                  </div>
                                                </div>
                                                <h6 class="text-muted font-weight-normal">Prix total des paiements</h6>
                                              </div>
                                            </div>
                                          </div>

                                        </div>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                      <div class="card-body">
                                        <h4 class="card-title"> Prix Totals des paiements par mois</h4>
                                        </p>
                                        <div class="table-responsive">
                                          <table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th> # </th>
                                                <th> Janvier </th>
                                                <th> Fevrier</th>
                                                <th> Mars </th>
                                                <th> Avril </th>
                                                <th> Mai </th>
                                                <th> Juin </th>
                                                <th> Juillet </th>
                                                <th> Aout </th>
                                                <th> Septembre </th>
                                                <th> Octobre </th>
                                                <th> Novembre </th>
                                                <th>Decembre</th>







                                              </tr>
                                            </thead>
                                            <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td>
                                                          @if ($sommepaiementjanvier >0)
                                                                {{$sommepaiementjanvier}} FCFA
                                                            @else
                                                            0 FCFA
                                                          @endif
                                                    </td>
                                                    <td>
                                                      @if ($sommepaiementfevrier >0)
                                                            {{$sommepaiementfevrier}} FCFA
                                                        @else
                                                        0 FCFA
                                                      @endif
                                                   </td>
                                                    <td>
                                                        @if ($sommepaiementmars >0)
                                                              {{$sommepaiementmars}} FCFA
                                                          @else
                                                          0 FCFA
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($sommepaiementavril >0)
                                                              {{$sommepaiementavril}} FCFA
                                                          @else
                                                          0 FCFA
                                                        @endif
                                                    </td>
                                                    <td>
                                                      @if ($sommepaiementmai >0)
                                                            {{$sommepaiementmai}} FCFA
                                                        @else
                                                        0 FCFA
                                                      @endif
                                                  </td>
                                                  <td>
                                                    @if ($sommepaiementjuin >0)
                                                          {{$sommepaiementjuin}} FCFA
                                                      @else
                                                      0 FCFA
                                                    @endif
                                                </td>
                                                <td>
                                                  @if ($sommepaiementjuillet >0)
                                                        {{$sommepaiementjuillet}} FCFA
                                                    @else
                                                    0 FCFA
                                                  @endif
                                                </td>
                                                <td>
                                                  @if ($sommepaiementaout >0)
                                                        {{$sommepaiementaout}} FCFA
                                                    @else
                                                    0 FCFA
                                                  @endif
                                               </td>
                                               <td>
                                                    @if ($sommepaiementseptembre >0)
                                                          {{$sommepaiementseptembre}} FCFA
                                                      @else
                                                      0 FCFA
                                                    @endif
                                               </td>
                                              <td>
                                                    @if ($sommepaiementoctobre >0)
                                                          {{$sommepaiementoctobre}} FCFA
                                                      @else
                                                      0 FCFA
                                                    @endif
                                             </td>
                                             <td>
                                                @if ($sommepaiementnovembre >0)
                                                      {{$sommepaiementnovembre}} FCFA
                                                  @else
                                                  0 FCFA
                                                @endif
                                             </td>
                                             <td>
                                                @if ($sommepaiementdecembre >0)
                                                      {{$sommepaiementdecembre}} FCFA
                                                  @else
                                                  0 FCFA
                                                @endif
                                             </td>


                                                  </tr>
                                                  
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-body">
                                  
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                  </div>
                                </div>
                              </div>
                            </div>



                                        
                </div>
            </div>


            

</body>
</html>