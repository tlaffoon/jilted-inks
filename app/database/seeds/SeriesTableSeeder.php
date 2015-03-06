<?php

class SeriesTableSeeder extends Seeder
{
    public function run()
    {
        $series = new Series();
        $series->name = 'blog';
        $series->description = 'This series contains uncategorized posts.';
        $series->save();
    }
}
