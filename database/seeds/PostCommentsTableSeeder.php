<?php

use App\PostComment;
use Illuminate\Database\Seeder;

class PostCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostComment::truncate();

        for ($i=0; $i < 20; $i++) { 
            PostComment::create([
                'title' => "PostComment $i",
                'comment' => "PostComment_$i",
                'posted' => "not",
                'user_id' => 1,
                'post_id' => 1
            ]);
        }
    }
}
