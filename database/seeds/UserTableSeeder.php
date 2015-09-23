<?php

use Illuminate\Database\Seeder;
use App\User;
// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create(['email'=>'fake@fake.com','password'=>Hash::make('pass')]);
    }
}
