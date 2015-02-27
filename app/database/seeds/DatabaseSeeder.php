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
		
        DB::table('roles')->delete();
        DB::table('users')->delete();

        $this->call('RolesTableSeeder');
		$this->call('UserTableSeeder');
		// $this->call('PostTableSeeder');
        // $this->call('TagsTableSeeder');
	}
}
