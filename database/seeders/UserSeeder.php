<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();
        // create user student
        // \App\Models\User::factory(10)->create([
        //         'role' => 'student'
        //     ]);
        // $studentUser = \App\Models\User::with('student')->where('role', 'student')->get();
        // foreach($studentUser as $student){
        //     $student->student()->create([
        //         'user_id' => $student->id,
        //         'name' => $student->name,
        //         'email' => $student->email,
        //         'phone' => rand(1000000000, 9999999999),
        //         'address' => 'Jl. Raya Condet No. 123, Jakarta Timur',
        //         'province_id' => 1,
        //         'city_id' => 1,
        //         'status' => 'active'
        //     ]);
        // }
        // // create user mentor
        // \App\Models\User::factory(5)->create([
        //         'role' => 'mentor'
        //     ]);
    }
}
