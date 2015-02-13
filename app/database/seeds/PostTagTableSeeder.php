<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostTagTableSeeder extends Seeder {

	public function run()
	{

        $tags = Tag::all();
        $posts = Post::all();

        foreach ($posts as $post) {
            for ($i=0; $i < 10; $i++) { 
                $post[$i]->tag
            }
        }



	}

}