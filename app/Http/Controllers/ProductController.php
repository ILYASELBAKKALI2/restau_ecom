<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except(["index","show","getProduct_By_Category","Search_By_Price"]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('Products')->with([
            'products'=> $products,
            'categories'=>Category::latest()->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.products.create")->with([
            'categories'=> Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required|min:5",
            "price" => "required|numeric",
            "old_price" => "required|numeric",
            "image" => "required|image|mimes:png,jpg,jpeg|max:6048",
            "details" => "required|min:3",
            "category_id" => "required|numeric",
        ]);

        if($request->has("image"))
        {
            $file = $request->image;
            $imageName = "assets/images/".$file->getClientOriginalName();
            $file->move(public_path("assets/images"),$imageName);
            $name = $request->name;


            Product::create([
                "name"=> $name,
                "details"=> $request->details,
                "price"=> $request->price,
                "old_price"=> $request->old_price,
                "category_id"=> $request->category_id,
                "image"=> $imageName,
            ]);
            return redirect()->route("admin.products")->withSuccess("Produit ajouté avec succès");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
        $related_products = Product::where('category_id',$product->category_id)->get();
        $popular_products= Product::inRandomOrder()->limit(10)->get();
        return view("products.show")->with([
            "product"=>$product,
            "categories"=>Category::has('products')->get(),
            "products"=>Product::latest()->paginate(6),
            "related_products"=> $related_products,
            "popular_products"=>$popular_products,
            
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view("admin.products.edit")->with([

            "product" => $product,
            "categories" => Category::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $this->validate($request,[
            "name" => "required|min:5",
            "details" => "required|min:3",
            "image" => "image|mimes:png,jpg,jpeg|max:6048",
            "price" => "required|numeric",
            "category_id" => "required|numeric",
        ]);

        if($request->has("image"))
        {
            $image_path = public_path("assets/images/".$product->image);
                if(File::exists($image_path)){
                    unlink("$image_path");
                }
            $file = $request->image;
            $imageName = "assets/images/".$file->getClientOriginalName();
            $file->move(public_path("assets/images"),$imageName);
            $product->image = $imageName;
        }
            $name = $request->name;

            $product->update([
                "name"=>$name,
                "details"=> $request -> details,
                "price"=> $request -> price,
                "old_price"=> $request -> old_price,
                "category_id"=> $request -> category_id,
                "image"=> $product->image,
            ]);
            return redirect()->route("admin.products")->withSuccess("Produit modifié avec succès");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
       
            $image_path = public_path("assets/images/".$product->image);
                if(File::exists($image_path)){
                    unlink("$image_path");
                }
            

            $product->delete();
            return redirect()->route("admin.products")->withSuccess("Produit supprimé avec succès");
        
    }

    public function getProduct_By_Category(Category $category,Request $request)
    {
        
        $products = $category->products()->paginate(6);

        return view('Products')->with([
           
            'products'=> $products,
            'categories'=>Category::latest()->get(),
        ]);
    }
    public function Search_By_Price(Request $request)
    {
        $min_price = $request->input('query1');
        $max_price = $request->input('query2');
        $products = Product::whereBetween('price',[$min_price,$max_price])->orderBy('price','asc')->paginate(6);

        return view('products.priceFilter')->with([
           
            'products'=> $products,
            'categories'=>Category::latest()->get(),
        ]);
    }
   
    
    
}
