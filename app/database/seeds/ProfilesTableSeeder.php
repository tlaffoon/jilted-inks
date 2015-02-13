<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder {

	public function run()
	{

        for ($i=0; $i < 10; $i++) { 
            $profile = new Profile();
            $profile->bio = $faker->text;
            $profile->save();
        }
	}
}