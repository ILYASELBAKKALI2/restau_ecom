@extends('layouts.master')


@section('content')
<div class="container py-5">
  <div class="row">
    <div class="text-center">
    <h3  style="color: rgba(67, 68, 69, 0.815)">Recherche Resultats</h3>
    <p style="color: rgb(67,68,69);font-weight:bold"><strong style="font-size: 18px">({{ $products->total() }})</strong> Resultat(s) pour '{{request()->input("query")}}' </p>
    </div>
  </div>
    <div class="row align-items-center">
    @foreach ($products as $product)
      <div class="col-sm-4 py-4 d-flex justify-content-center">
        <div class="card">
          <a href=""><img src="{{asset($product->image)}}" alt=""></a>
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
              <a href="{{route('products.show',$product->name)}}" class="btn">Voir produit</a>
            </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row">
      <div class="d-flex justify-content-center">
          {{$products->appends(request()->input())->links()}}
      </div>
    </div>
  </div>

 





@endsection