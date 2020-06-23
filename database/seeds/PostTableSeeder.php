<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = factory(Tag::class, 30)->make()->unique('name');
        $tags->each(function(Tag $tag) {
           $tag->save();
        });


        factory(Post::class, 20)->create()
            ->each(function (Post $post) use ($tags) {
                $post->tags()->saveMany($tags->random(rand(1, $tags->count())));
            });
    }
}
