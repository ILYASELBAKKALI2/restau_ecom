<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::latest()->get();
        $products=Product::latest()->get();
        return view('home',
                        ['categories' => $categories],
                        ['products' => $products]);
                   
    } 
    public function Contact()
    {
        $categories = Category::has('products')->get();
        $products=Product::all();
        return view('Contact',
                        ['categories' => $categories],
                        ['products' => $products]);
                   
    }

    public function Search(Request $request)
    {

        $request->validate([
            'query'=>'required|min:3',
        ]);

        $query = $request->input('query');
        $categories = Category::has('products')->get();
        $products=Product::where('name', 'like', "%$query%")->paginate(3);
        return view('products.search_page',
                        ['categories' => $categories],
                        ['products' => $products]);
                   
    }

    public function About()
    {
        $categories = Category::latest()->get();
        $products=Product::latest()->get();
        return view('about',
                        ['categories' => $categories],
                        ['products' => $products]);
                   
    }
    
    public function test()
    {
        $categories = Category::latest()->get();
        $products=Product::latest()->get();
        return view('test',
                        ['categories' => $categories],
                        ['products' => $products]);
    }

}
