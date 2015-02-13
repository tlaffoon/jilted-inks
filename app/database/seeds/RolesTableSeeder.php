<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
        $role = new Role();
        $role->name = 'Unassigned';
        $role->save();

        $role = new Role();
        $role->name = 'Author';
        $role->save();

        $role = new Role();
        $role->name = 'Editor';
        $role->save();

        $role = new Role();
        $role->name = 'Administrator';
        $role->save();
	}
}