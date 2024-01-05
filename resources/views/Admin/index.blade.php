@extends('layouts.employees')

@section('empl_content')
<div class="text-center d-flex" style="background-color: rgba(10, 138, 106, 0.74);height: 80px;box-shadow: 0 0 5px #000">
    <div class="container">
        <div class="row">
            <div class="col-sm-6"> <i class="fas fa-user-cog text-center py-2" style="float:left;font-size: 60px"></i></div>
            <div class="col-sm-6">
                <div class="py-3" style="float: right">
                    @if (auth()->guard("admin")->check())
                                    <ul class="" style="">
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
                </div>
            </div>
        </div>

    </div>
   
   
</div>
<div class="py-5">


<div class="container " style="min-height:20vh;">

    <div class="row justify-content-center d-flex" style=" ">
        <div class="col-md-4 align-items-center justify-content-center d-flex py-5">
            <div class="" style="width: 100%;">
                <a href="{{route('admin.products')}}">

                    <div class="text-white text-center py-5 rounded-circle" style="box-shadow:0 0 10px #000;background-color: #ffd15bb0">
                        <img src="{{asset('/assets/images/food-deluxe-sammich.svg')}}" width="200px" height="200px" alt="" srcset="">
                        <div style="color: rgb(67,68,69)">
                            <h3 style="font-size: 30px ; font-family:'Lubster',cursive ">Produits</h3>
                        <span class="font-weight-bold" style="font-size: 30px ; font-family:'Lubster',cursive">
                            {{$products->count()}}
                        </span>
                        </div>
                        
                    </div>
                </a>

            </div>
        </div>

        <div class="col-md-4 align-items-center justify-content-center d-flex py-5">
            <div class="" style="width: 100%;">
                <a href="{{route('admin.orders')}}">

                    <div class="text-white text-center py-5 rounded-circle " style="box-shadow:0 0 10px #000;background-color: rgba(255, 255, 255, 0.432)">
                        <img src="{{asset('/assets/images/credit-card-back.svg')}}" width="200px" height="200px" alt="" srcset="">
                        <div style="color: rgb(67,68,69)">
                        <h3 style="font-size: 30px ; font-family:'Lubster',cursive">Commandes</h3>
                        <span class="font-weight-bold" style="font-size: 30px ; font-family:'Lubster',cursive">
                            {{$orders->count()}}
                        </span>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <div class="col-md-4 align-items-center justify-content-center d-flex py-5">
            <div class="" style="width: 100%">

                <a href="{{route('admin.categories')}}">

                    <div class="text-white text-center py-5 rounded-circle" style="box-shadow:0 0 10px #000;background-color: #6dc5dda9">
                        <img src="{{asset('/assets/images/check-list2.svg')}}" width="200px" height="200px" alt="" srcset="">        
                        <div style="color: rgb(67,68,69)">
                        <h3 style="font-size: 30px ; font-family:'Lubster',cursive">Catégories</h3>
                        <span class="font-weight-bold" style="font-size: 30px ; font-family:'Lubster',cursive">
                            {{$categories->count()}}
                        </span>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>

        <div class="row">
        <div class="col-md-4 offset-md-4 align-items-center justify-content-center d-flex py-5">
            <div class="" style="width: 100%;">
                <a href="{{route('admin.orders')}}">

                    <div class="text-white text-center py-5 rounded-circle " style="box-shadow:0 0 10px #000;background-color: #ff715eb0">
                        <img src="{{asset('/assets/images/livreur.svg')}}" width="200px" height="200px" alt="" srcset="">
                        <div style="color: rgb(67,68,69)">
                        <h3 style="font-size: 30px ; font-family:'Lubster',cursive">Livreurs</h3>
                        <span class="font-weight-bold" style="font-size: 30px ; font-family:'Lubster',cursive">
                            {{$livreurs->count()}}
                        </span>
                        </div>
                    </div>
                </a>

            </div>
        </div>
        </div>


        
    </div> 
       
    </div>
</div>
@endsection
