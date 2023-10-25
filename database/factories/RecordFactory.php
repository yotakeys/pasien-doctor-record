<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pasien;
use App\Models\Doctor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'pasien_id' => Pasien::inRandomOrder()->pluck('id')->first(),
            'doctor_id' => Doctor::inRandomOrder()->pluck('id')->first(),
            'kondisi' => $this->faker->text(100),
            'suhu' => $this->faker->randomFloat(1, 35, 45.5),
            'resep_url' => $this->faker->imageUrl(640, 480, 'resep', true),
        ];
    }
}
