<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'cpf' => $this->faker->cpf,
            'address' => [
                'postcode' => $this->faker->postcode,
                'address' => $this->faker->address,
                'city' => $this->faker->city,
                'state' => $this->faker->state,
            ],
        ];
    }
}
