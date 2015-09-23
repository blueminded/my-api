<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Maker;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement("SET foreign_key_checks = 0");
		Model::unguard();

		$this->call('MakerTableSeeder');
		$this->call('VehicleTableSeeder');
		$this->call('UserTableSeeder');
		DB::statement("SET foreign_key_checks = 1");
	}

}
