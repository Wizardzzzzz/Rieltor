<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Advertisement;

class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $Place = $this->faker->city;
        $Address = $this->faker->address;
        $TypeHouse = $this->faker->randomElement(['Квартира','Будинок','Кімната','Ділянка','Комерційна']);

        return [
            'Name' => $TypeHouse.' в '.$Place,
            'Place' => $Place,
            'Address' => $Address,
            'Superficiality' => $this->faker->randomDigitNotNull,
            'Fettle' =>$this->faker->randomElement(['Новобудова','Старий будинок','Задовільний','Потребує ремонту']) ,
            'Benefits'=>$this->faker->text(100),
            'TypeAdvertise'=>$this->faker->randomElement(['Продаж','Оренда','Подобова оренда']),
            'RoomNum'=>$this->faker->numberBetween(1,7),
            'TypeHouse'=>$TypeHouse,
            'Infrastructure'=>$this->faker->text(150),
            'Area'=>$this->faker->numberBetween(30,99),
            'About' =>$this->faker->text(250),
            'Price'=>$this->faker->numberBetween(20000,110000),
            'IsArchieved' =>false

        ];
    }
}
