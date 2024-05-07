<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Hash;


class VeterinarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("id_ID");
        for ($i = 0; $i < 200; $i++) {
            DB::table('veterinarians')->insert([
                'name' => 'Dr. ' . $faker->name,
                'specialist' => $faker->randomElement(['Livestock', 'Aquaculture', 'Poultry', 'Nutrition', 'Breeding', 'Dermatology']),
                'university' => $faker->randomElement([
                    'Universitas Indonesia',
                    'Institut Teknologi Bandung',
                    'Universitas Gadjah Mada',
                    'Institut Pertanian Bogor',
                    'Universitas Airlangga',
                    'Universitas Diponegoro',
                    'Institut Teknologi Sepuluh Nopember',
                    'Universitas Padjadjaran',
                    'Universitas Hasanuddin',
                    'Universitas Brawijaya'
                ]),
                'graduate_year' => $faker->numberBetween(2000, 2020),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // You might want to change this
                'is_accepted' => true, // Randomly accepting or rejecting
                'certification' => null,
                'photo' => null,
                'consultation_price' => null,
                'reservation_price' => null,
            ]);
        }
    }
}
