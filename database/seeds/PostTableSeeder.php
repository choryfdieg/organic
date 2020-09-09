<?php

use App\Post;
use App\Category;
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
        Post::truncate();

        $categories = Category::all();

        foreach ($categories as $category) {

            for ($i=0; $i < 4; $i++) { 
                Post::create([
                    'title' => "Post $i",
                    'url_clean' => "Post_$i",
                    'content' => "Post_$i",
                    'posted' => 'yes',
                    'category_id' => $category->id
                ]);
            }

            
        }

        
    }
}
