<?php

use Illuminate\Database\Seeder;
use app\Job;

class JobsSeed extends Seeder
{
	public function run()
	{
		Job::create(array(
			'title' => str_random(10),
			'description' => str_random(1000),
			'local' => 'São Paulo / SP',
			'remote' => 'no',
			'type' => 3,
			'company_id' => 1,
			'updated_at' => new DateTime,
			'created_at' => new DateTime
		));
	}
}
