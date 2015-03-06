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
        DB::table('series')->delete();

        $this->call('RolesTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('SeriesTableSeeder');
	}
}
