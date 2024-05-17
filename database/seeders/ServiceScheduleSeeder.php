<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ServiceScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("id_ID");
        for ($i = 0; $i < 200; $i++) {
            $scheduleStart = $faker->dateTimeBetween('2024-05-17 15:00:00', '2024-05-17 21:00:00');
            $scheduleEnd = $faker->dateTimeBetween($scheduleStart, '2024-05-17 24:00:00');
            DB::table('service_schedules')->insert([                
                'veterinarian_id' => $faker->numberBetween(1, 200),
                'schedule_start' => $scheduleStart,
                'schedule_end' => $scheduleEnd, 
                'service_category' => 'consultation',
                'is_reserved' => false,
            ]);
        }
    }
}
