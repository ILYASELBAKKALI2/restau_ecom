<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant L'inspiration</title>
    <link rel="shortcut icon" type="image" href="/assets/images/webIcon.png">


   <link rel="stylesheet" href="{{asset('assets/css/base.css')}}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" crossorigin="anonymous"/>
    <link href="{{asset('assets/css/TimeCircles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coiny&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body class="body">
    
   <header>
        <nav class="nav1" style="border-bottom: 2px solid rgba(10, 138, 106, 0.589)">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-1"><a href="/"><img src="{{asset('assets/images/logo.png')}}" style="cursor:pointer;float:left" width="100" class="" height="80" alt="brand" srcset=""></a></div>
                    <div class="col-sm-6 offset-1">
                        <form class="d-flex form-group" action="{{route('search')}}" method="GET">
                            <input class="form-control me-2 " type="search" name="query" value="{{request()->input('query')}}" placeholder="Search" aria-label="Search">
                            <button class="search_button" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-sm-2 justify-content-center d-flex"><a href="/cart" style="font-family:'Lubster',cursive; font-size:18px;text-decoration:none;color:rgba(10, 138, 106, 0.76)"><i class="fas fa-shopping-cart"></i> Panier({{Cart::count()}})</a></div>
                    <div class="col-sm-2 d-flex justify-content-center">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item " style="list-style: none">
                                    <a class="nav-link d-flex" style="border-radius:50px;text-decoration:none;border:1px solid rgb(67,68,69) ;background-color:transparent;color:rgb(67,68,69);margin: 0px 2px" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item " style="list-style: none">
                                    <a class="nav-link d-flex" style="border-radius:50px;text-decoration:none;background-color:rgb(67,68,69);color:#fff;margin: 0px 5px"  href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if (auth()->guard("admin")->check())

                        <li class="nav-item dropdown" style="list-style: none">
                            <a class="nav-link dropdown-toggle" href="#" style="color: rgb(67,68,69)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->guard("admin")->user()->name }}
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" style="color:rgb(67,68,69)" href="/admin">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" style="color:rgb(67,68,69)" href="{{ route('admin.logout') }}"
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


                      
                            
                        @else
                            
                     
                            <li class="nav-item dropdown" style="list-style: none">
                                <a class="nav-link dropdown-toggle" href="#" style="color: rgb(67,68,69)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        

                                        <a class="dropdown-item" style="color:rgb(67,68,69)" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Déconnexion') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                            @endif
                        @endguest
                        

                    </div>
                </div>
            </div>
            




        </nav>

        <div class="container-fluid  nav-bar3">
            <div class="row ">
                <div class="col-md-12" >
                    <ul class="d-flex nav_bar3" style="justify-content:center">
                        
                        <li class="list-line"><a href="/" class="p-4 active">Acceuil</a></li>
                      
                        <li class="list-line"><a href="/#cat" class="p-4">Nos Catégories <i class="fas fa-chevron-down"></i></a>
                            <div class="drop-down">
                                <ul>
                                    @foreach ($categories as $category)
                                        
                                    
                                        <li><a href='{{route("Category.Products",$category->title)}}'>{{$category->title}}</a></li>
                                   
    
    
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="list-line"><a href="/products" class="p-4 active">Nos Produits</a></li>
                        <li class="list-line"><a href="/#offre" class="p-4">Nos Offres</a></li>
                        <li class="list-line"><a href="/Apropos" class="p-4">A propos</a></li>
                        <li class="list-line"><a href="/contact" class="p-4">Contact</a></li>
                </div>
            </div>
        </div>
        {{--<nav style="position:relative;top:0;left:0;background-color:rgb(67,68,69)">
            <div class="container-fluid nav2-container bg-success">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="d-flex">
                            <li class=""><a href="" >Accueil</a></li>
                            <li ><a href="">Nos Produits</a></li>
                            <li class=""><a href="">Nos Catégories</a>
                            
                                    <ul class="">
                                        @foreach ($categories as $category)
                                          <li><a href="">{{$category->name}}</a></li>  
                                        @endforeach
                                    </ul>
                             
                            </li>
                            <li class=""><a href="">Nos Promotions</a></li>
                            <li class=""><a href="">A Propos</a></li>
                            <li class=""><a href="">Contact</a></li>
                          

                        </ul>
                    </div>
                </div>
            </div>
        </nav>--}}
        
    </header>

    <main style="min-height:20vh">

        @yield('content')
    </main>

    <div class="bg-light" style="box-shadow: 0 0 5px #000;border-bottom: 2px solid rgba(10, 138, 106, 0.589)">
        <div class="container">
            <div class="row align-items-center">
            
                <div class="col-sm-3 py-2 justify-content-center " style="display:inline;">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-truck" style="font-size:30px" aria-hidden="true"></i>
                        <div class="" style="padding-left:10px">
                            <h5 class="text-center" style="font-weight:bold ; font-family: 'Lubster',cursive">Livraison gratuite</h5>
                            <p class="" style="text-align: center">Livraison rapide partout dans Tanger</p>
                        </div>
    
                    </div>
                </div>
                <div class="col-sm-3 d-flex flex-row justify-content-center" style="display:inline;">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-recycle" style="font-size:30px" aria-hidden="true"></i>
                        <div class="text-center" style="padding-left:10px">
                            <h5 class="" style="font-weight:bold ; font-family: 'Lubster',cursive">Guarantee</h5>
                            <p class="">Satisfaite ou Remboursé</p>
                        </div>
    
                    </div>
                </div>
                <div class="col-sm-3 d-flex justify-content-center" style="">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-credit-card" style="font-size:30px" aria-hidden="true"></i>
                        <div class="" style="padding-left:10px">
                            <h5 class="text-center" style="font-weight:bold ; font-family: 'Lubster',cursive">Paiement</h5>
                            <p class="">Paiement à la livraison</p>
                        </div>
    
                    </div>
                </div>
                <div class="col-sm-3 d-flex justify-content-center" style="">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-life-ring" style="font-size:30px" aria-hidden="true"></i>
                        <div class="align-items-center" style="padding-left:10px" >
                            <h5 class="text-center" style="font-weight:bold ; font-family: 'Lubster',cursive">Service actif</h5>
                            <p class="">Service actif 24/7</p>
                        </div>
    
                    </div>
                </div>
             
            </div>
            
                
                
                
          
        </div>
    </div>
    <footer>
        <div class="footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-3 mt-4 footer-col">
                  <div class="footer-about bg-light">
                    <img src="/assets/images/logo.png" class="footer-img" alt="">
                    <h5 style="font-family: 'Lubster' , cursive; color: rgba(10, 138, 106, 0.76)">Resto L'inspiration le restaurant de la nouvelle tendance</h5>
                      <p>vous offre un choix varié de menus et plats,
                       soigneusement préparé par des chefs professionnelles.
                      </p>
                  </div>
                </div>
                <div class="col-sm-3 mt-4  footer-col" style="padding-left: 70px">
                  <div class="footer-links">
                    <h3 class="" style="font-family: 'Lubster' , cursive">Liens Utiles</h3>
                    <ul>
                      <li><a href="/products">Store</a></li>
                      <li><a href="/contact">Contactez-nous</a></li>
                      <li><a href="/#offre">Nos offres</a></li>
                      <li><a href="/Apropos">À Propos</a></li>
                    </ul>
                  </div>
                </div>
                
                <div class="col-sm-3 mt-4 footer-col" style="padding-left: 33px">
                  <div class="footer-address ">
                    <h3 class="text-start" style="font-family: 'Lubster' , cursive">Adresse</h3>
                    <ul>
                      <li><i class="fas fa-map-marked-alt"> <span>7 Baie de Tanger، Tanger</span> </i></li>
                      <li><i class="fas fa-phone-alt"> <span>0519162325</span> </i></li>
                      <li><i class="fas fa-at"> <span> resto_inspiration@gmail.com</span></i></li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-3 mt-4 footer-col">
                    <div class="footer-socials">
                      <h3 style="font-family: 'Lubster' , cursive">Réseaux Sociaux</h3>
                       <ul ><li ><a href="https://web.facebook.com/linspirationparis" target="_blank"> <i id="fac" class="fab fa-facebook px-1"><span style="margin-left:10px;">Facebook</span> </i></a></li>
                       <li ><a  href="https://www.instagram.com/linspirationparis/?hl=fr" target="_blank"> <i id="ins" class="fab fa-instagram px-1"> <span style="margin-left:10px;">Instagram</span></i></a></li>
                       <li ><a  href="https://www.youtube.com/results?search_query=restaurant+inspiration "target="_blank" > <i id="you" class="fab fa-youtube px-1"> <span style="margin-left:10px;">Youtube</span></i></a></li>
                       </ul> 
                    </div>
                  </div>
              </div>
              
              </div>
            </div>
      </footer>      
      <div class="footer2"  style="height: 100px;width:100% " >
     
              
        <h5 style="font-family: 'Lubster' , cursive"><span style="font-size: 40px;font-family: 'Great Vibes' , cursive">L'inspiration </span>  - Tous les droits sont réservés &copy;</h5> 
      </div>



      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> 
      
      {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
      
      <script src="{{asset('/assets/js/base.js')}}"></script>
      <script src="{{asset('assets/js/javascript.js')}}"></script>
      <script src="{{asset('assets/js/wNumb.min.js')}}"></script>
      <script src="{{asset('assets/js/wNumb.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/js/TimeCircles.js')}}"></script>
      

    @stack('scripts')

</body>
</html>