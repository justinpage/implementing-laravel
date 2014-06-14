<?php

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('statuses')->delete();

		Status::create([
			'status' => 'Published',
			'slug'   => 'published'
		]);

		Status::create([
			'status' => 'Draft',
			'slug'   => 'draft'
		]);
	}

}
