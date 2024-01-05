<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('categories')->insert([
    [
        
        'title'=>'Sandwiches',
        'image'=>'assets/images/sandwiches.jpg'
    ],

    [
       
        'title'=>'Salades',
        'image'=>'assets/images/salades.jpg'
    ],

    [
       
        'title'=>'Poissons',
        'image'=>'assets/images/poisson.jpg'
    ],

    [
        
        'title'=>'Boissons',
        'image'=>'assets/images/boissons.jpg'
    ],
    [
        
        'title'=>'Desserts',
        'image'=>'assets/images/dessert.jpg'
    ],
    [
        
        'title'=>'Pizzas',
        'image'=>'assets/images/pizzas.jpg'
    ],

    ]);
    }
}
