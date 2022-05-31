<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Iklan;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home', [
            'title' => 'Pers pergerakan | Home',
            'posts' => Post::latest()->get(),
            'world' => Post::where('world',1)->latest()->get(),
            'categories' => Category::all(),
            'editorChoice' => Post::where('editor_choice',1)->get(),
            'ads' => Iklan::all(),
        ]);
    }
    public function show(Post $post)
    {
        return view('detail', [
            'title' => 'Detail Post',
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }
}
