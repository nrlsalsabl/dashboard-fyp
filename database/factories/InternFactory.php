<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intern>
 */
class InternFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'place' => $this->faker->city(),
            'birth' => $this->faker->date(),
            'address' => $this->faker->address(),
            'instagram' => $this->faker->userName(),
            'linkedin' => $this->faker->userName(),
            // 'photo' => $this->withPhoto($this->faker->image('public/storage/images/interns', 300, 300)),
            // 'photo' => '-',
            'position_id' => mt_rand(1, 11)
        ];
    }

    public function  withPhoto($path)
    {
        $pathWithoutPublic = str_replace('public/', '', $path);

        return $pathWithoutPublic;
    }
}
