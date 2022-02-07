<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            // estraggo random un post utilizzando il metodo inRandomOrder()
            $post = Post::inRandomOrder()->first();

            // estraggo random un id di un tag 
            $tag_id = Tag::inRandomOrder()->first()->id;

            // inserisco l'id di un un tag in un post
            $post->tags()->attach($tag_id);

        }
    }
}
