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
                'name' => $faker->name,
                'specialist' => $faker->randomElement(['Livestock', 'Aquaculture', 'Poultry', 'Nutrition', 'Breeding', 'Dermatology']),
                'gender'=>$faker->randomElement(['male','female']),
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
                'phone_number' => $faker->numerify('628##########'),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123456'),
                'is_accepted' => false, 
                'str_number'=> $faker->numerify('################'),
                'certification' => "certification",
                'photo' => $faker->imageUrl(640, 480, 'people', true, null, false),
                'consultation_price' => $faker->numberBetween(30000, 150000),
                'reservation_price' => $faker->numberBetween(50000, 250000),
            ]);
        }
    }
}
