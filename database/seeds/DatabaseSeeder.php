<?php

use StatusHub\Status;
use StatusHub\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

//		$this->call('UserTableSeeder');
//		$this->call('FriendsTableSeeder');
		$this->call('StatusesTableSeeder');

		$this->command->info('Tables seeded!');
	}

}



class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'name' => 'John Doe',
			'email' => 'johndoe@bar.com',
			'password' => 'foobar'
		]);

		User::create([
			'name' => 'Foo Bar',
			'email' => 'foo@bar.com',
			'password' => 'foobar'
		]);

		User::create([
			'name' => 'Ben Franklin',
			'email' => 'ben@bar.com',
			'password' => 'foobar'
		]);

		User::create([
			'name' => 'Victoria Young',
			'email' => 'vic@bar.com',
			'password' => 'foobar'
		]);
	}

}



class FriendsTableSeeder extends Seeder {

	public function run()
	{
		for($i=0; $i < 5; $i++){
			$friends = User::all()->random(2);
			User::find($friends[0]->id)->addFriend($friends[1]->id);
		}

	}
}



class StatusesTableSeeder extends Seeder {

	public function run()
	{
		for($i=10; $i < 10; $i++) {
			$user = User::all()->random(1);

			Status::create([
				'user_id' => $user->id,
				'status' => 'This is an awesome status!' . $i,
			]);
		}
	}
}