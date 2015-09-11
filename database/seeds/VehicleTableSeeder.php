<?php

use Illuminate\Database\Seeder;
use App\Vehicle;
use Faker\Factory as Faker;
// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class VehicleTableSeeder extends Seeder
{
    public function run()
    {
        Vehicle::truncate();

        $faker = Faker::create();

        for ($i=0; $i < 6; $i++) {
            Vehicle::create([
                'color'=>$faker->safeColorName(),
                'power'=>$faker->randomNumber(),
                'capacity'=>$faker->randomFloat(),
                'speed'=>$faker->randomFloat(),
                'maker_id'=>$faker->numberBetween(1,5),
            ]);
        }
    }
}
