<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("id_ID");
        for ($i = 0; $i < 20; $i++) {
            $orderDate = $faker->dateTimeBetween('2024-05-21 20:00:00', '2024-05-23 20:00:00'); // Change this when testing
            DB::table('orders')->insert([ 
                'user_id' => 1,// Change this when testing
                'veterinarian_id' => 225,  // Change this when testing
                'cust_name' =>  $faker->randomElement(['Haris','kacee']), 
                'cust_phone_number' => $faker->numerify('628##########'),             
                'veter_phone_number' => $faker->numerify('628##########'),             
                'payment_proof' => $faker->imageUrl(480, 640, 'payment_proof', false, null, false),
                'appointment_date' => $orderDate,
                'category' => 'Livestock',
                'service_category' => 'consultation', // Change this when testing
                'order_status' => 'On Going',
                'order_date' => $orderDate, 
                'price' => 107428,
                'schedule_id' => 430, // Change this when testing
            ]);
        }
    }
}
