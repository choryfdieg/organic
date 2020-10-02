<?php

namespace App\Http\Controllers\web;

use App\Vendor;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function index(){
        return view('web.index');
    }

    public function contactoVerde(){

        $categories = Category::orderBy('title', 'asc')->pluck('title', 'id');

        $vendors = Vendor::with('image')->get();

        return view('contactoverde.index', ['categories' => $categories, 'vendors' => $vendors]);
    }

    public function detail(){
        return view('web.index');
    }

    public function postCategory(){
        return view('web.index');
    }

    public function contact(){
        return view('web.index');
    }

    public function categories(){
        return view('web.index');
    }
}
