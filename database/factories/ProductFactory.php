<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->colorName,
            "price"=> random_int(100,1000),
            "thumbnail"=> $this->faker->imageUrl(),
            "description"=>$this->faker->realText(500),
            "qty"=> random_int(10,100),
           // "status"=>,
            "category_id"=> random_int(1,100)
        ];
    }
}
