<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Livreur;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\LivreurSendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LivreurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:livreur')->except(["LivreurLogin","showLivreurLoginForm"]);
        
    }
    
    public function index()
    {
        $categories = Category::has('products')->get();

        return view("Livreur.orders.index")->with([
            'categories'=>$categories,
            'products'=> Product::all(),
            'orders'=> Order::paginate(6),
        ]);
    
    }

    public function showLivreurLoginForm()
    {

        $categories = Category::has('products')->get();
        if(auth()->guard('livreur')->check()){
            return redirect('/livreur');
        }
        return view("livreur.auth.login");
    }

    public function LivreurLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required|min:4',
        ]);

        if ($validator->fails()) {
            return redirect('livreur/login')
                        ->withErrors($validator)
                        ->withInput();
        }
       

        if(auth()->guard('livreur')->attempt([
           'email'=>$request->email,
           'password'=>$request->password, 
        ],
        $request->get("remember"))){
            return redirect('/livreur');
        }else{
            return redirect()->route('livreur.login')->with([
                "errorLink"=>"Email ou Mot de passe incorrect"
            ]);
        }
    }

    public function LivreurLogout()
    {
        auth()->guard("livreur")->logout();
        return redirect()->route('livreur.login');
    }

    public function updateDeliveredOrder(Request $request, Order $order)
    {
        if($order->delivered == 0){
            $order->update([
                'delivered' => 1,
            ]);
            return redirect()->back()->withSuccess("La commande a été modifié avec succès");
        }else{
            $order->update([
                'delivered' => 0,
            ]);
            return redirect()->back()->withSuccess("La commande a été modifié avec succès");
        }
    }

    public function updatePaidOrder(Request $request, Order $order)
    {
        if($order->paid == 0){
            $order->update([
                'paid' => 1,
            ]);
            return redirect()->back()->withSuccess("La commande a été modifié avec succès");
        }else{
            $order->update([
                'paid' => 0,
            ]);
            return redirect()->back()->withSuccess("La commande a été modifié avec succès");
        }
    
    }
    
    public function searchOrders_Liv(Request $request,Order $order)
    {
        $request->validate([
            'order'=>'required',
        ]);

        $categories = Category::all();
        $data = $request->input('order');
        $orders = Order::where('id',"like","%$data%")->paginate(3);
        return view("livreur.orders.index")->with([
            "orders"=>$orders,
            "categories"=>$categories,
        ]);
    }

    public function Livreur_Index()
    {
        return view("Livreur.orders.index")->with([
           
            'orders'=> Order::paginate(6),
        ]);
        
    }

    public function Store_Message(Request $request, Livreur $livreur)
    {
        

        $data= [

            'full_name'=>$request->full_name,
            'Message'=>$request->Message,
            'email'=>$request->email,
            'order_ID'=>$request->order_ID,
           
        ];
            
       Mail::to("resto.inspiration@gmail.com")->send(new LivreurSendMail($data));
       
        return back()->withSuccess('Votre message à été envoyé avec succès.');
        
    }

    public function LivreurState(Request $request, Livreur $livreur)
    {
        if($livreur->state == 0){
            $livreur->update([
                'state' => 1,
            ]);
            return redirect()->back();
        }else{
            $livreur->update([
                'state' => 0,
            ]);
            return redirect()->back();
        }
    
    }

}
