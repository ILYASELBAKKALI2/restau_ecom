<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendEmail;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendEmailController extends Controller
{
    public function Create()
    {
        return view('Contact.ContactForm')->with([
            'categories'=>Category::latest()->get(),
        ]);

        
    }

    public function Store(Request $request, User $user)
    {
        

        $data= [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'message'=>$request->message,
        ];
            
       Mail::to("resto.inspiration@gmail.com")->send(new SendEmail($data));
       
        return back()->withSuccess('Votre message à été envoyé avec succès. Merci');
        
    }
}
