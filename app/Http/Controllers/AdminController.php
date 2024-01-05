<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Livreur;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

   
    public function __construct()
    {
        $this->middleware('auth:admin')->except(["adminLogin","showAdminLoginForm"]);
        
    }

    public function index()
    {
        $categories = Category::has('products')->get();

        return view("admin.index")->with([
            'categories'=>$categories,
            'products'=> Product::all(),
            'orders'=> Order::all(),
            'livreurs'=> Livreur::all(),
        ]);
    }

    public function showAdminLoginForm()
    {
        $categories = Category::has('products')->get();
        if(auth()->guard('admin')->check()){
            return redirect('/admin');
        }
        return view("admin.auth.login",['categories'=> $categories]);
    }

    public function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required|min:4',
        ]);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }

        if(auth()->guard('admin')->attempt([
           'email'=>$request->email,
           'password'=>$request->password, 
        ],

        $request->get("remember"))){
            return redirect('/admin');
        }else{
            return redirect()->route('admin.login')->with([
                "errorLink"=>"Email ou Mot de passe incorrect"
            ]);
        }
    }

    public function adminLogout()
    {
        auth()->guard("admin")->logout();
        return redirect()->route('admin.login');
    }

    public function getProducts()
    {
        $products = Product::latest()->paginate(6);
        $categories = Category::has('products')->get();
        return view("admin.products.index",['products'=> $products],['categories'=>$categories]);
    }


    public function getCategories()
    {
       
        $A_categories = Category::latest()->paginate(4);
        $categories = Category::all();
        
        return view("admin.categories.index",
        ['A_categories'=>$A_categories],
        ['categories' => $categories],
        
    );
        
    }

    public function getOrders()
    {
        
        return view("admin.orders.index")->with([
            'orders'=> Order::paginate(6),
            'livreurs'=> Livreur::all(),
        ]);
        
    }

    

    public function deleteOrderFromTable(Order $order)
    {
        $order->delete();
        return redirect()->back()->withSuccess("La commande a été supprimée avec succès");
    }

    public function searchOrders(Request $request,Order $order)
    {
        $request->validate([
            'order'=>'required',
        ]);

       
        $data = $request->input('order');
        $orders = Order::where('id',"like","%$data%")->paginate(3);
        return view("admin.orders.index")->with([
            "orders"=>$orders,
            "livreurs"=>Livreur::paginate(6),
           
        ]);
    }

    public function searchProducts(Request $request)
    {
        $request->validate([
            'product'=>'required|min:3',
        ]);

        $categories = Category::all();
        $data = $request->input('product');
        $products = Product::where("name","like","%$data%")->paginate(3);
        return view("admin.products.index")->with([
            "products"=>$products,
            "categories"=>$categories,
        ]);
    }

    public function searchCategories(Request $request)
    {
        $request->validate([
            'category'=>'required|min:3',
        ]);

        $categories = Category::all();
        $data = $request->input('category');
        $A_categories = Category::where("title","like","%$data%")->paginate(3);
        return view("admin.categories.index")->with([
            "A_categories"=>$A_categories,
            "categories"=>$categories,
        ]);
    }

    public function Add_Order_To_Livreur(Request $request, Order $order)
    {
    
        $order->update([
            "livreur"=> $request->livreur,

        ]);
        return redirect()->route("admin.orders");
    }

    public function Add_Livreur(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required|email',
            'password'=>'required|min:5',

        ]);

    
        Livreur::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
        ]);
        return redirect()->route("admin.orders")->with([
            "orders"=>Order::paginate(6),
        ]);
    }
    public function Create_Livreur()
    {
        return view('admin.livreurs.create');
    }
    public function Delete_Livreur(Livreur $livreur)
    {
        $livreur->delete();
        return redirect()->back()->withSuccess('Livreur Supprimé avec succès');
    }



    

    
}
