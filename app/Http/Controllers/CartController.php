<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;




class CartController extends Controller
{
    public function index()
    {
        $categories= Category::has('products')->latest()->get();
        return view('cart.index')->with([
            'items'=> Cart::content(),
            'categories'=>$categories
        ]);
    }

    public function addProductToCart(Request $request, Product $product)
    { 
    
        Cart::add(array(
           
            "id"=>$product->id,
            "name"=>$product->name,
            "price"=>$product->price,
            "qty"=>$request->qty,
            "options" => ['image'=>$product->image],
            "total"=>Cart::total(),
        ))->associate('Product');
        
        return redirect()->back()->withSuccess("Produit ajouté au panier avec succès");
    }

    public function updateProductOnCart(Request $request,$rowId)
    {      
        $qty = $request->qty;
        Cart::update($rowId,$qty)->associate('Product');

        return redirect()->route("cart.index")->withSuccess("Produit modifié avec succès");
    }

    public function removeProductFromCart($rowId)
    {
        Cart::remove($rowId);
        
        return redirect()->route("cart.index")->withSuccess("Produit supprimé avec succès");
    }

    public function checkout(User $user)
    {

        return view('Cart.checkout')->with([
            'user'=>$user,
            'categories'=>Category::all(),
        ]);
    }


}
