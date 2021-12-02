<?php

namespace Database\Factories;


use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'url'=> $this->faker->image('public/storage/posts', 700, 700),
               // 'image' => $this->faker->imageUrl('900', '300'),
        ];
    }
}
