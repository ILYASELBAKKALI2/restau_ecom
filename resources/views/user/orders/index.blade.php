@extends('layouts.master')

@section('content')
    
    <div class="" style="min-height: 100vh">

 
    <div class="container py-5">
        
        @include('layouts.alerts')
        
        <div class="row pt-5">
            
            <div class="col-md-12">
                <h4 style="font-size:50px ;display:inline-block;color:rgba(67, 68, 69, 0.801);font-family:'Great Vibes',cursive">Vos commandes</h4>
                @if(Auth::user()->orders->count() > 0)
                
               
                <table class="table text-center mt-2" style="box-shadow: 0 0 5px #000;">
                    <thead style="background-color:rgba(10, 138, 106, 0.74)">
                        <tr style="color: #fff">
                        <th>Produit</th>
                        <th>Qty</th>
                        <th>Total</th>
                     
                        </tr>
                    </thead>
                    <tbody style="border-bottom: 2px solid rgb(67,68,69)">
                        
                        
                        
                       
                        <tr>       
                            @foreach ($orders as $order)
                            @if (Auth::user()->id == $order->user_id)
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->qty}}</td>
                                <td>{{$order->total}} DH</td>
                                
                        </tr>
                            @endif
                            @endforeach
                        </tbody>
                </table>
                

            </div>
            </div>
            <div class="row align-items-center">
            <div class="col-sm-12 d-flex justify-content-center">
            
             
            </div>
        </div>
        <div class="row py-5">
                <div class="col-md-12">
                    <h4 class="" style="color:rgba(67, 68, 69, 0.801);font-size:50px;font-family: 'Great Vibes',cursive">Facturation</h4>
                    <table class="table text-center mt-2 " style="box-shadow: 0 0 5px #000;border-bottom: 2px solid rgb(67,68,69);">
                        <thead style="background-color:rgba(10, 138, 106, 0.74)">
                            <tr style="color: #fff">
                            <th><h5>Produit</h5></th>
                            <th><h5>Adresse</h5></th>
                            
                            </tr>
                        </thead>
                        <tbody style="border-top: 2px solid rgb(67,68,69)">
                            @foreach ($orders as $order)
                            @if (Auth::user()->id == $order->user_id)
                            <tr>
                                <td><h5>{{$order->product_name}}</h5></td>
                                <td class="" style=""><h5>{{$order->address}}</h5></td>
                            </tr>
                            @endif
                            @endforeach
                             
                            <tr  style="color:#fff;border-top: 1px solid rgb(67,68,69);background-color:rgba(10, 138, 106, 0.74)">
                                <td colspan="2" style=""><h5>Nom complet</h5></td>
                                    
                            </tr>
                            <tr>
                                <td colspan="2" class=""  style=""><h5>{{Auth::user()->name}}</h5></td> 
                            </tr>
                            
                            <tr style="">
                               
                                <td class="" style="color: #fff;background-color:rgba(10, 138, 106, 0.74)" colspan="2">
                                    <h5 >{{Auth::user()->orders->sum('total') }} DH à payer</h5>
                                </td>
                           
                                
                            </tr>
                        
                        
                       
                            </tbody>
                    </table>
                    
                    
                   
                   
                    
                </div>
            </div>
            <div class=" time">
                <h5 class="text-center py-3" style="border: 2px solid rgb(67, 68, 69)">Temps estimé pour la livraison</h5>
                    @foreach ($orders as $order)
                        @if (Auth::user()->id == $order->user_id)
                        <div class="col-md-8 offset-md-2 mt-2">
    
                            <div id="CountDown" data-date="{{$order->delivery_date}}">
                
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                    
    </div>
           
           
            
                    
                @else
                    <h1 class="text-center py-5" style="color: rgba(67, 68, 69, 0.712);font-family: 'Lobster', cursive;">Rien à afficher</h1>
                @endif
               
    </div>
</div>
    @push('scripts')
    <script>
        $("#CountDown").TimeCircles({ time: {
        Days: { show: false },
        Hours: { show: false },
        Minutes: { show: true, },
        Seconds: { show: true,  }
        }},
        {count_past_zero: false}).addListener(countdownComplete);
	
function countdownComplete(unit, value, total){
	if(total<=0){
		$(".time").fadeOut('slow');
	}
}

    </script>
    @endpush
@endsection