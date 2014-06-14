<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create([
			'email'    => 'xjustinpagex@gmail.com',
			'password' => Hash::make('password')
		]);
	}

}
