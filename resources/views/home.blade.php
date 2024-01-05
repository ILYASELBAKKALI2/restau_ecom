@extends('layouts.master')



@section('content')
<div class="text-center">
    @include('layouts.alerts')
</div>

    <div id="carouselExampleLight" class="carousel carousel-light slide" style="margin-bottom: 100px" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleLight" data-bs-slide-to="6" aria-label="Slide 7"></button>
        </div>
        
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img src="/assets/images/header.jpg" alt="food" class="banner2">
            </div>

            <div class="carousel-item" data-bs-interval="6000">
                <img src="/assets/images/carousel-banner1.jpg" alt="food" class="banner2">
                <div class="carousel-caption " >
                    <div class="container-fluid" >
                        <div class="row align-items-center" style="height:350px">
                            <div class="col-md-6 justify-content-center d-flex">
                                <h2 class="animate__animated animate__fadeInDown animate__delay-1s">Faim?</h2>
                            </div>
                            <div class="col-md-6 ">
                                <div>
                                    <p class="animate__animated animate__zoomIn animate__delay-2s" >n'hésitez pas à y faire votre première réservation dès maintenant</p>
                                    <a href="/products" class="animate__animated animate__zoomIn animate__delay-3s button1-carousel1 mt-3" >Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="6000">
                <img src="assets/images/carousel_banner2.jpg" alt="food" class="banner2">
                <div class="carousel-caption slider3">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <img src="assets/images/delivery_carousel.png" class="animate__animated animate__zoomIn animate__delay-1s" width="350px" height="300px" alt="">
                        </div>

                        <div class="col-md-8">
                            <h3 class="animate__animated animate__zoomIn animate__delay-2s" >Livraison en toute sécurité</h3>
                            <p class="animate__animated animate__zoomIn animate__delay-3s">Votre satisfaction est notre priorité.</p>
                        </div>
                       
                    </div>
                    
                </div>
            </div>
        
            <div class="carousel-item" data-bs-interval="6000">
                    <img src="assets/images/about_us.jpg" alt="food" class="banner2">
                    <div class="carousel-caption slider4">
                        <div class="row align-items-center">
                            <div class="col-md-6 animate__animated animate__zoomIn animate__delay-1s">
                                <div class="footer-about bg-light">
                                    <img src="/assets/images/logo.png" class="footer-img " alt="">
                                    
                                    <h5 style=" color: #35615a;font-size:15px">Resto L'inspiration le restaurant de la nouvelle tendance</h5>
                                      <p style="color:rgb(67,68,69);font-size:15px">vous offre un choix varié de menus et plats,
                                       soigneusement préparé par des chefs professionnelles.
                                      </p>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <h2 class="animate__animated animate__zoomIn animate__delay-2s" style="color:rgb(67,68,69);font-size:50px;font-family: 'Great Vibes', cursive;" >Restaurant L'inspiration</h2>
                                <p class="animate__animated animate__zoomIn animate__delay-3s" style="color: #fff;font-size:20px;font-family: 'Roboto';">Le café-restaurant «INSPIRATION» situé à Tanger , vous offre une cuisine gourmande et authentique.
                                    Un cadre moderne et chaleureux ou vous pourrez passer un moment en toute tranquillité, ...</p>
                                <a href="/Apropos" class="animate__animated animate__zoomIn animate__delay-4s button1-carousel4 mt-3" >Voir plus</a>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleLight" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleLight" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
                
   
                       
        
                        {{-- ici se trouve nos owl-carousels  --}}
        <section class="custom-carousels">
            <div id="cat" class="container" style="margin-bottom:100px">
                <div class="row align-items-center " style="">
                    <div class="col-md-6 offset-md-3 justify-content-center text-center">
                        <h3 style="font-weight:bold;font-family: 'Poppins', sans-serif;color:#3c3934; border: 50px solid transparent;border-image: url(assets/images/title_border.svg) 350;text-align:center;padding: 15px 5px;display:inline-block">Nos Catégories</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="owl-carousel owl-theme" style="border-bottom: 2px solid rgba(67,68,69,0.322);border-top: 2px solid rgba(67,68,69,0.322);padding-top:10px">
                        @foreach ($categories as $category)
                            <div class="item py-3 d-flex justify-content-center">
                                <div class="card">
                                    <a href="{{route('Category.Products',$category->title)}}"><img src="{{$category->image}}" class="owl-img" alt=""></a>
                               
                                    <div class="category_info">
                                        <a href="{{route('Category.Products',$category->title)}}">{{$category->title}}</a>
                                       
                                    </div>
                                </div>
                            </div>
                        @endforeach           
                    </div>
                </div>
            </div>

            <div class="container" style="margin-bottom:100px">
                <div class="row align-items-center " style="">
                    <div class="col-md-6 offset-md-3 justify-content-center text-center">
                        <h3 style="font-weight:bold;font-family: 'Poppins', sans-serif;color:#3c3934; 
                        border: 50px solid transparent;border-image: url(assets/images/title_border.svg) 350;
                        text-align:center;padding: 15px 5px;display:inline-block">Nouveaux Produits</h3>
                       
                    </div>
                </div>

                <div class="row ">
                    <div class="owl-carousel owl-theme" style="border-bottom: 2px solid rgba(67,68,69,0.322);border-top: 2px solid rgba(67,68,69,0.322);padding-top:10px">
                        @foreach ($products as $product)
                            @if ($product->old_price == 0 and $product->price > 40)
                                <div class="item py-3 d-flex justify-content-center">
                                    <div class="card">
                                        <img class="" src="{{ $product->image }}" alt="">
                                        <div class="info">
                    
                                            <h3>{{$product->name}} </h3>
                                            <h5 >{{$product->price}} DH</h5>
                                            <p>{{Str::limit($product->details,25)}}</p>
                                            <a href="{{route('products.show',$product->name)}}" class="btn">Voir Produit</a>
                                          
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @endforeach    
                    </div>
                </div>
            </div>
               
            
        
            <div id="offre" class="container" style="padding-bottom:100px">
                <div class="row align-items-center " style="">
                    <div class="col-md-6 offset-md-3 justify-content-center text-center">
                        <h3 style="font-weight:bold;font-family: 'Poppins', sans-serif;color:#3c3934; border: 50px solid transparent;border-image: url(assets/images/title_border.svg) 350;text-align:center;padding: 15px 5px;display:inline-block">Nos Promotions</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="owl-carousel owl-theme" style="border-top: 2px solid rgba(67,68,69,0.322);border-bottom: 2px solid rgba(67,68,69,0.322);padding-top:10px">
                        @foreach ($products as $product)
                            @if ($product->old_price > 0)
                                <div class="item py-3 d-flex justify-content-center">
                                    <div class="card">
                                      
                                            <a href=""><img src="{{$product->image}}" class="owl-img" alt=""></a>
                                    
                                       
                                            <div class="info">
                                                <h3>{{$product->name}}</h3>
                                                <h5 >{{$product->price}} DH<span><strike style="font-size: 15px;margin-left:10px;color:#fff">{{$product->old_price}} DH</strike></span> </h5>
                                                <p>{{Str::limit($product->details,25)}}</p>
                                                <a href="{{route('products.show',$product->name)}}" class="btn">Voir Produit</a>
                                                
                                            </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach  
                    </div>
                                     
                </div>
            </div>
            


        </section>
                       
        

    
    <!--  Fin Du Carousel Des Promotions   --> 

@endsection