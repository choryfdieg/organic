<?php

namespace App\Http\Controllers\dashboard;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use App\PostImage;
use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\Http\Requests\UpdatePostPut;
use Illuminate\Support\Facades\Storage;
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

        // DB::listen(function ($query) {
        //     echo "<code>$query->sql</code>";
        //     // $query->bindings
        //     // $query->time
        // });

        $posts = Post::with('category')->orderBy('created_at', 'desc')->paginate(4);        

        return view('/dashboard/post/index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::pluck('title', 'id');

        $categories = Category::pluck('title', 'id');
        return view('/dashboard/post/create', ['post' => new Post, 'categories' => $categories, 'tags' => $tags]);
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

        $post = Post::create($data);

        $post->tags()->sync($request->tags);


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

        $tags = Tag::pluck('title', 'id');

        $categories = Category::pluck('title', 'id');

        return view('/dashboard/post/edit', compact('post', 'categories', 'tags'));
        //return view('/dashboard/post/edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
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

        $post->tags()->sync($request->tags);

        $post->update();
        

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

        //$request->image->move(\public_path('images'), $filename);

        $path = $request->image->store('public/images');

        PostImage::create(['post_id' => $post->id, 'image' => $path]);

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

    
    public function downLoadimage(Request $request, PostImage $image){

        return (Storage::disk('local')->download($image->image));

    }

    public function deleteImage(PostImage $image){

        Storage::disk('local')->delete($image->image);

        $image->delete();

        return back()->with('status', 'Imagen eliminada con exito');

    }
}
