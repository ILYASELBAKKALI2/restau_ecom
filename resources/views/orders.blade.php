@extends('layouts.master')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-stripped bg-light">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Client</th>
                        <th>Email</th>
                  
                        <th>Produit</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Durée de livraison</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        @if (Auth::user()->id == $order->user_id)
                        <tr>       
                            
                                <td>{{$order->id}}</td>
                                <td>{{Auth::user()->name}}</td>
                                <td>{{Auth::user()->email}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->qty}}</td>
                                <td>{{$order->total}}</td>
                                            
                            <td><a href="">annuler</a></td>
                        </tr>
                        @endif 
                        @endforeach
                        
                      
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection