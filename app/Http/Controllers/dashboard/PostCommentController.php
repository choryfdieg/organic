<?php

namespace App\Http\Controllers\dashboard;

use App\Post;
use App\PostComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCommentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['auth', 'rol.admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        $postComments = PostComment::orderBy('created_at', 'desc')->paginate(4);        

        return view('/dashboard/post_comment/index', ['postComments' => $postComments, 'posts' => $posts]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostComment $postComment)
    {
        return view('/dashboard/post_comment/show', ['postComment' => $postComment]);
    }

    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostComment $postComment)
    {
        
        $postComment->delete();

        return back()->with('status', 'PostComment eliminado con exito');

    }

    public function postComments(Request $request, Post $post){

        $postComments = PostComment::where('post_id', '=', $post->id)->orderBy('created_at', 'desc')->paginate(4);        

        return view('/dashboard/post_comment/post', ['postComments' => $postComments]);

    }
    
}
