<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin')->except(["index"]);
        
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            "title" => "required|min:5",
            "image" => "required|image|mimes:png,jpg,jpeg|max:6048",
            
        ]);

        if($request->has("image"))
        {
            $file = $request->image;
            $imageName = "assets/images/".$file->getClientOriginalName();
            $file->move(public_path("assets/images"),$imageName);
            $title = $request->title;


            Category::create([
                "title"=> $title,
                "image"=> $imageName,
            ]);
            return redirect()->route("admin.categories")->withSuccess("Catégorie ajoutée avec succès");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view("admin.categories.edit")->with([

            "category" => $category,
            "categories" => Category::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $this->validate($request,[
            "title" => "required|min:3",
            "image" => "image|mimes:png,jpg,jpeg|max:6048",
           
        ]);

        if($request->has("image"))
        {
            $image_path = public_path("assets/images/".$category->image);
                if(File::exists($image_path)){
                    unlink("$image_path");
                }
            $file = $request->image;
            $imageName = "assets/images/".$file->getClientOriginalName();
            $file->move(public_path("assets/images"),$imageName);
            $category->image = $imageName;
        }
            $title = $request->title;

            $category->update([
                "title"=>$title,
                "image"=> $category->image,
            ]);
            return redirect()->route("admin.categories")->withSuccess("Catégorie modifiée avec succès");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $image_path = public_path("assets/images/".$category->image);
                if(File::exists($image_path)){
                    unlink("$image_path");
                }
            

            $category->delete();
            return redirect()->route("admin.categories")->withSuccess("Catégorie supprimée avec succès");
        
    }
}
