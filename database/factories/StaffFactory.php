<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->numerify('08##########'),
            'place' => $this->faker->city(),
            'birth' => $this->faker->date(),
            'address' => $this->faker->address(),
            // 'village_id' => ,
            'instagram' => $this->faker->userName(),
            'linkedin' => $this->faker->userName(),
            // 'photo' => $this->withPhoto($this->faker->image('public/storage/images/staffs', 300, 300)),
            // 'photo' => '-',
            'position_id' => mt_rand(1, 5)
        ];
    }

    public function  withPhoto($path)
    {
        $pathWithoutPublic = str_replace('public/', '', $path);

        return $pathWithoutPublic;
    }
}
