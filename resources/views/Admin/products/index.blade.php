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
      
      <div class="col-sm-3" style="min-height: 110vh;background-color:rgba(10, 138, 106, 0.74)">
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
        <form class="form-group d-flex pt-4 mb-5" id="search_product" action="{{route('products.search')}}" method="GET">
          @csrf
          <input class="form-control me-2" style="width: 50vh" type="text" name="product" value="{{request()->input('product')}}" placeholder="Search" aria-label="Search">
          <button class="btn" style="background-color:rgba(10, 138, 106, 0.74);color:#fff" type="submit">Search</button>
      </form>        
      </div>
      </div>
        </div>

       
              

      </div>

        <div class="col-sm-9 py-5">
          <h2 class="text-center" style="font-size: 65px; font-family:'Great Vibes',cursive">Produits</h2>
          <div class="text-center py-2">
            @include('layouts.alerts')
          </div>
    
            <div class="col-sm-11 " style="margin-left: 45px">
          
              
               <div class="row">
                    
              <div class="col-md-6 text-start">
      
              </div>
                <div class="col-md-6 text-end">
                  <a href="{{route('products.create')}}" class="btn" style="background-color:rgba(10, 138, 106, 0.74);color:#fff">Ajouter produit</a>
                </div>
    
                </div>
    
              
              <div class="row">
                  
                  <table class="table mt-2" style="box-shadow: 0 0 5px #000;">
                      <thead class="text-center" style=" font-family:'Poppins';background-color: rgba(10, 138, 106, 0.74);color:#fff">
                          <tr>
                              <th>Image</th>
                              <th>Titre</th>
                              <th>Prix</th>
                              <th>Ancien Prix</th>
                              <th>Categorie</th>
                              <th>Details</th>
                              <th>Action</th>
                          </tr>
                          
                      </thead>
                      <tbody class="text-center " style="font-family:'Poppins';font-weight:500;border-bottom: 1px solid rgba(10, 138, 106, 0.74)" >
                        @foreach ($products as $product)
                        <tr >
                            <td><img src="{{asset($product->image)}}" width="70px" height="70px" alt=""></td>
                            <td  style="padding:30px 0px">{{$product->name}}</td>
                            <td style="padding:30px 0px">{{$product->price}}</td>
                            <td style="padding:30px 0px">{{$product->old_price}}</td>
                            <td style="padding:30px 0px">
                                @foreach ($categories as $category)
                                  @if ($category->id == $product->category_id)
                                      {{$category->title}}
                                  @endif                         
                                @endforeach
                            </td>
                            <td style="padding:30px 0px">{{Str::words($product->details, 4,'...')}}</td>
                            <td style="padding:30px 0px" class="">
                              <div class="d-flex">
                              <form action="{{ route('products.destroy',$product->name) }}" class="" id="{{ $product->id }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="mx-1 btn btn-sm btn-outline-danger fas fa-trash"
                                onclick="event.preventDefault();
                                if(confirm('Voulez vous vraiment supprimer {{$product->name}} ?'))
                                document.getElementById('{{$product->id}}').submit();"
                                ></button>
                            </form>
    
                            <a href="{{ route('products.edit',$product->name) }}" class="btn btn-sm btn-outline-warning fas fa-edit">
    
                            </a>
                          </div>
                          
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                
                </div> 
                <div class="row mt-2">
                  <div class="col-sm-12  d-flex justify-content-center" style="outline: none">{{ $products->appends(request()->input() )->links('vendor.pagination.bootstrap-4') }}</div>
                 
               </div>
                
            </div>
    
        </div>
      
     

        
    </div> 
       
    </div>

    @push('scripts')
        <script>
         $(".close").on('click',function(){
          $().fadeOut();
         });
        </script>
    @endpush

    @endsection

