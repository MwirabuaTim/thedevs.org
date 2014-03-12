<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('DevsTableSeeder');
		$this->call('ProjectsTableSeeder');
		$this->call('OrgsTableSeeder');
		$this->call('EventtsTableSeeder');
		$this->call('StoriesTableSeeder');
		$this->call('KitsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('ProfilesTableSeeder');
		$this->call('MydatatypesTableSeeder');
		$this->call('DocumentsTableSeeder');
	}

}