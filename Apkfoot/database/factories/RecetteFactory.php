<?php

namespace Database\Factories;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecetteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recette::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'Prix'=>$this->faker->Prix,
                'date'=>$this->faker->date,
        ];
    }
}
