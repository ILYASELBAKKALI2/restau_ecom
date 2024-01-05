@extends('layouts.employees')

@section('empl_content')
<div class="container-fluid">
  {{--<div class="row align-items-center">
    
    <div class="col-md-9 d-flex justify-content-center">
      
      <div class="side_bar_admin text-center d-inline-flex  " style="background-color: transparent;border: 2px solid rgba(10, 138, 106, 0.74)">
        
        <a href="/admin/products" class="">Produits <i class="fas fa-list"></i></a>
        <a href="/admin/categories" class="" style="border:none">Catégories <i class="fas fa-stream"></i></a>
        <a href="/admin/orders" class="">Commandes <i class="fas fa-credit-card"></i></a>
      </div>
    </div>
  
  </div>--}}
    
  
    <div class="row">
      
        <div class="col-sm-3" style="min-height: 20vh;background-color:rgba(10, 138, 106, 0.74)">
            <div class="admin_dash text-center">
              <i class="fas fa-user-cog  mt-5" style="font-size: 80px;margin:0px auto"></i>
            </div>
              @if (auth()->guard("admin")->check())
                          <ul class="" style="margin-left:70px">
                          <li class="nav-item dropdown mt-2 " style="list-style: none">
                              <a class="nav-link dropdown-toggle" href="#" style="color: #212529" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  {{ auth()->guard("admin")->user()->name }}
                              </a>
  
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="">
                                  <li class="taxt-center">
                                      <a class="dropdown-item" style="color:#fff" href="/admin">
                                          {{ __('Dashboard') }}
                                      </a>
                                      <a class="dropdown-item" style="color:#fff" href="{{ route('admin.logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Déconnexion') }}
                                      </a>
                                  </li>
                                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </ul>
                          </li>
                          </ul>
                      @endif
                      
         
            
    
            <div class="admin_crud my-5">
              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex" style="border-bottom: 1px solid #000">
                    <i class="fas fa-list" style="font-size: 25px"></i>
                    <h2 class="" style="margin-left:10px;font-size: 23px;font-family:'Lubster',cursive;text-align:center">Articles</h2>
                  </div>
                  <div>
                    <div class="side_bar_admin py-3" >
                      <a href="/admin/products" class="">Produits </a>
                      <a href="/admin/categories" class="">Catégories </a>
                      <a href="/admin/orders" class="">Commandes </a>
                    </div>
                  </div>
                </div>
              </div>
            
              
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="d-flex" style="border-bottom: 1px solid #000">
                  <i class="fas fa-search" style="font-size: 25px"></i>
                  <h2 class="" style="margin-left:10px;font-size: 23px;font-family:'Lubster',cursive;text-align:center">Rechercher</h2>
                </div>
                <div>
                    <form class="form-group d-flex justify-content-center my-3" id="search_product" action="{{route('orders.search')}}" method="GET">
                        @csrf
                        <input class="form-control me-2" style="width: 25vh" type="number" min="0" name="order" value="{{request()->input('order')}}" pattern="[1-9]*" placeholder="Commande ID" aria-label="Search">
                        <button class="btn" style="background-color:rgba(10, 138, 106, 0.74);color:#fff" type="submit">Search</button>
                    </form>        
          </div>
          </div>
            </div>
  
           
                  
  
          </div>
        <div class="col-sm-9 py-5">
          <div class="text-center py-2">
            @include('layouts.alerts')
          </div>
    
            <div class="col-sm-11 " style="margin-left: 45px">
          
              
            
                <div class="row pb-5 pt-2">
                    <div class="col-md-12">
              <h2 class="text-center" style="font-size: 65px; font-family:'Great Vibes',cursive">Livreurs</h2>
                            
                        <a href="/admin/livreurs/create" class="btn mb-2" style="background-color: rgba(10, 138, 106, 0.74);color:#fff;float: right;">Ajouter</a>
                        <table class="table text-center " style="box-shadow:0 0 5px #000;border-bottom: 1px solid #000">
                            <thead  style="background-color: rgba(10, 138, 106, 0.74);color:#fff;">
                                <th>ID</th>
                                <th>Livreur</th>
                                <th>Disponibilité</th>
                                <th>Action</th>
                            </thead>
                            <tbody  >
                               
                                @foreach ($livreurs as $livreur)
                                <tr style="border-bottom: 1px solid #000">
                                    <td >{{$livreur->id}}</td>
                                    <td >{{$livreur->name}}</td>
                                    <td >
                                        @if($livreur->state == 1 )
                                        <p style="font-size:18px;color:green">Disponible</p>
                                        @else
                                        <p style="font-size:18px;color:red">Occupé</p>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('livreur.delete',$livreur->id)}}" method="GET">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-sm btn-danger fas fa-trash" type="submit"></button>
                                        </form>
                                    </td>
                                </tr>
                                
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
          <h2 class="text-center" style="font-size: 65px; font-family:'Great Vibes',cursive">Commandes</h2>

            <table class="table mt-2" style="box-shadow: 0 0 5px #000">
                <thead class="text-center">
                    <tr style="font-family:'Poppins';background-color: rgba(10, 138, 106, 0.74);color:#fff">
                        <th>ID</th>
                        <th>Client</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                        <th>Livré</th>
                        <th>Payé</th>
                        <th>Date</th>
                        <th>Livreur</th>
                        <th>Action</th>

                    </tr>
                </thead>

                

                <tbody class="text-center" style="font-family:'Poppins';font-weight:500;">
                    @if ($orders->count() > 0)
                    @foreach ($orders as $order)
                    <tr class="" style="border-bottom: 1px solid rgba(10, 138, 106, 0.74);" >
                        <td style="padding:15px 0px">{{$order->id}}</td>
                        <td style="padding:15px 0px">
                                {{$order->user->name}}
                        </td>
                        <td style="padding:15px 0px">{{$order->product_name}}</td>
                        <td style="padding:15px 0px">{{$order->qty}}</td>
                        <td style="padding:15px 0px">{{$order->price}} DH</td>
                        <td style="padding:15px 0px">{{$order->total}} DH</td>
                        <td style="padding:15px 0px">
                            @if ($order->paid)
                                <i class="fas fa-check text-success"></i>
                                @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>
                        <td style="padding:15px 0px">
                            
                                @if ($order->delivered)
                                    <i class="fas fa-check text-success"></i>
                                @else
                                    <i class="fas fa-times text-danger"></i>
                                @endif
                            
                            
                        </td>
                        <td>{{$order->created_at}}</td>
                        
                        <td>
                            
                        <form action="{{ route("livreur_order",$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select class="js-states browser-default select2" name="livreur" required id="shopping_id">
                                <option value="option_select" disabled selected>Choisir un livreur</option>
                                @foreach ($livreurs as $livreur)
                                
                                <option value="{{$livreur->name}}" {{$livreur->name === $order->livreur ? "selected": ""}}>{{$livreur->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="mx-2 btn btn-sm btn-outline-warning fas fa-edit mt-2"></button>
                        </form>
                    </td>
                        
                        
                        <td style="padding:15px 0px">
                            <div class="d-flex justify-content-center align-items-center">
                                <form action="{{ route("admin.orders.delete",$order->id) }}" id="{{ $order->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="mx-2 btn btn-sm btn-outline-danger fas fa-trash"
                                    onclick="event.preventDefault();
                                    if(confirm('Voulez vous vraiment supprimer la commande {{$order->id}} ?'))
                                    document.getElementById('{{$order->id}}').submit();"
                                    ></button>
                                </form>

                                
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="9">
                            <h5 style="color:rgba(67, 68, 69, 0.685);font-size:30px;font-family:'Lubster',cursive">Aucune commande</h5>
                        </td>
                    </tr>
                    @endif
                    
                </tbody>
                
            </table>
                </div>
            <div class="row">
                <div class="col-md-8 offset-md-2 d-flex justify-content-center">
                    {{$orders->links()}}
                </div>
            </div>

            


        
    </div> 
       
    </div>
    </div>
</div>
@endsection
