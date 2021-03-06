<?php

namespace App\Http\Controllers\api;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\api\ApiResponseController;

// api

class PostController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $posts = Post::orderBy('created_at', 'desc')->paginate(2);

        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('post_images', 'post_images.post_id', '=', 'posts.id')
            ->select('posts.*', 'categories.title as category', 'post_images.image')
            ->paginate(5);

        return $this->successResponse($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {        

        $post->image;
        $post->images;
        
        $post->category;

        return $this->successResponse($post);

    }

    public function urlClean(String $urlClean){

        $post = Post::where('url_clean', '=', $urlClean)->firstOrFail();

        $post->image;
        $post->category;

        return $this->successResponse($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function category(Category $category){


        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('post_images', 'post_images.post_id', '=', 'posts.id')
            ->select('posts.*', 'categories.title as category', 'post_images.image')
            ->where('categories.id', $category->id)
            ->paginate(5);


        return $this->successResponse(['posts' => $posts, 'category' => $category]);
    }
}
