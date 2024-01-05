@extends('layouts.employees')

@section('empl_content')
<div class="" style="padding: 31px 0px 31px 0px"> 
    <div class="container bg-light py-2" style="border-radius:50px;box-shadow: 0 0 20px #000">
        
    
    <div class="row ">
        <div class="col-sm-12 py-3">
            <h1 class="text-center " style="font-size:50px;font-family: 'Lubster',cursive;color:rgb(67,68,69)">Login</h1>
        </div>
        <div class="text-center">@include('layouts.alerts') </div>
    </div>

    <div class="row " style="padding-top:50px; font-family: 'Poppins">
        
        <div class="col-sm-5 justify-content-center d-flex">
            <img src="{{asset('assets/images/admin_icon.png')}}" width="95%" height="95%" alt="">
        </div>
        <div class="col-sm-7" >
         
             <form method="POST" action="{{ route('admin.login') }}" class='' style="margin-left:40px;align-items:center;width:100%">
                @csrf
          
                <div class="row">
                    <div class="col-sm-8 offset-sm-2" style="padding: 2rem 1rem">
                        <input id="email" type="email" placeholder="Votre e-mail" width="100%" class="form-control auth_inp @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
             
                <div class="row">
                    <div class="col-sm-8 offset-sm-2" style="padding: 2rem 1rem">
                        <input id="password" width="100%" placeholder="Votre mot de passe" type="password" class="form-control auth_inp @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">    
                    <div class="col-sm-4 offset-2" >
                        <div class="form-check">
                            <input class="form-check-input auth_inp_check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Restez Connecté') }}
                            </label>
                        </div>   
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-4 offset-sm-4 text-center" style="padding: 2rem 1rem">
                        <button type="submit" class="" style="box-shadow: 0 0 10px #000;border: none;background-color:#8cab26; padding: 10px 30px;border-radius:40px">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div> 
       
    </div>
</div>
</div>
@endsection

