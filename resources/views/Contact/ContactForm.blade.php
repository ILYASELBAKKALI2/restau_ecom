@extends('layouts.master')


@section('content')
<div class="container-fluid pt-3">
    <div class="text-center">
        @include('layouts.alerts')
    </div>
    <div class="row">
        <div class="col-sm-12 " style="width: 100%;height:450px;">
            <iframe style="box-shadow: 0 0 10px #000;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2242.1277038784815!2d2.312680315200954!3d48.840984509886894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sfr!2sma!4v1621691514039!5m2!1sfr!2sma" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-4">
                <h2 class="text-center" style="font-family: 'Poppins'">Envoyez nous <span style="color: rgba(10, 138, 106, 0.76) ; font-family: 'Great Vibes', cursive;font-size:80px"> un message</span></h2>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <form action="{{route('store.message')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4 offset-sm-2 py-2">
                    <input type="text" name="first_name" class="form-control contact-form" placeholder="Votre prénom" aria-label="First name">
                </div>
                <div class="col-sm-4 py-2">
                    <input type="text" name="last_name" class="form-control contact-form" placeholder="Votre nom" aria-label="Last name">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-sm-2 py-2">
                    <input type="email"  name="email" class="form-control contact-form" id="" placeholder="Votre email">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-sm-2 py-2">
                    <textarea class="form-control contact-form-textarea" name="message" id="" rows="10" placeholder="Votre message . . ."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-sm-2 py-2 text-center">
                    <button type="submit" class="contact-button">Envoyer</button>
                </div>
            </div>

        </form>
    </div>
</div>    

@endsection

