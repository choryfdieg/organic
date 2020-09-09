<?php

use App\Post;
use App\PostImage;
use Illuminate\Database\Seeder;

class PostImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostImage::truncate();

        $posts = Post::all();

        foreach ($posts as $post) {
            PostImage::create([
                'image' => '1599510120',
                'post_id' => $post->id
            ]);
        }
        
            
    }
}
