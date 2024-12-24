<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Talent>
 */
class TalentFactory extends Factory
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
            'date' => $this->faker->date(),
            'instagram' => $this->faker->userName(),
            'engagement' => $this->faker->randomDigit(),
            'finstagram' => $this->faker->randomDigit(),
            'rate_igs' => $this->faker->randomFloat(2, 0, 15000000),
            'rate_igf' => $this->faker->randomFloat(2, 0, 15000000),
            'rate_igr' => $this->faker->randomFloat(2, 0, 15000000),
            'rate_igl' => $this->faker->randomFloat(2, 0, 15000000),
            'tiktok' => $this->faker->userName(),
            'ftiktok' => $this->faker->randomDigit(),
            'rate_ttf' => $this->faker->randomFloat(2, 0, 15000000),
            'rate_ttl' => $this->faker->randomFloat(2, 0, 15000000),
            'youtube' => $this->faker->userName(),
            'syoutube' => $this->faker->randomDigit(),
            'rate_yt' => $this->faker->randomFloat(2, 0, 15000000),
            'rate_event' => $this->faker->randomFloat(2, 0, 15000000),
            'talent_exclusive' => $this->faker->boolean(),
            'staff_id' => mt_rand(1, 20),
            'shopee_affiliate' => $this->faker->boolean(),
            'tiktok_affiliate' => $this->faker->boolean(),
            'mcn_tiktok' => $this->faker->boolean(),
            'photo' => 'images/default-profile-picture.jpg',
            'status' => 1,
            'account_name' => $this->faker->name(),
            'account_number' => $this->faker->numerify('############'),
            'bank_name' => $this->faker->randomElement(['BCA', 'BNI', 'BRI', 'BSI', 'Mandiri', 'Bank Danamon']),
            'npwp' => $this->faker->numerify("##.###.###-#.###.###"),
            'nik' => $this->faker->numerify('################')
        ];
    }

    public function  withPhoto($path)
    {
        $pathWithoutPublic = str_replace('public/', '', $path);

        return $pathWithoutPublic;
    }
}
