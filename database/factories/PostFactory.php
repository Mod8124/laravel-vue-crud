<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name= $this->faker->sentence();
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'extract'=>$this->faker->text(200),
            'descripcion'=>$this->faker->text(2000),
            'status'=>$this->faker->randomElement(['nuevo', 'proceso', 'completado']),
            'category_id'=>Category::all()->random()->id,
            'user_id'=>User::all()->random()->id
        ];
    }
}
