@extends('layouts.employees')

@section('empl_content')
<div class="container-fluid" style="min-height: 20vh">
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
      
        <div class="col-sm-3" style="height:150vh;background-color:rgba(10, 138, 106, 0.74)">
          <div class="admin_dash text-center">
            <i class="fas fa-users-cog  mt-5" style="font-size: 80px;margin:0px auto"></i>
          </div>
            @if (auth()->guard("livreur")->check())
                        <ul class="" style="margin-left:70px">
                        <li class="nav-item dropdown mt-2 " style="list-style: none">
                            <a class="nav-link dropdown-toggle" href="#" style="color: #212529" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->guard("livreur")->user()->name }}
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="">
                               
                                    <a class="dropdown-item" style="color:#fff" href="{{ route('livreur.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('livreur.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        </ul>
                    @endif
                    
          <div class="row align-items-center mt-5 "  style="">
            <div class="col-sm-12">
                <div class="d-flex" style="border-bottom: 1px solid #000">
          <i class="fas fa-users-cog" style="font-size: 25px"></i>

          <h2 class="" style="margin-left:10px;font-size: 25px;font-family:'Lubster',cursive;text-align:center">Disponibilité</h2>

                </div>

                <div class=" d-flex py-4 justify-content-center">
        @if (Auth::user()->state == 1)
            <i class="fas fa-check text-success"> Disponible</i>
            @else
            <i class="fas fa-times text-danger"> Occupé</i>
        @endif
   
       
           
            <form action="{{ route('update.state',Auth::user()->id) }}" method="POST">
                @csrf
                @method("PUT")
                <button type="submit" class="mx-2 btn btn-sm btn-warning fas fa-edit"></button>
            </form>
        </div>
        </div>
            </div>
            <div  class="py-5" >          
            <div class="row align-items-center"  >
                <div class="col-sm-12">
                    <div class="d-flex"  style="border-bottom: 1px solid #000">
              <i class="fas fa-search" style="font-size: 25px"></i>
    
              <h2 class="" style="margin-left:10px;font-size: 25px;font-family:'Lubster',cursive;text-align:center">Rechercher</h2>
    
                    </div>
                    <div class="search_order" id="rechercher_commande"> 
          
          <form class="form-group d-flex justify-content-center py-4" id="search_product" action="{{route('orders.search.livreur')}}" method="GET">
            @csrf
            <input class="form-control me-2" style="width: 25vh" type="text" name="order" value="{{request()->input('order')}}" pattern="[1-9]*" placeholder="Commande ID" aria-label="Search">
            <button class="btn" style="background-color:rgba(10, 138, 106, 0.74);color:#fff" type="submit">Search</button>
        </form>
        </div>
            </div>
            </div>
        </div>
        
        <div class="send-message">
            <div class="row align-items-center "  style="">
                <div class="col-sm-12">
                    <div class="d-flex" style="border-bottom: 1px solid #000">
              <i class="fas fa-envelope-open-text" style="font-size: 25px"></i>
    
              <h2 class="" style="margin-left:10px;font-size: 21px;font-family:'Lubster',cursive;text-align:center">Envoyer message</h2>
    
                    </div>
            <div class="justify-content-center d-flex">
            <form class="form-group justify-content-center my-3 text-center"  action="{{route('livreur.store.message')}}" method="post">
                @csrf
                <input class="form-control my-2" style="width: 100%;margin: 0 auto;" type="number" name="order_ID" min="0" placeholder="Commande ID" aria-label="Search">
                <input class="form-control my-2" style="width: 100%" type="text" name="full_name" placeholder="Nom complet du livreur">
                <input class="form-control my-2" style="width: 100%" type="text" name="email" placeholder="Email">
                <textarea class="form-control my-2" style="width: 100%" type="text" name="Message" placeholder="Message"></textarea>
                <button class="btn" style="background-color:rgba(10, 138, 106, 0.74);color:#fff" type="submit">Envoyer</button>
            </form>
        </div>
        </div>

        </div>
        </div>
        </div>

        <div class="col-sm-9 py-5">
          <h2 class="text-center" style="font-size: 65px; font-family:'Great Vibes',cursive">Les commandes à livrer</h2>
          <div class="text-center py-2">
            @include('layouts.alerts')
          </div>
    
            <div class="col-sm-11 " style="margin-left: 45px">
          
              
              
          <div class="row">
            <table class="table" style="box-shadow: 0 0 10px #000">
                <thead class="text-center">
                    <tr style="background-color: rgba(10, 138, 106, 0.74);color:#fff">
                        <th>ID</th>
                        <th>Client</th>
                        <th>Adresse</th>
                        <th>Tel_Client</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Livré</th>
                        <th>Payé</th>
                      

                    </tr>
                </thead>

                

                <tbody class="text-center" style="border-bottom: 1px solid rgba(10, 138, 106, 0.74)">
                    @if($orders->count() > 0)
                    @foreach ($orders as $order)
                    @if (Auth::user()->name == $order->livreur)
                                
                    
                    <tr>
                        <td>{{$order->id}}</td>
                        
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->telephone}} </td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->total}} DH</td>
                        <td>{{$order->created_at}} </td>

                        <td>
                            <div class="row align-items-center">
                                <div class="col-sm-12 d-flex justify-content-center">
                            @if ($order->paid)
                                <i class="fas fa-check text-success"></i>
                                @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                            <div class="d-flex justify-content-center align-items-center">
                               
                                <form action="{{ route('update.paid.orders',$order->id) }}" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <button type="submit" class="mx-2 btn btn-sm btn-warning fas fa-edit"></button>
                                </form>
                            </div>
                                </div>
                            </div>
                        </td>
                        <td >
                         <div class="row align-items-center">
                             <div class="col-sm-12 d-flex justify-content-center">
                                @if ($order->delivered)
                                <i class="fas fa-check text-success"></i>
                                
                            @else
                                <i class="fas fa-times text-danger"></i>
                                
                            @endif
                            <div class="d-flex justify-content-center align-items-center">
                           
                                <form action="{{ route('update.delivered.orders',$order->id) }}" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <button type="submit" class="mx-2 btn btn-sm btn-warning fas fa-edit"></button>
                                </form>
                            </div>
                   
                             </div>
                         </div>
                                
                            
                        </td>
                        
                    </tr>

                    @endif
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
    </div>  

    <div class="row">
        <div class="col-md-8 offset-md-2 d-flex justify-content-center">

            {{$orders->links()}}

        </div>
    </div>

</div> 
    </div>
</div>

@endsection
