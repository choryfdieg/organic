<?php

namespace App\Http\Controllers\dashboard;

use App\Post;
use App\Category;
use App\PostImage;
use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\Http\Requests\UpdatePostPut;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
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

        $posts = Post::orderBy('created_at', 'desc')->paginate(4);        

        return view('/dashboard/post/index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('/dashboard/post/create', ['post' => new Post, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {

        if($request->url_clean == ''){
            $request->url_clean = $request->title;
        }

        $url_clean = CustomUrl::urlTitle($request->url_clean, '-', true);

        
        $data = $request->validated();
        $data['url_clean'] = $url_clean;

        $validator = Validator::make($data, StorePostPost::getRules());

        if ($validator->fails()) {
            return redirect('dashboard/post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Post::create($data);

        return back()->with('status', 'Post creado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::pluck('title', 'id');
        return view('/dashboard/post/show', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $categories = Category::pluck('title', 'id');
        return view('/dashboard/post/edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostPut $request, Post $post)
    {

        $post->update($request->validated());

        return back()->with('status', 'Post actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        $post->delete();

        return back()->with('status', 'Post eliminado con exito');

    }

    public function image(Request $request, Post $post){

        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240'
        ]);

        $filename = time() . "." . $request->image->extension();

        $request->image->move(\public_path('images'), $filename);

        PostImage::create(['post_id' => $post->id, 'image' => $filename]);

        return back()->with('status', 'Imagen cargada con exito');

    }

    public function contentImage(Request $request){

        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240'
        ]);

        $filename = time() . "." . $request->image->extension();

        $request->image->move(\public_path('images/posts/'), $filename);

        return response()->json(["default" =>  URL::to('/') . '/images/posts/' . $filename]);


    }

    
}
