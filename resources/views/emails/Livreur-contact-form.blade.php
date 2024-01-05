@component('mail::panel')
    Problème De Livraison
@endcomponent

@component('mail::message')

# Message de {{$data['full_name']}}

## Email de livreur : {{$data['email']}}

## Commande ID : {{$data['order_ID']}}

<br>


<strong style="text-align: center">Message : </strong>
<br>
{{$data['Message']}}


@endcomponent
