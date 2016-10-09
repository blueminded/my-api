<?php

use Illuminate\Database\Seeder;
use App\Maker;
use Faker\Factory as Faker;
// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class MakerTableSeeder extends Seeder
{
    public function run()
    {
        Maker::truncate();

        $faker = Faker::create();

        for ($i=0; $i < 200; $i++) {
            Maker::create([
                'name'=>$faker->word(),
                'phone'=>$faker->randomDigit(5)
            ]);
        }
    }
}
