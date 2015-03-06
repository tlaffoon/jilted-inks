<?php

class PostTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        
        for ($i=1; $i <= 100; $i++) {
            $post = new Post();
            $post->title = "Post $i";
            $post->body  = "This is post $i. ";
            $post->body .= 'lorem ipsum ad infinitum';
            $post->description = 'This is a sample description for post ' . $i . '.';
            $slug = preg_replace('~[^\\pL\d]+~u', '-', $post->title);
            $slug = trim($slug, '-');
            $slug = strtolower($slug);
            $post->slug  = $slug;
            $post->user_id = $user->id;

            if ($i % 3 == 0) {
                $post->post_id = rand(1, 10);
            }

            $post->save();
        }
    }
}
