<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    // Index/Home Page
    public function index(){
        $posts  = Post::all();
        return view('pages.index')->with('posts', $posts);
    }

    // About page
    public function about(){
        return view('pages.about');
    }

}
