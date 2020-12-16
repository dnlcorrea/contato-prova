<?php

namespace Database\Factories;

use App\Models\Telephone;
use App\Models\TelephoneType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TelephoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Telephone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'telephone' => $this->faker->phoneNumber,
            'telephone_type_id' => TelephoneType::inRandomOrder()->first()->id
        ];
    }
}
