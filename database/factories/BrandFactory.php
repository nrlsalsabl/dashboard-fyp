<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'staff_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'photo' => 'images/default-profile-picture.jpg',
            'account_name' => $this->faker->name(),
            'account_number' => $this->faker->numerify('############'),
            'bank_name' => $this->faker->randomElement(['BCA', 'BNI', 'BRI', 'BSI', 'Mandiri', 'Bank Danamon']),
            'npwp' => $this->faker->numerify("##.###.###-#.###.###"),
            'nik' => $this->faker->numerify('################')
        ];
    }
}
