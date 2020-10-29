<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_id'            => Car::all()->random()->id,
            'user_id'           => User::all()->random()->id,
            'start_date'        => $this->faker->dateTimeBetween('-30 days', '-2 days'),
            'finish_date'       => $this->faker->dateTimeBetween('+2 days', '+20 days'),
            'cancelled_at'      => null,
        ];
    }
}
