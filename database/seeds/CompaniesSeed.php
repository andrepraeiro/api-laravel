<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use app\Company;

class CompaniesSeed extends Seeder
{
	public function run()
	{
		DB::table('companies')->delete();
		Company::create(array(
			'id' => 1,
			'name' => str_random(10),
			'email' => str_random(10).'@gmail.com',
			'website' => str_random(10).'.com',
			'logo' => str_random(10),
			'password' => bcrypt('secret'),
			'created_at' => new DateTime,
			'updated_at' => new DateTime
		));
	}
}
