@extends('layouts.master')

@section('content')
    
    <div class="container py-5" style="min-height: 50vh">
        <div class="row">
            <div class="col-sm-12">
                @if (Cart::count() > 0)
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-1">
                            <strong>{{ session()->get("success") }}</strong>
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> 
                    @endif
                
                <table class="table mt-5 " style="box-shadow: 0 0 5px #000;">
                    <thead style="background-color: rgba(10, 138, 106, 0.76)">
                        <th class="text-center" style="">Produit</th>
                        <th class="text-center" style="">Titre</th>
                        <th class="text-center" style="">Quantité</th>
                        <th class="text-center" style="">Prix</th>
                        <th class="text-center" style="">Total</th>
                        <th class="text-center" style="">Supprimer</th>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            
                        
                        <tr class="tab_row" style="border-bottom: 1px solid rgb(67,68,69)">
                            <td> 
                            <img src="{{$item->options->image}}" width="50" height="50" class="" style="display: flex;margin: 0px auto;" alt="">
                            </td>

                            <td class="text-center" style="font-weight: bold">{{$item->name}}</td>
                            <td class="text-center" style="font-weight: bold">
                            
                                <form action="{{ route("update.cart",$item->rowId) }}" method="post">
                                    
                                    @csrf
                                    @method("PUT")                             
                                    
                                    

                                    <input type="number" class="quantity text-center" id="quantity" name="qty" value="{{$item->qty}}" min="1" style="width: 40px">
                                
                                    {{--<button type="button" class="button_quantity" id="btn-increase">+</button>
                                    <button type="button" class="button_quantity" id="btn-reduce">−</button>--}}

                                    <button type="submit" class="btn btn-sm delete_cart" click.prevent="updateProductOnCart('{{ $item->rowId }}')"><i class="fas fa-edit"></i></button>
                                </form>  
                                

                                
                            </td>
                            <td class="text-center" style="font-weight: bold">{{$item->price}} DH</td>

                            <td class="text-center" style="font-weight: bold">{{$item->subtotal}} DH</td>

                            <td class="text-center" style="font-weight: bold">

                                <form action="{{ route("remove.cart",$item->rowId) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm delete_cart" click.prevent="removeProductFromCart('{{ $item->rowId }}')"><i class="fas fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                        
                    
                        @endforeach
                        <tr class="" style="font-weight: bold">
                            <td colspan="4" class="">Total : </td>
                            <td colspan="8" class=" text-center">{{ Cart::Subtotal()}} DH</td>
                        </tr>
                    </tbody>
                </table>
                
                <a href="{{route('orders.create')}}" class="btn btn-dark mb-5" style="float: right">Valider commande</a>

                <a href="/orders" class="btn btn mb-5" style="color:#fff;background-color: rgba(10, 138, 106, 0.76);margin-right:10px;float: right">Voir vos commandes</a>
         
                
                @else
                <div class="container">
                
              
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <h1 style="color:rgba(67, 68, 69, 0.603)" class="text-center">Votre cart est vide</h1>
                    </div>
                    </div>

            </div>
                    
                @endif
            </div>
        </div>
    </div>

@endsection
