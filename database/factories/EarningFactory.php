<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Earning>
 */
class EarningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'earnable_id' => $this->faker->numberBetween(1, 10),
            'earnable_type' => $this->faker->randomElement(['App\Models\Brand', 'App\Models\Agency']),
            'talent_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->sentence(3),
            'date' => $this->faker->date(),
            'rate' => $this->faker->numberBetween(2000000, 5000000),
            // 'fee_for_talent' => $this->faker->numberBetween(1000, 5000000),
            'status' => $this->faker->randomElement(['proses', 'selesai', 'gagal']),
            'note' => $this->faker->paragraph(3),
            'link_project' => $this->faker->url(),
        ];
    }
}
