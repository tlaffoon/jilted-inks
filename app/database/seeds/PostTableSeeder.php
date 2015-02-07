<?php

class PostTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        
        for ($i=1; $i <= 10; $i++) {
            $post = new Post();
            
            $post->title = "Post $i";
            $post->body  = "This is post $i. ";
            $post->body .= 'Bacon ipsum dolor amet shankle dolor jowl et consequat. Boudin kielbasa veniam pig salami. Pastrami sausage swine boudin ex. Turducken et pancetta, spare ribs alcatra aliquip strip steak quis deserunt hamburger in commodo.';
            $slug = preg_replace('~[^\\pL\d]+~u', '-', $post->title);
            $slug = trim($slug, '-');
            $slug = strtolower($slug);
            $post->slug  = $slug;
            $post->user_id = $user->id;
            
            $post->save();
        }
    }
}
