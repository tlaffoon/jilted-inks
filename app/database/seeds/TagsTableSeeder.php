<?php

use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        for ($i=0; $i < 100; $i++) { 
            $tag = new Tag();
            $tag->name = $faker->word;
            $tag->save();
        }
	}
}