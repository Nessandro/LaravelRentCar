<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{

    const BRANDS = ['Opel', 'Mercedes', 'Vaults Wagon', 'Ferrari', 'Skoda'];
    const MODELS = ['Opel', 'Mercedes', 'Vaults Wagon', 'Ferrari', 'Skoda'];
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brandKey = array_rand(static::BRANDS,1);
        return [
            'brand' => static::BRANDS[$brandKey],
            'model' => ucwords(implode(' ', $this->faker->words(1))),
            'image' => null,
        ];
    }
}
