@extends('layouts.master')


@section('content')
    <section style="padding: 10vh 0vh">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                @include('layouts.alerts')
            </div>
        </div>
    </div>

    <div class="container" style="">
        <div class="row">
            <div class="col-sm-5">
                
                <img src="{{asset($product->image)}}" style="width: 100%;height:350px;">
                <p class="mt-5 py-2 px-3 " style="font-weight:bold;color:white;background:#d85f3e">Produits connexes</p>
                <div class="owl-carousel owl-theme custom-owl-2">
                    @foreach ($related_products as $related_product)
                        
                           <div class="item">
                            <a href="{{route('products.show',$related_product->name)}}"><img src="{{asset($related_product->image)}}" class="" width="150px" height="150px" alt=""></a>
                        </div> 
                    
                        
                    @endforeach           
                </div>
            </div>

            <div class="col-sm-6 offset-1 py-3">
                <h4 class="text-center" style="font-size:50px;font-weight: bold;font-family: 'Lobster', cursive;color:rgb(68, 67, 69)">{{$product->name}}</h4><hr>
                
                    <label for="Prix" style="color:rgb(67, 68, 69);font-family: 'Poppins';font-size: 20px;font-weight:bold;">Prix:</label>
                    <p class="mt-4" style="margin-top:3px;color:#d85f3e; margin-left:10px;font-size:20px;font-weight:bold">{{$product->price}} DH
                        <strike class="" style="color:rgb(255, 0, 0); margin-left:10px;font-size:15px;font-weight:bold">
                    
                            @if ($product->old_price > 0)
                                {{$product->old_price}} DH
                            @endif
                        </strike>
                    </p>
                
                
                <div class="row mt-2">
                    <form action="{{ route("add.cart",$product->name) }}" method="post">
                        @csrf
                        {{--<label for="Taille" class="mt-2">Taille :</label>
                            <select class="form-select mt-1" aria-label="Choisir la taille">
                                <option value="1">Small</option>
                                <option value="2">Large</option>
                                <option value="3">X Large</option>
                                

                            </select>--}}
                            
                            <div class="quantity-input mt-4">
                                <label for=""  style="color:rgb(67, 68, 69);font-family: 'Poppins';font-size: 20px;font-weight:bold;">Quantity:</label>
                                    <div class="row mt-4">
                                        <div class="col-sm-6 offset-sm-2 d-flex align-items-center" style="border: 1px solid grey;width:144px; height:45px">
                                            <div style="margin: 0 auto">
                                                <input type="text" class="quantity text-center" name="qty" value="1" data-max="120" pattern="[0-9]*" style="width: 40px">
                                                <button type="button" class="button_quantity rounded-circle" id="btn-reduce" >−</button>
                                                <button type="button" class="button_quantity rounded-circle" id="btn-increase" >+</button> 
                                            </div>
                                        </div>

                                        <div class="col-sm-4 offset-sm-1">
                                            <button type="submit" class="add-to-cart text-end">Ajouter Au Panier</Button>
                                        </div>
                                    </div>
                            </div>
                            
                                <div class="mt-5">
                                    <div class="accordion"  id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item" >
                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne"   >
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            <strong class="d-flex justify-content-center">Details:</strong>
                                            </button>
                                            </h2>
                                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                    <div class="accordion-body">
                                                       
                                                        <p>{{$product->details}}</p>
                                                   
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                              
                            </div>
                            
                </form>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <p class="mt-5 py-2 px-3 " style="font-weight:bold;color:white;background:#d85f3e">Produits Populaires</p>
            <div class="owl-carousel owl-theme custom-owl-2">
                @foreach ($popular_products as $p_product)
                    <div class="item">
                        <a href="{{route('products.show',$p_product->name)}}"><img src="{{asset($p_product->image)}}" class="" width="100px" height="200px" alt=""></a>
                        <h5 style="color: rgba(0, 0, 0, 0.733)">{{$p_product->name}}</h5>
                        <p style="font-size: 15px;color:#d85f3e">{{$p_product->price}} DH <span>
                        @if ($p_product->old_price > 0)
                        <strike style="marging-left:5px;font-size: 12px;color:rgba(67, 68, 69, 0.452)">
                            {{$p_product->old_price}} DH
                        </strike>
                            
                        @endif    
                        </span></p>

                    </div>  
                @endforeach           
            </div>
        </div>  
    </div>

</section>

@endsection