@component('mail::panel')
    Contact Form
@endcomponent



@component('mail::message')

# Message de {{$data['first_name']}}<span> {{$data['last_name']}}</span>

<strong>Email : </strong>{{$data['email']}}
<br>
<br>
<strong style="text-align: center">Message : </strong>
<br>
{{$data['message']}}

@endcomponent
