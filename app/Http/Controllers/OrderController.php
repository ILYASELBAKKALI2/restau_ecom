<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::has('orders')->get();
        $orders = Auth::user()->orders;
        

        return view('user.orders.index')->with([
            "categories"=>Category::all(),
            "orders"=> $orders,
            "users"=> $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.orders.create')->with(
            ['categories'=>Category::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Order $order)
    {
        $request->validate([
            "address" => "required|min:10",
            "telephone" => "required|min:10",
        ]);

        
        
        foreach(Cart::content() as $item){
            
            Order::create([
                "user_id"=>Auth::user()->id,
                "product_name"=>$item->name,
                "qty"=>$item->qty,
                "total"=>$item->subtotal,
                "telephone"=>$request->telephone,
                "address"=>$request->address,
                "city"=>'Tanger',
                "country"=>'Maroc',
                "delivery_date"=> Carbon::now()->addHour()->addMinutes(30),
                
                
            ]);
        }
        Cart::destroy();
    
        return redirect()->route("orders.index")->withInfo("Merci pour votre commande, vos produits 
                                        seront livrer bientot");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("orders.index")->withSuccess("Votre commande a été annulée");
    }

   


}
