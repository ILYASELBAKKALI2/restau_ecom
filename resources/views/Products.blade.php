@extends('layouts.master')

@section('content')
  <div class="container-fluid">
    <div class="row py-5">
      <div class="col-md-3">

          <div class="side_bar">
              <h3>Catégories</h3>
              @foreach ($categories as $category)
                   <a href="{{route('Category.Products',$category->title)}}">{{$category->title}}</a>
              @endforeach
          
            <h3 class="text-center">Filtrage par prix</h3>
          

              <div class="row pt-5">
                <div class="col-md-12 d-flex justify-content-center">
                  <div id="slider-range" class="" style="width: 30vh;height:7px;background-color:#fff"></div>
                </div>
              </div>

              <div class="row pb-5">
                <div class="col-md-12">
                  <p>Prix: <span id="slider-range-value1" style="color:#d85f3e;font-size:15px"></span><span style="color:rgb(67,68,69);font-size:15px"> DH</span> - <span id="slider-range-value2" style="color:#d85f3e;font-size:15px"> 
                  </span><span style="color:rgb(67,68,69);font-size:15px"> DH</span></p>
                    <form action="{{route('price.filter')}}" class="d-flex justify-content-center " method="GET" >
                    <input type="hidden" id="query1" name="query1" value="">
                    <input type="hidden" id="query2" name="query2" value="">
                    <button type="submit" class="btn btn-dark text-center">Filtrer</button>
                    </form>    
                </div>
              </div>
          </div>  
      </div>
    
    <div class="col-md-9">
      <div class="row">
        
        @foreach ($products as $product)
        
          <div class="col-md-4 mb-5">
              <div class="card">
                <a href=""><img src="{{asset($product->image)}}" class="owl-img" alt=""></a>
                  <div class="info">
                    <h3>{{$product->name}}</h3>
                    <h5 >{{$product->price}} DH
                      <span>
                        @if ($product->old_price > 0)
                          <strike style="font-size: 15px;margin-left:10px;color:#fff">
                            {{$product->old_price}} DH</strike>
                        @endif    
                      </span>
                    </h5>
                    <p>{{Str::limit($product->details,84)}}</p>
                    <a href="{{route('products.show',$product->name)}}" class="btn">Voir Produit</a>
                  </div>
              </div>
          </div>  
        @endforeach

      </div>
      
        <div class="row align-items-center">
          <div class="col-md-12  d-flex justify-content-center" style="outline: none">{{$products->links()}}</div>
         
       </div>
    </div>
        
    </div>
          
     
          
    </div>


@endsection
@push('scripts')
    <script>
      $(document).ready(function() {
  $('.noUi-handle').on('click', function() {
    $(this).width(50);
  });
  var rangeSlider = document.getElementById('slider-range');
  
  noUiSlider.create(rangeSlider, {
    start: [10, 150],
    step: 1,
    range: {
      'min': [10],
      'max': [150]
    },
    tooltips:true,
    connect: true
  });
  
  // Set visual min and max values and also update value hidden form inputs
  rangeSlider.noUiSlider.on('update', function(values, handle) {
    document.getElementById('slider-range-value1').innerHTML = values[0];
    document.getElementById('slider-range-value2').innerHTML = values[1];
    document.getElementById('query1').value = values[0];
    document.getElementById('query2').value = values[1];    
  });
});
    </script>
    

    @endpush