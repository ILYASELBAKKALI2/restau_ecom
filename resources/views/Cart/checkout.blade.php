@extends('layouts.master')


@section('content')
<div class="container-fluid mt-3">
   

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 mt-4">
                <h2 class="text-center py-3" style="border-bottom: 1px solid #1abc9c">Facturation & Expédition</h2>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <form action="{{route('user.orders.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8 offset-md-2 py-2">
                    <input type="text" value="{{ Auth::user()->name }}" class="form-control contact-form" name="Full_name" placeholder="Votre prénom" aria-label="Full_name">
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-8 offset-md-2 py-2">
                    <input type="text" class="form-control contact-form" name="address"  id="" placeholder="Votre adresse">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2 py-2">
                    <select type="text" class="form-control contact-form" name="country" disabled id="" placeholder="">
                        <option value="Maroc" selected>
                                    Pays : Maroc

                        </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2 py-2">
                    <input type="" class="form-control contact-form" id="" name="P_code" placeholder="Code postal">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2 py-2">
                    <input type="text" class="form-control contact-form" id="" name="telephone" placeholder="Telephone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2 py-2">
                    <input type="email" value="{{ Auth::user()->email }}" class="form-control contact-form" id="" name="email"placeholder="Votre email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2 py-2">
                    <select type="text" class="form-control contact-form" name="city" disabled id="" placeholder="">
                        <option value="Tanger" selected>
                                    Ville : Tanger

                        </option>
                    </select>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-8 offset-md-2 py-2 text-center">
                    <button type="submit" class="contact-button">Commander</button>
                </div>
            </div>

        </form>
    </div>
</div>    

@endsection