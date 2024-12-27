<?php

namespace Database\Factories;

use App\Models\Catgeory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catgeory>
 */
class CatgeoryFactory extends Factory
{
    protected $model = Catgeory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
        ];
    }
}
