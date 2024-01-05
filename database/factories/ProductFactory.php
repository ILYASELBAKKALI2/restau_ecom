<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence,
            'image'=>'https://source.unsplash.com/random',
            'price'=>$this->faker->numberBetween($min = 100,$max = 900),
            'old_price'=>$this->faker->numberBetween($min = 1000,$max = 9000),
            'details'=>$this->faker->text,
            'category_id'=>$this->faker->numberBetween($min = 1,$max = 6),
        ];
    }
}
