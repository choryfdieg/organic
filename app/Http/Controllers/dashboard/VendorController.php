<?php

namespace App\Http\Controllers\dashboard;

use App\Tag;
use App\City;
use App\Vendor;
use App\Category;
use App\VendorImage;
use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVendorPost;
use App\Http\Requests\UpdateVendorPut;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
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

        $vendors = Vendor::orderBy('created_at', 'desc')->paginate(4);        

        return view('/dashboard/vendor/index', ['vendors' => $vendors]);
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

        $cities = City::pluck('name', 'id');

        return view('/dashboard/vendor/create', ['vendor' => new Vendor, 'tags' => $tags, 'categories' => $categories, 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorPost $request)
    {

        if($request->url_clean == ''){
            $request->url_clean = $request->title;
        }

        $url_clean = CustomUrl::urlTitle($request->url_clean, '-', true);

        
        $data = $request->validated();
        $data['url_clean'] = $url_clean;

        $validator = Validator::make($data, StoreVendorPost::getRules());

        if ($validator->fails()) {
            return redirect('dashboard/vendor/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $vendor = Vendor::create($data);

        $vendor->tags()->sync($request->tags);

        return back()->with('status', 'Vendor creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return view('/dashboard/vendor/show', ['vendor' => $vendor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {

        $tags = Tag::pluck('title', 'id');

        $categories = Category::pluck('title', 'id');

        $cities = City::pluck('name', 'id');

        return view('/dashboard/vendor/edit', ['vendor' => $vendor, 'tags' => $tags, 'categories' => $categories, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorPut $request, Vendor $vendor)
    {

        $vendor->update($request->validated());

        $vendor->tags()->sync($request->tags);

        return back()->with('status', 'Vendor actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return back()->with('status', 'Vendor eliminado con exito');
    }


    // imagenes del vendor para carrusel

    public function image(Request $request, Vendor $vendor){

        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png,svg|max:10240'
        ]);

        $path = $request->image->store('public/images');

        VendorImage::create(['vendor_id' => $vendor->id, 'image' => $path]);

        return back()->with('status', 'Imagen cargada con exito');

    }

    public function downLoadimage(Request $request, PostImage $image){

        return (Storage::disk('local')->download($image->image));

    }

    public function deleteImage(VendorImage $image){

        Storage::disk('local')->delete($image->image);

        $image->delete();

        return back()->with('status', 'Imagen eliminada con exito');

    }

    // para front contacto verde
    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $urlClean)
    {

        $vendor = Vendor::where('url_clean', '=', $urlClean)->firstOrFail();

        $tags = Tag::pluck('title', 'id');

        $categories = Category::pluck('title', 'id');

        $cities = City::pluck('name', 'id');

        return view('/contactoverde/vendor-detail', ['vendor' => $vendor, 'tags' => $tags, 
                                                        'categories' => $categories, 
                                                        'cities' => $cities]);
    }
}
