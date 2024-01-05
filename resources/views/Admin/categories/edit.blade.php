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
      
      <div class="col-sm-3" style="height: 110vh;background-color:rgba(10, 138, 106, 0.74)">
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
      </div>

        <div class="col-sm-9 py-5" style="">
          <h2 class="text-center" style="font-size: 65px; font-family:'Great Vibes',cursive">Modifier catégorie</h2>
          <div class="text-center py-2">
            @include('layouts.alerts')
          </div>
    
            <div class="col-sm-11 " style="margin-left: 45px">
                  <div style="">
                    <form action="{{route("categories.update",$category->title)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                     @method("PUT")
                        <div class="row">
                            <div class="col-md-8 offset-md-2 d-flex justify-content-center py-3">
                                <img src="{{asset($category->image)}}" width="100px" height="100px" alt="" srcset="">
                            </div>
                            <div class="col-md-8 offset-md-2 py-3">
                                <input type="file" value="{{$category->image}}" class="form-control contact-form-image" name="image" placeholder="">
                            </div>
                        </div>

                        

                        <div class="row">
                            
                            <div class="col-md-8 offset-md-2 py-3">
                                <input type="text" value="{{$category->title}}" name="title" class="form-control contact-form" id="" placeholder="Titre">
                            </div>
                        </div>    
    
                        <div class="row">
                            <div class="col-md-8 offset-md-2 py-3 text-center">
                                <button type="submit" class="contact-button">Modifier</button>
                            </div>
                        </div>
                    </form>
                    </div>
                
                
    </div>
</div>
</div></div>

@endsection