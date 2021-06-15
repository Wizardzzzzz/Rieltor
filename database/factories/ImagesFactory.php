<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Images;

class ImagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Images::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'adv_id' =>$this->faker->unique()->numberBetween(1,100),
            'path'=>$this->faker->randomElement(['1651166908681531.jpg','1651166908886583.jpg',
                '1651166908996560.jpg','1.jpg','2.jpg','3.jpg','2.jfif','3.jfif','image.jfif',
                'flat0.jfif','flat1.jfif','flat2.jfif','22.jpg','33.jpg','44.jpg']),
        ];
    }
}
