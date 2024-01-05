@extends('layouts.master')


@section('content')
<div class="container-fluid py-5">
   
    @include('layouts.alerts')

    <div class="container py-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2 class="text-center pt-3" style="font-family: 'Lubster',cursive;">Facturation & Expédition</h2>
            </div>
            <div class="col-md-4 mt-2">
                <h2 class="text-center pt-3" style="font-family:'Lubster',cursive;">Votre commande</h2>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-md-8">
   
       <form action="{{route('orders.store')}}" method="post">
           @csrf
            <div class="row">
                <div class="col-md-12 py-2">
                    <input type="text" value="{{ Auth::user()->name }}" class="form-control checkout-form" name="Full_name" placeholder="Votre prénom" aria-label="Full_name">
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-12 py-2">
                    <input type="text" class="form-control checkout-form" name="address"  id="" placeholder="Votre adresse">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 py-2">
                    <select type="text" class="form-control checkout-form" name="country" disabled id="" placeholder="">
                        <option value="Maroc" selected>
                                    Pays : Maroc

                        </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 py-2">
                    <select type="text" class="form-control checkout-form" name="city" disabled id="" placeholder="">
                        <option value="Tanger" selected>
                                    90000

                        </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 py-2">
                    <input type="text" class="form-control checkout-form" id="" name="telephone" placeholder="Telephone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 py-2">
                    <input type="email" value="{{ Auth::user()->email }}" class="form-control checkout-form" id="" name="email"placeholder="Votre email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 py-2">
                    <select type="text" class="form-control checkout-form" name="city" disabled id="" placeholder="">
                        <option value="Tanger" selected>
                                    Ville : Tanger

                        </option>
                    </select>
                </div>
            </div>
            
               
        
            <div class="row">
                <div class="col-md-12 pt-2 text-center">
                    <button type="submit" class="contact-button">Valider</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4 pt-2">
       
        
        <table class=" text-center table table-bordered border-dark">
            <thead style="background-color: rgba(10, 138, 106, 0.74)">
                <th>Produit</th>
                <th>Prix</th>
            </thead>
            <tbody >
                @foreach (Cart::content() as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}} DH</td>
                        </tr>
                    
                    @endforeach
                
                <tr>
                    <td colspan="4" class="text-center">Total : {{Cart::Subtotal()}} DH</td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>    

@endsection