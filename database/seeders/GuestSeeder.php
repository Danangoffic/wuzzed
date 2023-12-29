<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5000; $i++) {
            $guest = \App\Models\Guest::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'province_id' => 34,
                'city_id' => 34,
                'knows_from' => 'lainnya'
            ]);
            $course = \App\Models\Course::with('guestcourses')->find(rand(1, 10));
            $course->guestcourses()->create([
                'guest_id' => $guest->id,
            ]);
        }
    }
}
