<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            
            'product_name'=>'Tiramisu framboises',
            'qty'=>'2',
            'total'=>'50.00',
            'city'=>'Tanger',
            'telephone'=>'(+212)615243869',
            'country'=>'Maroc',
            'address'=>'jirrari n°80',
            'paid'=>'1',
            'delivered'=>'0',
            'delivery_date'=>'2021-06-06 15:06:39',
            'user_id'=>'1',
        ]);
    }
}
