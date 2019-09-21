<?php

use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts=App\Post::all();
        foreach ($posts as $post) {
            $tag_id = App\Tag::inRandomOrder()->first()->id;
            $post->tags()->attach($tag_id);
        }
    }
}
